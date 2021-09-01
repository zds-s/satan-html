<?php
/**
 * @author    : Death-Satan
 * @date      : 2021/9/1
 * @createTime: 20:54
 * @company   : Death撒旦
 * @link      https://www.cnblogs.com/death-satan
 */

namespace SaTan\Html\Exception;

use Throwable;

/**
 * css参数设置错误
 */
class CssSetStylesParamException extends \Exception
{
    public function __construct($message = "cssSetStyles方法参数设置错误", $code = 0, Throwable $previous = null)
    {

        parent::__construct($message, $code, $previous);
    }
}