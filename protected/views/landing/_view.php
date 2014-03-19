<?php
/* @var $this LandingController */
/* @var $data TLanding */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_landing')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_landing), array('view', 'id'=>$data->id_landing)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('copy')); ?>:</b>
	<?php echo CHtml::encode($data->copy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_back')); ?>:</b>
	<?php echo CHtml::encode($data->image_back); ?>
	<br />


</div>