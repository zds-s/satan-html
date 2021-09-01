<?php
/**
 * @author    : Death-Satan
 * @date      : 2021/9/1
 * @createTime: 15:37
 * @company   : Death撒旦
 * @link      https://www.cnblogs.com/death-satan
 */

namespace SaTan\Html\Tags;

class Table extends \SaTan\Html\Tag
{
    /**
     * 设置border
     * @param string $border
     * @return $this
     */
    public function border(string $border=""):self
    {
        return $this->setAttributes(__FUNCTION__,$border);
    }
}