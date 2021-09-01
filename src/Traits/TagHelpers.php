<?php
/**
 * @author    : Death-Satan
 * @date      : 2021/9/1
 * @createTime: 1:41
 * @company   : Death撒旦
 * @link      https://www.cnblogs.com/death-satan
 */

namespace SaTan\Html\Traits;

use SaTan\Html\Contracts\Html;
use SaTan\Html\Contracts\Tag;

/**
 * 标签特征助手类
 * @mixin Tag
 */
trait TagHelpers
{
    public function __construct()
    {
        if (method_exists($this,'initialization'))
        {
            $this->initialization();
        }
    }
    /**
     * 设置标签名
     * @param string $tagName
     * @return $this
     */
    public function setTagName(string $tagName):self
    {
        $this->tag_name = $tagName;
        return $this;
    }

    /**
     * 初始化方法
     * @return void
     */
    public function initialization():void
    {

    }

    /**
     * 是否是闭合标签
     * @var bool
     */
    protected bool $is_closure = false;

    /**
     * @var string|null 当前标签名
     */
    protected ?string $tag_name = null;


    /**
     * @return string 开始的标签
     */
    public function startTag():string
    {
        $tag_name = $this->getTagName();
        return sprintf("<%s",$tag_name);
    }

    /**
     * 是否是闭合标签
     * @return bool
     */
    public function is_closure():bool
    {
        return $this->is_closure;
    }

    /**
     * 获取当前标签名
     * @return string
     */
    public function getTagName():string
    {
        return is_null($this->tag_name)?strtolower(satan_get_class(static::class)):$this->tag_name;;
    }

    /**
     * @return string 结束标签
     */
    public function endTag():string
    {
        $tag_name = $this->getTagName();
        return sprintf(
            '%s',
            $this->is_closure()?'/>':sprintf('<%s/>',$tag_name)
        );
    }

    /**
     * 设置是否为闭合标签
     * @param bool $is_closure
     * @return $this
     */
    public function setIsClosure(bool $is_closure=false):self
    {
        $this->is_closure = $is_closure;
        return $this;
    }

    /**
     * @var array[] 前置闭包
     */
    protected array $beforeClosures = [];

    /**
     * 添加前置闭包
     * @return $this
     */
    public function addBeforeClosures(string $name,\Closure $closure):self
    {
        $this->beforeClosures[$name] = $closure->bindTo($this);
        return $this;
    }
    /**
     * 移除闭包
     * @param string $name
     * @return $this
     */
    public function removeBeforeClosure(string $name):self
    {
        unset($this->beforeClosures[$name]);
        return $this;
    }

    /**
     * 检测闭包是否存在
     * @param string $name
     * @return bool
     */
    public function hasBeforeClosure(string $name):bool
    {
        return !empty($this->beforeClosures[$name]);
    }


    /**
     * 处理闭包
     * @return $this
     */
    public function beforeClosure():self
    {
        foreach ($this->beforeClosures as $name=>$closure)
        {
            $closure();
        }
        return $this;
    }

    /**
     * @var array 当前标签属性
     */
    protected array $attributes = [];

    /**
     * 设置标签属性
     * @param string|array $name 属性名
     * @param ?string $value 属性值
     * @return $this
     */
    public function setAttributes($name,?string $value=null):self
    {
        if (is_string($name)){
        $this->attributes[$name] = $value;
        }elseif (is_array($name))
        {
            $this->attributes = array_merge($this->attributes,$name);
        }
        return $this;
    }

    /**
     * 删除属性
     * @param string $name
     * @return $this
     */
    public function removeAttributes(string $name):self
    {
        unset($this->attributes[$name]);
        return $this;
    }
    /**
     * 获取属性值
     * @param string $name 属性名
     * @return string 属性值
     */
    public function getAttributes(string $name=''):string
    {
        return empty($this->attributes[$name])?'':$this->attributes[$name];
    }

    protected string $content ='';

    /**
     * 设置标签内容
     * @param Tag|string $content 标签内主体内容
     * @param bool $is_coding 是否对内容进行html转义
     * @return self
     */
    public function content($content,bool $is_coding=false):self
    {
        if ($content instanceof Tag)
        {
            $content = $content->render();
        }elseif (!is_string($content) && is_object($content)){
            if ($content instanceof Html)
            {
                $content = $content->toHtml();
            }else{
                $content = (string)$content;
            }
        }
        $this->content =$this->content. $is_coding?htmlentities($content):$content;
        return $this;
    }

    /**
     * 获取标签内容
     * @return string
     */
    public function getContent():string
    {
        return $this->content;
    }
    /**
     * 设置当前标签id
     * @param string $id
     * @return self
     */
    public function setId(string $id):self
    {
        $this->attributes['id'] = $id;
        return $this;
    }

    /**
     * 获取标签id
     * @return string
     */
    public function getId():string
    {
        return empty($this->attributes['id'])?'':$this->attributes['id'];
    }

    /**
     * 渲染标签
     * @return ?string
     */
    public function render():?string
    {
        $html = $this->startTag();
        if (method_exists($this,'beforeClosure'))
        {
            $this->beforeClosure();
        }

        foreach ($this->attributes as $attribute=>$value)
        {
            $html .= ' '.$attribute.'="'.str_replace('"','\"',$value).'" ';
        }
        if (!$this->is_closure())
        {
            $html .=    ' >';
            $html .=    $this->getContent();
        }

        $html .= $this->endTag();
        return $html;
    }

    /**
     * @return string
     */
    public function __toString()
    {
       return $this->render();
    }

    /**
     * 返回一个新的当前tag对象
     * @return $this
     */
    public function flush():self
    {
        return new static;
    }

    /**
     * 生产一个新的当前tag标签对象
     * @return $this
     */
    public static function make():self
    {
        return new static();
    }

    /**
     * 是否可拖动
     * @param bool|string $value
     * @return $this
     */
    public function draggable($value=true):self
    {
        if (is_bool($value))
        {
            $value = $value?'true':'false';
        }
        return $this->setAttributes(__FUNCTION__,$value);
    }

    /**
     * 标签内容的文本方向。
     * @param string $value
     * @return self
     */
    public function dir(string $value='rtl'):self
    {
        return $this->setAttributes(__FUNCTION__,$value);
    }

    /**
     * 是否拷贝、移动或链接被拖动数据。
     * @param string $value
     * @return self
     */
    public function dropzone(string $value='copy'):self
    {
        return $this->setAttributes(__FUNCTION__,$value);
    }

    /**
     * 设置标签内容的语言
     * @param string $value
     * @return self
     */
    public function lang(string $value='zh'):self
    {
        return $this->setAttributes(__FUNCTION__,$value);
    }

    /**
     * 规定元素的 tab 键控制次序
     * @links https://www.w3school.com.cn/tags/att_standard_tabindex.asp
     * @param string $value
     * @return self
     */
    public function tabindex(string $value='1'):self
    {
        return $this->setAttributes(__FUNCTION__,$value);
    }

    /**
     *  属性规定标签的额外信息。
     * @param string $value
     * @return self
     */
    public function title(string $value='title'):self
    {
        return $this->setAttributes(__FUNCTION__,$value);
    }

    /**
     *  是否能翻译
     * @param bool $value
     * @return self
     */
    public function translate(bool $value=true):self
    {
        return $this->setAttributes(__FUNCTION__,$value?'yes':'no');
    }


    /**
     * 是否隐藏
     * @param bool $value
     * @return self
     */
    public function hidden(bool $value=false):self
    {
        if ($value)
        {
        return $this->setAttributes(__FUNCTION__,__FUNCTION__);
        }else{
            return $this->removeAttributes(__FUNCTION__);
        }
    }


}