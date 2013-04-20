<?php
$this->breadcrumbs=array(
	'Navigations'=>array('index'),
	$model->navid,
);

$this->menu=array(
	array('label'=>'List Navigation', 'url'=>array('index')),
	array('label'=>'Create Navigation', 'url'=>array('create')),
	array('label'=>'Update Navigation', 'url'=>array('update', 'id'=>$model->navid)),
	array('label'=>'Delete Navigation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->navid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Navigation', 'url'=>array('admin')),
);
?>

<h1>View Navigation #<?php echo $model->navid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'navid',
		'nav_name',
		'url_data',
		'type',
	),
)); ?>
