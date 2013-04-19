<?php
/* @var ContentController $this*/
/* @var Content $model*/
/* @var array $catTree*/
?>
<div class="sys-container">
    <fieldset>
        <legend>发布文章</legend>
        <?php echo $this->renderPartial('_form', array('model'=>$model,'catTree'=>$catTree)); ?>
    </fieldset>
</div>