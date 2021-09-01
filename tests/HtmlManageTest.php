<?php
/**
 * @author    : Death-Satan
 * @date      : 2021/9/1
 * @createTime: 18:01
 * @company   : Death撒旦
 * @link      https://www.cnblogs.com/death-satan
 */

namespace SaTan\Html\Tests;

use SaTan\Html\Exception\TagNotFoundException;
use SaTan\Html\HtmlManage;
use SaTan\Html\Tag;

class HtmlManageTest extends \PHPUnit\Framework\TestCase
{
    protected HtmlManage $htmlManage;
    protected function setUp(): void
    {
        $this->htmlManage = new HtmlManage();
    }

    public function testHtmlManage()
    {
        self::assertIsObject($this->htmlManage);
    }

    public function testTags()
    {
        self::assertIsArray($this->htmlManage->Tags());
    }

    public function testExistsTag()
    {
        self::assertIsBool($this->htmlManage->existsTag('test'));
    }

    public function testTag()
    {
        $this->expectException(TagNotFoundException::class);
        $this->htmlManage->tag('test');
    }

}