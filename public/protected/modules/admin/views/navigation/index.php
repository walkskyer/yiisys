<?php
$this->breadcrumbs=array(
	'Navigations',
);

$this->menu=array(
	array('label'=>'Create Navigation', 'url'=>array('create')),
	array('label'=>'Manage Navigation', 'url'=>array('admin')),
);
?>

<h1>Navigations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
