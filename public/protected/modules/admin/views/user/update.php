<?php
/* @var UserController $this*/
/* @var User $model*/
?>
<div class="sys-container">
    <fieldset>
        <legend>编辑用户：<?php echo $model->username; ?></legend>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </fieldset>
</div>