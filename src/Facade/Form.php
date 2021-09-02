<?php
/**
 * @author    : Death-Satan
 * @date      : 2021/9/2
 * @createTime: 9:07
 * @company   : Death撒旦
 * @link      https://www.cnblogs.com/death-satan
 */

namespace SaTan\Html\Facade;

use SaTan\Html\Tags\Input;

/**
 * @method static Input input() input
 * @method static string checkbox(string $name='',array $checkbox_list=[],array $extras=[])
 * @method static string radio(string $name='',array $radio_list=[],array $extras=[])
 * @method static string hidden(string $name,string $value,array $extras=[])
 * @method static string password(string $name,array $extras=[])
 * @method static string reset(string $name,string $value,array $extras=[])
 * @method static string submit(string $name,string $value,array $extras=[])
 * @method static string text(string $name,string $value,array $extras=[])
 * @method static string file(string $name,array $extras=[])
 */
class Form extends \Facade
{

    /**
     * @inheritDoc
     */
    public function getFacadeClass(): string
    {
        return \SaTan\Html\Fast\Form::class;
    }
}