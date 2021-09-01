<?php
/**
 * @author    : Death-Satan
 * @date      : 2021/9/1
 * @createTime: 1:32
 * @company   : Death撒旦
 * @link      https://www.cnblogs.com/death-satan
 */

namespace SaTan\Html\Exception;

use Throwable;

/**
 * 标签类型错误
 */
class TagWrongException extends \Exception
{
    public function __construct(string $tag = "")
    {
        parent::__construct(sprintf('标签:[%s]类型错误,请检查标签是否集成 SaTan\Html\Contracts\Tag接口',$tag));
    }
}