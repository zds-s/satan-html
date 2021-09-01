<?php
/**
 * @author    : Death-Satan
 * @date      : 2021/9/1
 * @createTime: 0:54
 * @company   : Death撒旦
 * @link      https://www.cnblogs.com/death-satan
 */

namespace SaTan\Html\Contracts;

use Closure;

/**
 * 标签库标准接口
 */
interface Tag
{
    /**
     * 初始化方法
     * @return void
     */
    public function initialization():void;

    /**
     * @return string 开始的标签
     */
    public function startTag():string;

    /**
     * 是否是闭合标签
     * @return bool
     */
    public function is_closure():bool;

    /**
     * 设置是否为闭合标签
     * @param bool $is_closure
     * @return $this
     */
    public function setIsClosure(bool $is_closure=false):self;

    /**
     * @return string 结束标签
     */
    public function endTag():string;

    /**
     * 设置标签属性
     * @param string $name 属性名
     * @param string $value 属性值
     * @return $this
     */
    public function setAttributes(string $name,string $value):self;

    /**
     * 删除属性
     * @param string $name
     * @return $this
     */
    public function removeAttributes(string $name):self;

    /**
     * 添加前置闭包
     * @return $this
     */
    public function AddBeforeClosures(string $name, Closure $closure):self;

    /**
     * 移除闭包
     * @param string $name
     * @return $this
     */
    public function removeBeforeClosure(string $name):self;

    /**
     * 检测闭包是否存在
     * @param string $name
     * @return bool
     */
    public function hasBeforeClosure(string $name):bool;
    /**
     * 处理闭包
     * @return $this
     */
    public function beforeClosure():self;
    /**
     * 获取属性值
     * @param string $name 属性名
     * @return string 属性值
     */
    public function getAttributes(string $name=''):string;
    /**
     * 设置标签内容
     * @param Tag|string $content 标签内主体内容
     * @param bool $is_coding 是否对内容进行html转义
     * @return self
     */
    public function content($content,bool $is_coding=false):self;

    /**
     * 获取标签内容
     * @return string
     */
    public function getContent():string;
    /**
     * 设置当前标签id
     * @param string $id
     * @return self
     */
    public function setId(string $id):self;

    /**
     * 获取标签id
     * @return string
     */
    public function getId():string;

    /**
     * 构造方法参数设置0
     */
    public function __construct();

    /**
     * 渲染标签
     * @return ?string
     */
    public function render():?string;

    /**
     * 获取当前标签名
     * @return string
     */
    public function getTagName():string;

    /**
     * 设置标签名
     * @param string $tagName
     * @return $this
     */
    public function setTagName(string $tagName):self;

}