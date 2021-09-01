<?php
/**
 * @author    : Death-Satan
 * @date      : 2021/9/1
 * @createTime: 20:46
 * @company   : Death撒旦
 * @link      https://www.cnblogs.com/death-satan
 */

namespace SaTan\Html;

use SaTan\Html\Exception\CssSetStylesParamException;

class Css
{
    /**
     * @var array classList
     */
    protected array $classList;

    /**
     * @var array styles
     */
    protected array $styles;

    /**
     * @param array $classList class
     * @param array $styles style
     */
    public function __construct(array $classList=[],array $styles=[])
    {
        $this->classList = $classList;
        $this->styles = $styles;
    }

    /**
     * @param array|string $classList
     * @return self
     */
    public function setClassList($classList): self
    {
        $this->classList = is_array($classList)?
            array_merge($this->classList,$classList):
            array_merge($this->classList,[$classList]);
        return $this;
    }

    /**
     * @param array|string $styles
     * @param string|null $value
     * @return Css
     * @throws CssSetStylesParamException
     */
    public function setStyles($styles,?string $value=null): self
    {
        if (is_array($styles) && is_null($value))
        {
            foreach ($styles as $name=>$style)
            {
                $this->styles[$name] = $style.';';
            }
        }elseif (is_string($styles) && !empty($value))
        {
            $this->styles[$styles] = $value.';';
        }else{
            throw new CssSetStylesParamException();
        }
        return $this;
    }

    /**
     * @return array
     */
    public function getClassList(): array
    {
        return $this->classList;
    }

    /**
     * @return array
     */
    public function getStyles(): array
    {
        return $this->styles;
    }

    /**
     * @return string
     */
    public function getStylesToString(): string
    {
        //合并style样式
        $styles = array_map(function ($name,$value){
            $value  = (substr($value,-1)!=';')?$value.';':$value;
            return $name.':'.$value;
        },array_keys($this->styles),array_values($this->styles));
        return implode("\r\n",$styles);
    }

    /**
     *
     * @return string
     */
    public function getClassListToString(): string
    {
        return implode(' ',$this->classList);
    }
}