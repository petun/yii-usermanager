<?php
/* @var $this UserController */
/* @var $model User */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('UserModule.main','Manage Users') => array('admin'),
	$model->title=>array('view','id'=>$model->id),
	Yii::t('UserModule.main', 'Updating User Data'),
);

$this->menu=array(
	array('label'=>Yii::t('UserModule.main','Create User'), 'url'=>array('create')),
	array('label'=>Yii::t('UserModule.main', 'Delete User'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('UserModule.main','Manage Users'), 'url'=>array('admin')),
	array('label'=>Yii::t('UserModule.main','Reset password'), 'url'=>array('reset','id'=>$model->id)),
);
?>

    <h1><? echo  $model->title;?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'profileForm'=>$profileForm)); ?>