<?php

namespace rockunit\common;


use rock\helpers\FileHelper;

trait CommonTestTrait
{
    protected static function clearRuntime()
    {
        $runtime = ROCKUNIT_RUNTIME;
        FileHelper::deleteDirectory($runtime);
    }

    protected static function sort($value)
    {
        ksort($value);
        return $value;
    }

    protected static $session = [];
    protected static $cookie = [];
    public static $post = [];

    protected static function sessionUp()
    {
        $_SESSION = static::$session;
        $_COOKIE = static::$cookie;
        $_POST = static::$post;
//        /** @var Cookie $cookie */
//        $cookie = Container::load('cookie');
//        $cookie->removeAll();
//        static::getSession()->removeAll();
    }

    protected static function sessionDown()
    {
        static::$session = $_SESSION;
        static::$cookie = $_COOKIE;
        static::$post = $_POST;
    }
} 