<?php
/* @var $this UserController */
/* @var $model User */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('UserModule.main', 'Manage Users') =>array('admin'),
	Yii::t('UserModule.main', 'Create User')
);

$this->menu=array(
	array('label'=>Yii::t('UserModule.main','Manage Users'), 'url'=>array('admin')),
);
?>

<h1><?=Yii::t('UserModule.main', 'Create User');?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>