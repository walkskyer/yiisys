<?php
/* @var CategoryController $this*/
/* @var Category $model*/
/* @var array $catTree*/
?>
<div class="beta-container">
    <fieldset>
        <legend>更新分类：<?php echo $model->cat_name; ?></legend>
<?php echo $this->renderPartial('_form', array('model'=>$model,'catTree'=>$catTree)); ?>
    </fieldset>
</div>