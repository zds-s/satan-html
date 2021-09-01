<?php
/**
 * @author    : Death-Satan
 * @date      : 2021/9/1
 * @createTime: 1:52
 * @company   : Death撒旦
 * @link      https://www.cnblogs.com/death-satan
 */

namespace SaTan\Html\Exception;

/**
 * 未找到类
 */
class ClassNotFountException extends \Exception
{
    public function __construct($class_name = "")
    {
        parent::__construct(sprintf('类:[%s]未找到',$class_name));
    }
}