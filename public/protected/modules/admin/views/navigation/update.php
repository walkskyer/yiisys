<?php
/* @var NavigationController $this*/
/* @var Navigation $model*/
?>
<div class="sys-container">
    <fieldset>
        <legend>编辑用户：<?php echo $model->nav_name; ?></legend>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </fieldset>
</div>