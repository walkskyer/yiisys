<?php
/* @var CategoryController $this*/
/* @var Category $model*/
/* @var array $catTree*/
?>

<h1>添加分类</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'catTree'=>$catTree)); ?>