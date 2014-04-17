<?php
/* @var $this UserController */
/* @var $model User */
?>

<?php
$this->breadcrumbs=array(
	'Users'=>array('admin'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1><? echo Yii::t('app','Reset password');?></h1>
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

	<?php echo $form->passwordFieldControlGroup($model,'password',array('span'=>5,'maxlength'=>255)); ?>

	<div class="form-actions">
		<?php echo TbHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array(
				'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
				'size'=>TbHtml::BUTTON_SIZE_LARGE,
			)); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->