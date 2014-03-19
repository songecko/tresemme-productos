<?php
/* @var $this LandingController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tlandings',
);

$this->menu=array(
	array('label'=>'Create TLanding', 'url'=>array('create')),
	array('label'=>'Manage TLanding', 'url'=>array('admin')),
);
?>

<h1>Tlandings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
