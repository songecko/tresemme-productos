<?php
/* @var $this CollectionsController */
/* @var $model TCollections */

$this->breadcrumbs=array(
	'Collecciones'=>array('index'),
	$model->header,
);

$this->menu=array(
	array('label'=>'List TCollections', 'url'=>array('index')),
	array('label'=>'Create TCollections', 'url'=>array('create')),
	array('label'=>'Update TCollections', 'url'=>array('update', 'id'=>$model->id_collection)),
	array('label'=>'Delete TCollections', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_collection),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TCollections', 'url'=>array('admin')),
);
?>

<h1>View TCollections #<?php echo $model->id_collection; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_collection',
		'header',
		'copy',
		'image_back',
	),
)); ?>
