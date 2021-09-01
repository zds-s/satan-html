<?php
/**
 * @author    : Death-Satan
 * @date      : 2021/9/1
 * @createTime: 15:08
 * @company   : Death撒旦
 * @link      https://www.cnblogs.com/death-satan
 */

namespace SaTan\Html;

use SaTan\Html\Contracts\Css;
use SaTan\Html\Contracts\TagMake;
use SaTan\Html\Traits\CssHelpers;
use SaTan\Html\Traits\TagHelpers;

/**
 * 标签基础类
 */
class Tag implements \SaTan\Html\Contracts\Tag,Css,TagMake
{
    use TagHelpers,CssHelpers;

}