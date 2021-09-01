<?php
/**
 * @author    : Death-Satan
 * @date      : 2021/9/1
 * @createTime: 1:02
 * @company   : Death撒旦
 * @link      https://www.cnblogs.com/death-satan
 */
namespace SaTan\Html\Exception;

use Throwable;

/**
 * tag标签未找到异常
 */
class TagNotFoundException extends \Exception
{
    public function __construct(string $tagName)
    {
        parent::__construct(sprintf('tag标签[%s]未找到',$tagName));
    }
}