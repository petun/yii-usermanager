<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

    <?php echo $form->errorSummary($model); ?>
	<?php echo $form->errorSummary($model->profile); ?>

            <?php echo $form->textFieldControlGroup($model,'name',array('span'=>5,'maxlength'=>255)); ?>
			<?php echo $form->textFieldControlGroup($model,'login',array('span'=>5,'maxlength'=>255)); ?>
			<? if ($model->isNewRecord) {?>
				<?php echo $form->passwordFieldControlGroup($model,'password',array('span'=>5,'maxlength'=>255)); ?>
			<? }?>

			<? if (!empty($profileForm)) {?>
				<? $this->renderPartial($profileForm, array('model'=>$model,'form'=>$form)); ?>
			<? } ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? Yii::t('UserModule.main','Add User') : Yii::t('UserModule.main','Save'),array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->