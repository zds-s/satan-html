<?php
/**
 * @author    : Death-Satan
 * @date      : 2021/9/1
 * @createTime: 15:45
 * @company   : Death撒旦
 * @link      https://www.cnblogs.com/death-satan
 */

namespace SaTan\Html\Contracts;

interface TagMake
{
    /**
     * 返回一个新的当前tag对象
     * @return $this
     */
    public function flush():self;

    /**
     * 生产一个新的当前tag标签对象
     * @return $this
     */
    public static function make():self;
}