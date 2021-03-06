<?php

namespace rockunit\db;


use rock\db\Query;
use rockunit\common\CommonTestTrait;
use rockunit\CommonSessionTrait;
use rockunit\mocks\DbSessionMock;

/**
 * @group base
 * @group db
 */
class DbSessionTest extends DatabaseTestCase
{
    use CommonTestTrait;
    use CommonSessionTrait;

    protected function setUp()
    {
        parent::setUp();
        $this->handlerSession = new DbSessionMock(['connection' => $this->getConnection()]);
        $this->handlerSession->open();
        $this->handlerSession->removeAll();
    }

    public function tearDown()
    {
        parent::tearDown();
        if (isset($this->handlerSession)) {
            $this->handlerSession->destroy();
        }
    }

    public function testExpire()
    {
        $this->handlerSession->setTimeout(2);
        $this->handlerSession->add('ttl', 'test');
        sleep(4);
        $this->assertNotEmpty(
            (new Query)
               ->select(['data'])
               ->from($this->handlerSession->sessionTable)
               ->where('[[id]]=:id', [':id' => session_id()])
               ->createCommand($this->getConnection())
               ->queryScalar()
        );
        $this->assertNull($this->handlerSession->get('ttl'));
    }

    public function testGC()
    {
        $this->handlerSession->setTimeout(2);
        $this->handlerSession->add('ttl', 'test');
        sleep(4);
        $this->handlerSession->gcSession(2);
        $this->assertEmpty((new Query)
                               ->select(['data'])
                               ->from($this->handlerSession->sessionTable)
                               ->where('[[id]]=:id', [':id' => session_id()])
                               ->createCommand($this->getConnection())
                               ->queryScalar());
    }
}