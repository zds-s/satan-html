<?php
/**
 * @author    : Death-Satan
 * @date      : 2021/9/1
 * @createTime: 16:30
 * @company   : Death撒旦
 * @link      https://www.cnblogs.com/death-satan
 */

namespace SaTan\Html\Traits;

trait NameHelpers
{
    /**
     * 设置name属性
     * @param $name
     */
    public function name($name)
    {
        $this->attributes[__FUNCTION__] = $name;
    }
}