<?php
/**
 * @author    : Death-Satan
 * @date      : 2021/9/1
 * @createTime: 0:50
 * @company   : Death撒旦
 * @link      https://www.cnblogs.com/death-satan
 */

namespace SaTan\Html;

use Closure;
use SaTan\Html\Contracts\Tag;
use SaTan\Html\Exception\TagNotFoundException;
use SaTan\Html\Exception\TagWrongException;
use SaTan\Html\Tags\Br;
use SaTan\Html\Tags\Button;
use SaTan\Html\Tags\Div;
use SaTan\Html\Tags\Form;
use SaTan\Html\Tags\Img;
use SaTan\Html\Tags\Input;
use SaTan\Html\Tags\Li;
use SaTan\Html\Tags\Links;
use SaTan\Html\Tags\P;
use SaTan\Html\Tags\Span;
use SaTan\Html\Tags\Table;
use SaTan\Html\Tags\Tbody;
use SaTan\Html\Tags\Td;
use SaTan\Html\Tags\Textarea;
use SaTan\Html\Tags\Th;
use SaTan\Html\Tags\Tr;
use SaTan\Html\Tags\Ul;

/**
 * @method Div div() div标签
 * @method Links links() a标签
 * @method Img img() img标签
 * @method Input input() input标签
 * @method Br br() br标签
 * @method Form form() form标签
 * @method Button button() button标签
 * @method Li li() li标签
 * @method P p() p标签
 * @method Span span() p标签
 * @method Table table() table标签
 * @method Td td() td标签
 * @method Textarea textarea() textarea标签
 * @method Th th() th标签
 * @method Tr tr() tr标签
 * @method Ul ul() ul标签
 */
class HtmlManage implements \ArrayAccess
{

    /**
     * 标签库列表
     * @var array
     */
    protected array $tags = [
        'div'=>Div::class,
        'links'=>Links::class,
        'input'=>Input::class,
        'br'=>Br::class,
        'img'=>Img::class,
        'form'=>Form::class,
        'button'=>Button::class,
        'li'=>Li::class,
        'p'=>P::class,
        'span'=>Span::class,
        'table'=>Table::class,
        'tbody'=>Tbody::class,
        'td'=>Td::class,
        'textarea'=>Textarea::class,
        'th'=>Th::class,
        'tr'=>Tr::class,
        'ul'=>Ul::class
    ];

    /**
     * @return array
     */
    public function Tags():array
    {
        return $this->tags;
    }

    /**
     * 标签是否存在
     * @param string $tag
     * @return bool
     */
    public function existsTag(string $tag):bool
    {
        return !empty($this->tags[$tag]);
    }

    public function __call($name, $arguments)
    {
        if (!empty($this->tags[$name]))
        {
            return $this->tag($name);
        }
        //如果没有找到,则直接返回tag对象
        $tag_name= strtolower($name);
        $tag = new \SaTan\Html\Tag();
        return $tag->setTagName($tag_name);
    }


    /**
     * 获取标签
     * @throws TagNotFoundException|TagWrongException
     */
    public function tag(string $tagName)
    {
        if (empty($this->tags[$tagName]))
        {
            throw new TagNotFoundException($tagName);
        }
        $tag = $this->tags[$tagName];
        if ($tag instanceof Closure)
        {
            return $tag();
        }
        if ($tag instanceof Tag)
        {
            return $tag;
        }
        if (is_string($tag) && class_exists($tag))
        {
            return new $tag;
        }
        else throw new TagWrongException($tag);
    }


    /**
     * 扩展标签库
     * @param string $name
     * @param Closure|Tag|string $closure
     * @return bool
     */
    public function extend(string $name,$closure): bool
    {
        $tag = [];
        if ($closure instanceof Closure) $tag = [$name=>$closure->bindTo($this)];
        if ($closure instanceof Tag) $tag = [$name=>$closure];

        if (is_string($closure) && class_exists($closure))
        {
            $tag = new $closure;
            if ($tag instanceof Tag) $tag = [$name=>$closure];
            else $tag = [];
        }
        return !empty($tag) && array_merge($this->tags, $tag);
    }

    public function offsetExists($offset): bool
    {
        return isset($this->tags[$offset]);
    }

    /**
     * @throws TagNotFoundException
     */
    public function offsetGet($offset)
    {
        if (empty($this->tags[$offset]))
        {
            throw new TagNotFoundException($offset);
        }
        return $this->tags[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->extend($offset,$value);
    }

    public function offsetUnset($offset)
    {
        unset($this->tags[$offset]);
    }
}