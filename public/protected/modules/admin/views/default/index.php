<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo app()->charset;?>" />
<title><?php echo app()->name . t('control_center', 'sys_admin');?></title>
<link rel="stylesheet" type="text/css" href="<?php echo sbu('libs/bootstrap/css/bootstrap.min.css');?>" />
<link rel="stylesheet" type="text/css" href="<?php echo sbu('styles/sys-admin.css');?>" />
<script type="text/javascript" src="<?php echo sbu('libs/jquery.min.js');?>"></script>
</head>
<body>
<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container admin-nav-container">
            <a class="brand" href="<?php echo url('admin/default/welcome');?>" target="main"><?php echo t('control_center', 'sys_admin');?></a>
            <ul class="nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo t('content_manage', 'sys_admin');?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo l(t('content_create', 'sys_admin'), url('admin/content/create'), array('target'=>'main'));?></li>
                        <li><?php echo l(t('content_manage', 'sys_admin'), url('admin/content/index'), array('target'=>'main'));?></li>
                        <li class="divider"></li>
                        <li><?php echo l(t('latest_posts', 'sys_admin'), url('admin/post/latest'), array('target'=>'main'));?></li>
                        <li><?php echo l(t('hottest_posts', 'sys_admin'), url('admin/post/hottest'), array('target'=>'main'));?></li>
                        <li><?php echo l(t('editor_recommend_posts', 'sys_admin'), url('admin/post/recommend'), array('target'=>'main'));?></li>
                        <li><?php echo l(t('home_show_posts', 'sys_admin'), url('admin/post/homeshow'), array('target'=>'main'));?></li>
                        <li><?php echo l(t('istop_posts', 'sys_admin'), url('admin/post/istop'), array('target'=>'main'));?></li>
                        <li class="divider"></li>
                        <li class="nav-header">附件</li>
                        <li><?php echo l(t('upload_file_search', 'sys_admin'), url('admin/upload/search'), array('target'=>'main'));?></li>
                        <li><?php echo l(t('upload_file_list', 'sys_admin'), url('admin/upload/list'), array('target'=>'main'));?></li>
                        <li class="divider"></li>
                        <li><?php echo l(t('trash', 'sys_admin'), url('admin/post/trash'), array('target'=>'main'));?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo t('category_manage', 'sys_admin');?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="nav-header"><?php echo t('category_name', 'sys_admin');?></li>
                        <li><?php echo l(t('category_create', 'sys_admin'), url('admin/category/create'), array('target'=>'main'));?></li>
                        <li><?php echo l(t('category_manage', 'sys_admin'), url('admin/category/index'), array('target'=>'main'));?></li>
                        <!-- <li><?php echo l(t('category_statistics', 'sys_admin'), url('admin/category/statistics'), array('target'=>'main'));?></li> -->
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo t('comment_manage', 'sys_admin');?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="nav-header"><?php echo t('post_tag', 'sys_admin');?></li>
                        <li><?php echo l(t('hottest_tags', 'sys_admin'), url('admin/tag/hottest'), array('target'=>'main'));?></li>
                        <li><?php echo l(t('tag_search', 'sys_admin'), url('admin/tag/search'), array('target'=>'main'));?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo t('user_manage', 'sys_admin');?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo l(t('user_create', 'sys_admin'), url('admin/user/create'), array('target'=>'main'));?></li>
                        <li><?php echo l(t('user_manage', 'sys_admin'), url('admin/user/search'), array('target'=>'main'));?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo t('system_tool', 'sys_admin');?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><?php echo l(t('friend_link', 'sys_admin'), url('admin/link/list'), array('target'=>'main'));?></li>
                        <li><?php echo l(t('advert_managent', 'sys_admin'), url('admin/advert/list'), array('target'=>'main'));?></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo t('system_setting', 'sys_admin');?><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li class="nav-header"><?php echo t('navigation_name', 'sys_admin');?></li>
                        <li><?php echo l(t('navigation_create', 'sys_admin'), url('admin/navigation/create'), array('target'=>'main'));?></li>
                        <li><?php echo l(t('navigation_manage', 'sys_admin'), url('admin/navigation/index'), array('target'=>'main'));?></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav pull-right">
                <li><?php echo l(user()->name, url('admin/user/current'), array('target'=>'main'));?></li>
                <li><?php echo l(t('logout_control_center', 'sys_admin'), url('site/logout'));?></li>
                <li><?php echo l(t('site_home', 'sys_admin'), url('site/index'), array('target'=>'_blank'));?></li>
            </ul>
        </div>
    </div>
</div>
<div class="well admin-sidebar">
    <ul class="nav nav-list">
        <li class="nav-header"><?php echo t('content_name', 'sys_admin');?></li>
        <li><?php echo l(t('content_create', 'sys_admin'), url('admin/content/create'), array('target'=>'main'));?></li>
        <li><?php echo l(t('content_manage', 'sys_admin'), url('admin/content/index'), array('target'=>'main'));?></li>
        <li class="divider"></li>
        <li class="nav-header"><?php echo t('navigation_name', 'sys_admin');?></li>
        <li><?php echo l(t('navigation_create', 'sys_admin'), url('admin/navigation/create'), array('target'=>'main'));?></li>
        <li><?php echo l(t('navigation_manage', 'sys_admin'), url('admin/navigation/index'), array('target'=>'main'));?></li>
    </ul>
</div>
<div class="admin-container">
    <iframe id="admin-iframe" src="<?php echo url('admin/default/welcome');?>" name="main"></iframe>
</div>

<script type="text/javascript">
$(function(){
	$('.admin-sidebar').on('click', 'li a', function(event){
		var li = $(this).parent();
		if (li.hasClass('active')) return true;

		$('li.dropdown').removeClass('active');
		$('.dropdown-menu  li').removeClass('active');
		li.siblings().removeClass('active');
		li.addClass('active');
	});
	$('.dropdown-menu').on('click', 'li a', function(event){
		var li = $(this).parent();
		$(this).parents('.dropdown').removeClass('open');
		if (li.hasClass('active')) return true;

		$('li').removeClass('active');
		li.addClass('active');
		$(this).parents('.dropdown').addClass('active');
	});

	$(document).on('mouseenter', '#admin-iframe', function(){
		$('li.dropdown').removeClass('open');
		$(this).focus();
	});
});
</script>
<script type="text/javascript" src="<?php echo sbu('libs/bootstrap/js/bootstrap.min.js');?>"></script>
<script type="text/javascript" src="<?php echo sbu('scripts/sys-admin.js');?>"></script>

</body>
</html>

