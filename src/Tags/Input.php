<?php
/**
 * @author    : Death-Satan
 * @date      : 2021/9/1
 * @createTime: 2:39
 * @company   : Death撒旦
 * @link      https://www.cnblogs.com/death-satan
 */

namespace SaTan\Html\Tags;

use SaTan\Html\Tag;
use SaTan\Html\Traits\NameHelpers;

class Input extends Tag
{
    use NameHelpers;

    public function is_closure(): bool
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function getTagName(): string
    {
        return 'input';
    }
}