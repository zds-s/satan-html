<?php
/**
 * @author    : Death-Satan
 * @date      : 2021/9/2
 * @createTime: 8:48
 * @company   : Death撒旦
 * @link      https://www.cnblogs.com/death-satan
 */

abstract class Facade
{
    public function __construct()
    {
        static::$instance = new ($this->getFacadeClass());
    }

    protected static Object $instance;

    /**
     * @param Object $instance
     */
    public function setInstance(object $instance): void
    {
        static::$instance = $instance;
    }

    /**
     * @return Object
     */
    public function getInstance(): object
    {
        return static::$instance;
    }

    /**
     * 获取门面类名
     * @return string
     */
    abstract public function getFacadeClass():string;

    /**
     * @param string $name
     * @param array $arguments
     */
    public static function __callStatic($name, $arguments)
    {
        return static::$instance->{$name}(...$arguments);
    }

}