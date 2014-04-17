<?php
/* @var $this UserController */
/* @var $model User */
?>

<?php
$this->breadcrumbs=array(
	'Users'=>array('admin'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'View User', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage User', 'url'=>array('admin')),
	array('label'=>Yii::t('app','Reset password'), 'url'=>array('reset','id'=>$model->id)),
);
?>

    <h1><? echo  $model->title;?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'profileForm'=>$profileForm)); ?>