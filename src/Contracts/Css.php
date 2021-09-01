<?php
/**
 * @author    : Death-Satan
 * @date      : 2021/9/1
 * @createTime: 13:07
 * @company   : Death撒旦
 * @link      https://www.cnblogs.com/death-satan
 */

namespace SaTan\Html\Contracts;
/**
 * css类
 */
interface Css
{
    /**
     * 增加class
     * @param array|string $className class名
     * @return self
     */
    public function addClassName($className):self;

    /**
     * 移除class
     * @param array|string $className class名
     * @return self
     */
    public function removeClassName($className):self;

    /**
     * 增加样式属性
     * @param string|array $name
     * @param null|string $value
     * @return $this
     */
    public function addStyle($name,?string $value=null):self;

    /**
     * 移除已增加的样式属性
     * @param array|string $name
     * @return self
     */
    public function removeStyle($name):self;
}