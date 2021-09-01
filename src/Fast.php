<?php
/**
 * @author    : Death-Satan
 * @date      : 2021/9/1
 * @createTime: 20:41
 * @company   : Death撒旦
 * @link      https://www.cnblogs.com/death-satan
 */

namespace SaTan\Html;
/**
 * @mixin HtmlManage
 */
abstract class Fast
{
    protected HtmlManage $htmlManage;

    public function __construct()
    {
        $this->htmlManage = new HtmlManage();
    }

    /**
     * @param HtmlManage $htmlManage
     */
    public function setHtmlManage(HtmlManage $htmlManage): void
    {
        $this->htmlManage = $htmlManage;
    }

    /**
     * @return HtmlManage
     */
    public function getHtmlManage(): HtmlManage
    {
        return $this->htmlManage;
    }

    public function __call($name, $arguments)
    {
        $this->{$name}(...$arguments);
    }
}