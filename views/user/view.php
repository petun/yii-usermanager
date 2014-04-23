<?php
/* @var $this UserController */
/* @var $model User */
?>

<?php
$this->breadcrumbs=array(
	Yii::t('UserModule.main','Manage Users') => array('admin'),
	$model->title,
);

$this->menu=array(
	array('label'=>Yii::t('UserModule.main','Create User'), 'url'=>array('create')),
	array('label'=>Yii::t('UserModule.main','Update Data'), 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>Yii::t('UserModule.main', 'Delete User'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('UserModule.main','Manage Users'), 'url'=>array('admin')),
);
?>

<h1><? echo $model->title;?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
	    'login',
		'name',
		'lastLoginAt',
		'lastActiveAt',
	),
)); ?>

<? if (!empty($profileView)) {
	$this->renderPartial($profileView, array('model'=>$model));
}?>