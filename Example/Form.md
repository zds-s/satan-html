# 快速生成form表单示例

```php

$htmlManage = new \SaTan\Html\HtmlManage();

//生成form
$form =$htmlManage->form();
//设置form action地址
$form->action('index.php?s=index/index/post');
//设置form method属性
$form->method('POST');

//生成input
$input = $htmlManage->input();

//生成一个input框
$pass_input  = $htmlManage->input();

//设置input框type属性值为password
$pass_input->setAttributes(['type'=>'password']);

//设置name和id
$pass_input->setId('password')
            ->name('password');

//设置name、id、lang属性
$input->name('username')
    ->setId('username')
    ->lang('zh-cn');

//加载input到form对象中
$form->content($input);

$form->content($pass_input);

//输出html
echo $form->render();
/**
 * 输出内容是
 * <form action="index.php?s=index/index/post"  method="POST"  >
 * <input name="username"  id="username"  lang="zh-cn" />
 * <input type="password"  id="password"  name="password"/>
 * <form/>
 */
```