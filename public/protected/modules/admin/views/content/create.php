<?php
/* @var ContentController $this*/
/* @var Content $model*/
$this->breadcrumbs=array(
	'My Article Titles'=>array('index'),
	'添加文章',
);

$this->menu=array(
	array('label'=>'List MyArticleTitle', 'url'=>array('index')),
	array('label'=>'Manage MyArticleTitle', 'url'=>array('admin')),
);
?>
<div class="beta-container">
    <fieldset>
        <legend>发布文章</legend>
        <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </fieldset>
</div>