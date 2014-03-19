<?php
/* @var $this LandingController */
/* @var $model TLanding */

$this->breadcrumbs=array(
	'Tlandings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TLanding', 'url'=>array('index')),
	array('label'=>'Manage TLanding', 'url'=>array('admin')),
);
?>

<h1>Create TLanding</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>