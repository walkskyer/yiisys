<?php
/* @var CategoryController $this*/
/* @var Category $model*/
/* @var array $catTree*/
?>
<div class="sys-container">
    <fieldset>
        <legend>添加分类</legend>
<?php echo $this->renderPartial('_form', array('model'=>$model,'catTree'=>$catTree)); ?>
    </fieldset>
</div>