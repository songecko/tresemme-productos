<?php
/* @var $this CollectionsController */
/* @var $model TCollections */
/* @var $form CActiveForm */
Yii::import('application.extensions.jqClEditor');

$opts = array(
		'width' => 500, // width not including margins, borders or padding
		'height' => 250, // height not including margins, borders or padding
		'controls' => // controls to add to the toolbar
			'bold italic | style | size | source ',
		'styles' => // styles in the style popup
			array(array('Paragraph', '<p>')),
		'useCSS' => false, // use CSS to style HTML when possible (not supported in ie)
		'docType' => // Document type contained within the editor
		'<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">',
		'docCSSFile' => // CSS file used to style the document contained within the editor
			'',
		'bodyStyle' => // style to assign to document body contained within the editor
			'margin:4px; cursor:text'
);


jqClEditor::clEditor('#copy', $opts);
?>

<div class="form">

	<?php
	$form = $this->beginWidget('CActiveForm', array(
			'id' => 'tcollections-form',
			'enableAjaxValidation' => false,
			'htmlOptions' => array(
					'enctype' => 'multipart/form-data',
			),
	));
	?>

	<?php
	if (Yii::app()->user->hasFlash('saved')) {
		?>
		<div class="alert alert-success">
			<a href="#" class="close" data-dismiss="alert">&times;</a>
			<?php echo Yii::app()->user->getFlash('saved'); ?>
		</div>
		<?php
	}
	?>

	<p class="note">Campos marcados con <span class="required">*</span> son obligatorios.</p>

	<div class="row">
		<?php echo $form->labelEx($model, 'title'); ?>
		<?php echo $form->textField($model, 'title', array('class' => 'input-xxlarge')); ?>
		<?php echo $form->error($model, 'title'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model, 'header'); ?>
		<?php echo $form->textArea($model, 'header', array('rows' => 6, 'cols' => 50, 'class' => 'input-xxlarge')); ?>
		<?php echo $form->error($model, 'header'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model, 'copy'); ?>
		<?php echo $form->textArea($model, 'copy', array('rows' => 6, 'cols' => 50, 'class' => 'input-xxlarge', 'id' => 'copy')); ?>
		<?php echo $form->error($model, 'copy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'image_back'); ?>
		<?php if (!$model->isNewRecord) { ?>
			<?php
			$this->widget('ext.SAImageDisplayer', array(
					'image' => $model->image_back,
					'size' => 'thumb',
			));
			?>
			<?php
			echo '<br>';
		}
		echo $form->fileField($model, 'image_back');
		?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model, 'image_mobile'); ?>
		<?php if (!$model->isNewRecord) { ?>
			<?php
			$this->widget('ext.SAImageDisplayer', array(
					'image' => $model->image_mobile,
					'size' => 'thumb',
			));
			?>
			<?php
			echo '<br>';
		}
		echo $form->fileField($model, 'image_mobile');
		?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'image_collection'); ?>
		<?php if (!$model->isNewRecord) { ?>
			<?php
			$this->widget('ext.SAImageDisplayer', array(
					'image' => $model->image_collection,
					'size' => 'thumb',
			));
			?>
			<?php
			echo '<br>';
		}
		echo $form->fileField($model, 'image_collection');
		?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', array('class' => 'btn btn-primary')); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->