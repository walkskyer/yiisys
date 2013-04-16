<?php
$this->breadcrumbs=array(
	'My Article Titles'=>array('index'),
	$data->title,
);

$this->menu=array(
	array('label'=>'List MyArticleTitle', 'url'=>array('index')),
	array('label'=>'Create MyArticleTitle', 'url'=>array('create')),
	array('label'=>'Update MyArticleTitle', 'url'=>array('update', 'id'=>$data->aid)),
	array('label'=>'Delete MyArticleTitle', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$data->aid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage MyArticleTitle', 'url'=>array('admin')),
);
?>

<h1>View MyArticleTitle #<?php echo $data->aid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$data,
	'attributes'=>array(
		'aid',
		'catid',
		'bid',
		'uid',
		'username',
		'title',
		'shorttitle',
		'highlight',
		'author',
		'from',
		'fromurl',
		'url',
		'summary',
		'pic',
		'thumb',
		'remote',
		'id',
		'idtype',
		'contents',
		'allowcomment',
		'owncomment',
		'click1',
		'click2',
		'click3',
		'click4',
		'click5',
		'click6',
		'click7',
		'click8',
		'tag',
		'dateline',
		'STATUS',
		'showinnernav',
	),
)); ?>
