<?php
/**
 * @author    : Death-Satan
 * @date      : 2021/9/1
 * @createTime: 20:43
 * @company   : Death撒旦
 * @link      https://www.cnblogs.com/death-satan
 */

namespace SaTan\Html\Fast;

use SaTan\Html\Tags\Input;

class Form extends \SaTan\Html\Fast
{
    /**
     * 创建input标签
     * @param array $attributes
     * @return Input
     */
    public function input(array $attributes=[]):Input
    {
        $input = $this->htmlManage->input();
        $input->setAttributes($attributes);
        return $input;
    }
}