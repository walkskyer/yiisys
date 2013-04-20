<?php
$this->breadcrumbs=array(
	'Navigations'=>array('index'),
	$model->navid=>array('view','id'=>$model->navid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Navigation', 'url'=>array('index')),
	array('label'=>'Create Navigation', 'url'=>array('create')),
	array('label'=>'View Navigation', 'url'=>array('view', 'id'=>$model->navid)),
	array('label'=>'Manage Navigation', 'url'=>array('admin')),
);
?>

<h1>Update Navigation <?php echo $model->navid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>