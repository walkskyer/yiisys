<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo app()->charset;?>" />
<title><?php echo app()->name . t('control_center', 'admin');?></title>
<link rel="stylesheet" type="text/css" href="<?php echo sbu('libs/bootstrap/css/bootstrap.min.css');?>" />
<link rel="stylesheet" type="text/css" href="<?php echo sbu('styles/sys-admin.css');?>" />
</head>
<body>
<div class="sys-container">
<?php echo $content;?>
</div>
</body>
</html>

<?php cs()->registerCoreScript('jquery');?>
<?php cs()->registerScriptFile(sbu('libs/bootstrap/js/bootstrap.min.js'), CClientScript::POS_END);?>
<?php cs()->registerScriptFile(sbu('scripts/sys-admin.js'), CClientScript::POS_END);?>