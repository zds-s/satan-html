<?php
/**
 * @author    : Death-Satan
 * @date      : 2021/9/1
 * @createTime: 17:26
 * @company   : Death撒旦
 * @link      https://www.cnblogs.com/death-satan
 */

namespace SaTan\Html\Facade;

use SaTan\Html\HtmlManage;
use SaTan\Html\Tag;
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
use SaTan\Html\Tags\Td;
use SaTan\Html\Tags\Textarea;
use SaTan\Html\Tags\Th;
use SaTan\Html\Tags\Tr;
use SaTan\Html\Tags\Ul;

/**
 * @method static Div div() div标签
 * @method static Links links() a标签
 * @method static Img img() img标签
 * @method static Input input() input标签
 * @method static Br br() br标签
 * @method static Form form() form标签
 * @method static Button button() button标签
 * @method static Li li() li标签
 * @method static P p() p标签
 * @method static Span span() p标签
 * @method static Table table() table标签
 * @method static Td td() td标签
 * @method static Textarea textarea() textarea标签
 * @method static Th th() th标签
 * @method static Tr tr() tr标签
 * @method static Ul ul() ul标签
 * @method static Tag dl() dl标签
 * @method static Tag dt() dt标签
 * @method static Tag footer() footer标签
 * @method static Tag tt() tt标签
 */
class Html
{
    /**
     * @param HtmlManage|null $html
     */
    public static function setHtml(?HtmlManage $html): void
    {
        self::$html = $html;
    }

    protected static ?HtmlManage $html=null;
    public static function __callStatic($name, $arguments)
    {
        if (!(self::$html instanceof HtmlManage))
        {
            self::$html = new HtmlManage();
        }
        $tagName = strtolower($name);

        if (self::$html->existsTag($tagName))
        {
            return self::$html->tag($tagName);
        }
        $tag = new Tag();
        return $tag->setTagName($tagName);

    }
}