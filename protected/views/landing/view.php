<?php
/* @var $this LandingController */
/* @var $model TLanding */

$this->breadcrumbs=array(
	'Tlandings'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List TLanding', 'url'=>array('index')),
	array('label'=>'Create TLanding', 'url'=>array('create')),
	array('label'=>'Update TLanding', 'url'=>array('update', 'id'=>$model->id_landing)),
	array('label'=>'Delete TLanding', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_landing),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TLanding', 'url'=>array('admin')),
);
?>

<h1>View TLanding #<?php echo $model->id_landing; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_landing',
		'title',
		'copy',
		'image_back',
	),
)); ?>
