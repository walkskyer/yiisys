<?php
$this->breadcrumbs=array(
	'Navigations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Navigation', 'url'=>array('index')),
	array('label'=>'Manage Navigation', 'url'=>array('admin')),
);
?>

<h1>Create Navigation</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>