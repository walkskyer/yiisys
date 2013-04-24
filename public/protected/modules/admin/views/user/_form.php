<?php
/* @var $this UserController */
/* @var $model User*/
/* @var $form CActiveForm */
?>
<!-- form start-->
<?php $form = $this->beginWidget('CActiveForm', array(
    'id' => 'article-form',
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
    ),
    'htmlOptions' => array(
        'class' => 'form-horizontal post-form',
    )
)); ?>
<?php echo $form->errorSummary($model); ?>

<?php $field = 'username'; ?>
<div class="control-group bottom10px <?php if ($model->hasErrors($field)) echo 'error';?>">
    <?php echo $form->labelEx($model, $field, array('class' => 'control-label')); ?>
    <div class="controls">
        <?php echo $form->textField($model, $field, array('class' => 'span4')); ?>
        <?php if ($model->hasErrors($field)): ?>
        <p class="help-block"><?php echo $form->error($model, $field);?></p>
        <?php endif;?>
    </div>
</div>

<?php $field = 'password'; ?>
<div class="control-group bottom10px <?php if ($model->hasErrors($field)) echo 'error';?>">
    <?php echo $form->labelEx($model, $field, array('class' => 'control-label')); ?>
    <div class="controls">
        <?php echo $form->passwordField($model, $field, array('class' => 'span4')); ?>
        <?php if ($model->hasErrors($field)): ?>
        <p class="help-block"><?php echo $form->error($model, $field);?></p>
        <?php endif;?>
    </div>
</div>
<?php /*$field = 'password2'; */?><!--
<div class="control-group bottom10px <?php /*if ($model->hasErrors($field)) echo 'error';*/?>">
    <?php /*echo $form->labelEx($model, $field, array('class' => 'control-label')); */?>
    <div class="controls">
        <?php /*echo $form->textField($model, $field, array('class' => 'span4')); */?>
        <?php /*if ($model->hasErrors($field)): */?>
        <p class="help-block"><?php /*echo $form->error($model, $field);*/?></p>
        <?php /*endif;*/?>
    </div>
</div>-->
<?php $field = 'email'; ?>
<div class="control-group bottom10px <?php if ($model->hasErrors($field)) echo 'error';?>">
    <?php echo $form->labelEx($model, $field, array('class' => 'control-label')); ?>
    <div class="controls">
        <?php echo $form->textField($model, $field, array('class' => 'span4')); ?>
        <?php if ($model->hasErrors($field)): ?>
        <p class="help-block"><?php echo $form->error($model, $field);?></p>
        <?php endif;?>
    </div>
</div>

<div class="form-actions">
    <?php echo CHtml::submitButton($model->isNewRecord ? '添加' : '修改', array('class' => 'btn btn-primary')); ?>
</div>

<?php $this->endWidget(); ?>
<!-- form end-->
<?php
$this->widget('ext.kindeditor.KindEditorWidget', array(
    'id' => array(get_class($model) . '_content'), //Textarea id
    // Additional Parameters (Check http://www.kindsoft.net/docs/option.html)
    'items' => array(
        'themeType' => 'simple',
        'allowImageUpload' => true,
        'allowFileManager' => true,
        'items' => array(
            'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic',
            'underline', 'removeformat', '|', 'justifyleft', 'justifycenter',
            'justifyright', 'insertorderedlist', 'insertunorderedlist', '|',
            'emoticons', 'image', 'link',),
    ),
));
?>
