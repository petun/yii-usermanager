<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salt')); ?>:</b>
	<?php echo CHtml::encode($data->salt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('passwordStrategy')); ?>:</b>
	<?php echo CHtml::encode($data->passwordStrategy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('requiresNewPassword')); ?>:</b>
	<?php echo CHtml::encode($data->requiresNewPassword); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastLoginAt')); ?>:</b>
	<?php echo CHtml::encode($data->lastLoginAt); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('lastActiveAt')); ?>:</b>
	<?php echo CHtml::encode($data->lastActiveAt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>