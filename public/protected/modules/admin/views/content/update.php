<?php
/* @var ContentController $this*/
/* @var Content $model*/
/* @var array $catTree*/
?>
<div class="beta-container">
    <fieldset>
        <legend>编辑文章:<?php echo $model->title; ?></legend>
        <?php echo $this->renderPartial('_form', array('model'=>$model,'catTree'=>$catTree)); ?>
    </fieldset>
</div>