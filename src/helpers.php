<?php
/**
 * @author    : Death-Satan
 * @date      : 2021/9/1
 * @createTime: 0:39
 * @company   : Death撒旦
 * @link      https://www.cnblogs.com/death-satan
 */
/**
 * 获取不带命名空间的类名
 * @param string $class_name
 * @return string
 */
function satan_get_class(string $class_name=''):string
{
    return (substr($class_name, strrpos($class_name, '\\') + 1));
}