<?php
/* @var $this ProductsController */
/* @var $model TProducts */

$this->breadcrumbs=array(
	'Tproducts'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List TProducts', 'url'=>array('index')),
	array('label'=>'Create TProducts', 'url'=>array('create')),
	array('label'=>'Update TProducts', 'url'=>array('update', 'id'=>$model->id_product)),
	array('label'=>'Delete TProducts', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_product),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TProducts', 'url'=>array('admin')),
);
?>

<h1>View TProducts #<?php echo $model->id_product; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_product',
		'title',
		'copy',
		'image1',
		'image2',
		'id_collection',
		'image_back',
	),
)); ?>
