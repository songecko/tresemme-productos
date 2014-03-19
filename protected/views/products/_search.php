<?php
/* @var $this ProductsController */
/* @var $model TProducts */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_product'); ?>
		<?php echo $form->textField($model,'id_product'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textArea($model,'title',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'copy'); ?>
		<?php echo $form->textArea($model,'copy',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'image1'); ?>
		<?php echo $form->textArea($model,'image1',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'image2'); ?>
		<?php echo $form->textArea($model,'image2',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_collection'); ?>
		<?php echo $form->textField($model,'id_collection'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'image_back'); ?>
		<?php echo $form->textArea($model,'image_back',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->