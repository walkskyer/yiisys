<?php
/* @var CategoryController $this*/
/* @var Category $model*/
/* @var array $catTree*/
?>

<h1>更新分类：<?php echo $model->cat_name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'catTree'=>$catTree)); ?>