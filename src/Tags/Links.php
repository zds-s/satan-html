<?php
/**
 * @author    : Death-Satan
 * @date      : 2021/9/1
 * @createTime: 2:37
 * @company   : Death撒旦
 * @link      https://www.cnblogs.com/death-satan
 */

namespace SaTan\Html\Tags;

use SaTan\Html\Tag;

/**
 * a标签
 */
class Links extends Tag
{
    public function getTagName(): string
    {
        return 'a';
    }

    /**
     * 设置target
     * @param string $value
     * @return self
     */
    public function target(string $value='_blank'):self
    {
        return $this->setAttributes(__FUNCTION__,$value);
    }
}