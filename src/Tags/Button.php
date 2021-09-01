<?php
/**
 * @author    : Death-Satan
 * @date      : 2021/9/1
 * @createTime: 15:23
 * @company   : Death撒旦
 * @link      https://www.cnblogs.com/death-satan
 */

namespace SaTan\Html\Tags;

/**
 * button按钮类
 */
class Button extends \SaTan\Html\Tag
{
    /**
     * 是否禁用
     * @param bool $disabled
     * @return $this
     */
    public function disabled(bool $disabled=true):self
    {
        if ($disabled)
        {
            return $this->setAttributes(__FUNCTION__,'disable');
        }else{
            return $this->removeAttributes(__FUNCTION__);
        }
    }

    /**
     * 是否自动获得焦点[html5可用]
     * @param bool $autofocus
     * @return $this
     */
    public function autofocus(bool $autofocus=true):self
    {
        if ($autofocus)
        {
            return $this->setAttributes(__FUNCTION__,'disable');
        }else{
            return $this->removeAttributes(__FUNCTION__);
        }
    }

    /**
     * 设置form
     * @link https://www.w3school.com.cn/tags/att_button_form.asp
     * @param string $value
     * @return $this
     */
    public function form(string $value):self
    {
        return $this->setAttributes(__FUNCTION__,$value);
    }

    /**
     * 设置formenctype
     * @link https://www.w3school.com.cn/tags/att_button_formenctype.asp
     * @param string $value
     * @return $this
     */
    public function formenctype(string $value):self
    {
        return $this->setAttributes(__FUNCTION__,$value);
    }

    /**
     * 设置formtarget
     * @link https://www.w3school.com.cn/tags/att_button_formtarget.asp
     * @param string $value
     * @return $this
     */
    public function formtarget(string $value='_blank'):self
    {
        return $this->setAttributes(__FUNCTION__,$value);
    }

    /**
     * 设置Type
     * @link https://www.w3school.com.cn/tags/att_button_type.asp
     * @param string $value
     * @return $this
     */
    public function type(string $value='button'):self
    {
        return $this->setAttributes(__FUNCTION__,$value);
    }

    /**
     * 设置value
     * @link https://www.w3school.com.cn/tags/att_button_type.asp
     * @param string $value
     * @return $this
     */
    public function value(string $value='button'):self
    {
        return $this->setAttributes(__FUNCTION__,$value);
    }



}