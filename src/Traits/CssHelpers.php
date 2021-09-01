<?php
/**
 * @author    : Death-Satan
 * @date      : 2021/9/1
 * @createTime: 13:15
 * @company   : Death撒旦
 * @link      https://www.cnblogs.com/death-satan
 */

namespace SaTan\Html\Traits;

use SaTan\Html\Css;

/**
 * css帮助类
 */
trait CssHelpers
{
    protected function init():self
    {
        //加载处理闭包
        if (method_exists($this,'hasBeforeClosure') && !$this->hasBeforeClosure('css'))
        {
            $this->addBeforeClosures('css',function (){
                /**
                 * @var $this TagHelpers|CssHelpers
                 */
                $css = new Css($this->classList,$this->styles);
                //合并class属性
                $this->attributes['class'] = ($this->attributes['class']?:'').' '.$css->getClassListToString();
                //合并style样式
                $this->attributes['style'] = ($this->attributes['style']?:'').$css->getStylesToString();
            });
        }
        return $this;
    }
    /**
     * @var array class列表
     */
    protected array $classList = [];

    /**
     * @var array 样式列表
     */
    protected array $styles = [];

    /**
     * 增加class
     * @param array|string $className class名
     * @return self
     */
    public function addClassName($className):self
    {
        //移除原来的样式|避免重复添加
        $this->removeClassName($className);
        $this->classList = array_merge($this->classList,is_array($className)?$className:[$className]);
        return $this;
    }

    /**
     * 移除class
     * @param array|string $className class名
     * @return self
     */
    public function removeClassName($className):self
    {
        if (is_string($className))
        {
            unset($this->classList[$className]);
        }elseif (is_array($className))
        {
            foreach ($className as $name)
            {
                unset($this->classList[$name]);
            }
        }
        return $this->init();
    }

    /**
     * 增加样式属性
     * @param string|array $name
     * @param null|string $value
     * @return $this
     */
    public function addStyle($name,?string $value=null):self
    {
        //先移除已经增加过的
        $this->removeStyle($name);
        if (is_array($name) && is_null($value))
        {
            foreach ($name as $item=>$value)
            {
                $this->addStyle($item,$value);
            }
        }else if (is_string($name) && is_string($value))
        {
            $this->styles[$name] = $value.';';
        }
        return $this;
    }

    /**
     * 移除已增加的样式属性
     * @param array|string $name
     * @return self
     */
    public function removeStyle($name):self
    {
        if (is_string($name))
        {
            unset($this->styles[$name]);
        }else if(is_array($name))
        {
            foreach ($name as $style)
            {
                unset($this->styles[$style]);
            }
        }
        return $this->init();
    }
}