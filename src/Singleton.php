<?php

namespace Pietrel\Zoo;

abstract class Singleton
{
    private static $instances = [];

    private function __construct() {}

    protected function __clone() {}

    public function __wakeup()
    {
        throw new \Exception('Cannot unserialize singleton');
    }

    public static function getInstance()
    {
        $subclass = static::class;
        if (!isset(self::$instances[$subclass])) {
            self::$instances[$subclass] = new static();
        }

        return self::$instances[$subclass];
    }

    public static function resetInstance()
    {
        $subclass = static::class;
        unset(self::$instances[$subclass]);
    }
}
