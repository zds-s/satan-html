<?php
/**
 * @author    : Death-Satan
 * @date      : 2021/9/1
 * @createTime: 15:13
 * @company   : Death撒旦
 * @link      https://www.cnblogs.com/death-satan
 */

namespace SaTan\Html\Tags;

use SaTan\Html\Traits\NameHelpers;

/**
 *form标签
 */
class Form extends \SaTan\Html\Tag
{
    use NameHelpers;

    public function initialization():void
    {
        $this->action();
        $this->method();
    }

    /**
     * 设置action
     * @param string $action
     * @return $this
     */
    public function action(string $action=''):self
    {
        return $this->setAttributes('action',$action);
    }

    /**
     * 设置method
     * @param string $metod
     * @return self
     */
    public function method(string $metod='get'):self
    {
        return $this->setAttributes('method',$metod);
    }

    /**
     * 设置enctype格式
     * @param string $value
     * @return self
     */
    public function enctype(string $value='application/x-www-form-urlencoded'):self
    {
        return $this->setAttributes(__FUNCTION__,$value);
    }

}