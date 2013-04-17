<?php
$this->breadcrumbs=array(
	'Categories'=>array('index'),
	$model->catid=>array('view','id'=>$model->catid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Category', 'url'=>array('index')),
	array('label'=>'Create Category', 'url'=>array('create')),
	array('label'=>'View Category', 'url'=>array('view', 'id'=>$model->catid)),
	array('label'=>'Manage Category', 'url'=>array('admin')),
);
?>

<h1>Update Category <?php echo $model->catid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>