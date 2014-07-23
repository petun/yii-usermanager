<?php
/* @var $this UserController */
/* @var $model User */


$this->breadcrumbs=array(
	Yii::t('UserModule.main','Manage Users'),
);

$this->menu=array(
	array('label'=>Yii::t('UserModule.main', 'Create User') , 'url'=>array('create')),
);

?>

<h1><? echo Yii::t('UserModule.main','Manage Users'); ?></h1>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'login',
		'name',
		/*'salt',
		'password',
		'passwordStrategy',
		'requiresNewPassword',
		'lastLoginAt',
		'lastActiveAt',
		'status',*/

		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>