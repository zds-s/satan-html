<?php
/**
 * @author    : Death-Satan
 * @date      : 2021/9/1
 * @createTime: 2:41
 * @company   : Death撒旦
 * @link      https://www.cnblogs.com/death-satan
 */

namespace SaTan\Html\Tags;

use SaTan\Html\Tag;

/**
 * img标签
 */
class Img extends Tag
{
    public function is_closure(): bool
    {
        return true;
    }

    /**
     * 设置src
     * @param string $path
     * @return $this
     */
    public function src(string $path): self
    {
        return $this->setAttributes(__FUNCTION__,$path);
    }

    /**
     * 设置alt
     * @param string $alt
     * @return $this
     */
    public function alt(string $alt=''):self
    {
        return $this->setAttributes(__FUNCTION__,$alt);
    }
}