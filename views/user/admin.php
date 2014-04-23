<?php
/* @var $this UserController */
/* @var $model User */


$this->breadcrumbs=array(
	Yii::t('UserModule.main','Manage Users'),
);

$this->menu=array(
	array('label'=>Yii::t('UserModule.main', 'Create User') , 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#user-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><? echo Yii::t('UserModule.main','Manage Users'); ?></h1>

<?php echo CHtml::link(Yii::t('UserModule.main','Advanced Search') ,'#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

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