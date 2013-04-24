<?php
$filter_keyword_alert = <<<EOD
    <div class="alert-heading">关键词支持三种格式</div>
    <ul>
        <li>精确匹配。例如：太阳</li>
        <li>简单正则匹配。关键词中间可以跳过一定数量的字符，例如：太{5}阳，将会匹配“太”和“阳”中间有0-5个字符的关键词</li>
        <li>复杂正则匹配。关键词可以是一个完整的正则表达式。如果不熟悉正则表达式，尽量不要使用。</li>
    </ul>
EOD;

return array(
    /* system manage*/
    'control_center'=>'管理中心',
    'logout_control_center' => '退出登录',
    'site_home'=>'网站首页',

    /* unity language*/
    'modify'=>'修改',
    'delete'=>'删除',

    /* system_setting manage*/
    'system_setting'=>'系统设置',

    /* system_tool manage*/
    'system_tool' => '工具',

    /* content manage*/
    'content_name' => '文章',
    'content_create' => '发表文章',
    'content_manage' => '管理文章',

    /* navigation manage*/
    'navigation_name'=>'导航',
    'navigation_create' => '添加导航',
    'navigation_manage' => '管理导航',

    /* category manage*/
    'category_name'=>'分类',
    'category_create'=>'新建分类',
    'category_manage'=>'管理分类',

    /* comment manage*/
    'comment_name'=>'评论',
    'comment_manage'=>'管理评论',

    /* user manage*/
    'user_name'=>'用户',
    'user_create'=>'添加用户',
    'user_manage'=>'管理用户',
    'user_search'=>'搜索用户',
);


