<?php

namespace rockunit;



use rockunit\common\CommonTestTrait;
use rockunit\mocks\SessionMock;

/**
 * @group base
 */
class SessionTest extends \PHPUnit_Framework_TestCase
{
    use CommonTestTrait;
    use CommonSessionTrait;

    public function setUp()
    {
        parent::setUp();
        static::sessionUp();
        $this->handlerSession = new SessionMock();
        $this->handlerSession->open();
        $this->handlerSession->removeAll();
    }

    public function tearDown()
    {
        parent::tearDown();
        static::sessionDown();
    }
}
 