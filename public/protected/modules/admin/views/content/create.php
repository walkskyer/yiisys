<?php
/* @var ContentController $this*/
/* @var Content $model*/
?>
<div class="sys-container">
    <fieldset>
        <legend>发布文章</legend>
        <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </fieldset>
</div>