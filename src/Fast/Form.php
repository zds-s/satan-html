<?php
/**
 * @author    : Death-Satan
 * @date      : 2021/9/1
 * @createTime: 20:43
 * @company   : Death撒旦
 * @link      https://www.cnblogs.com/death-satan
 */

namespace SaTan\Html\Fast;

use SaTan\Html\Tags\Input;

class Form extends \SaTan\Html\Fast
{
    /**
     * 创建input标签
     * @param array $attributes
     * @return Input
     */
    public function input(array $attributes=[]):Input
    {
        $input = $this->htmlManage->input();
        $input->setAttributes($attributes);
        return $input;
    }

    /**
     * 生成checkbox input框
     * @param string $name
     * @param array $checkbox_list
     * @param array $extras
     * @return string
     */
    public function checkbox(string $name='',array $checkbox_list=[],array $extras=[]):string
    {
        $html ='';
        foreach ($checkbox_list as $value)
        {
            $html .= $this->input(array_merge(compact('value','name'),$extras))
                ->setAttributes('type',__FUNCTION__)->render();
        }
        return $html;
    }

    /**
     * 生成radio input框
     * @param string $name
     * @param array $radio_list
     * @param array $extras
     * @return string
     */
    public function radio(string $name='',array $radio_list=[],array $extras=[]):string
    {
        $html ='';
        foreach ($radio_list as $value)
        {
            $html .= $this->input(array_merge(compact('value','name'),$extras))
                ->setAttributes('type',__FUNCTION__)->render();
        }
        return $html;
    }

    /**
     * 生成一个hidden标签
     * @param string $name
     * @param string $value
     * @param array $extras
     * @return string
     */
    public function hidden(string $name,string $value,array $extras=[]):string
    {
        return $this->input(array_merge(compact('name','value'),$extras))
            ->setAttributes('type',__FUNCTION__)->render();
    }

    /**
     * 生成一个密码输入框
     * @param string $name
     * @param array $extras
     * @return string
     */
    public function password(string $name,array $extras=[]):string
    {
        return $this->input(array_merge(compact('name'),$extras))
            ->setAttributes('type',__FUNCTION__)->render();
    }

    /**
     * 生成一个reset输入框
     * @param string $name
     * @param string $value
     * @param array $extras
     * @return string
     */
    public function reset(string $name,string $value,array $extras=[]):string
    {
        return $this->input(array_merge(compact('name','value'),$extras))
            ->setAttributes('type',__FUNCTION__)->render();
    }

    /**
     * 生成一个submit input框
     * @param string $name
     * @param string $value
     * @param array $extras
     * @return string
     */
    public function submit(string $name,string $value,array $extras=[]):string
    {
        return $this->input(array_merge(compact('name','value'),$extras))
            ->setAttributes('type',__FUNCTION__)->render();
    }

    /**
     * 生成一个text input框
     * @param string $name
     * @param string $value
     * @param array $extras
     * @return string
     */
    public function text(string $name,string $value,array $extras=[]):string
    {
        return $this->input(array_merge(compact('name','value'),$extras))
            ->setAttributes('type',__FUNCTION__)->render();
    }

    /**
     * 生成一个file input框
     * @param string $name
     * @param array $extras
     * @return string
     */
    public function file(string $name,array $extras=[]):string
    {
        return $this->input(array_merge(compact('name'),$extras))
            ->setAttributes('type',__FUNCTION__)->render();
    }


}