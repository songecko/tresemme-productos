<?php
/* @var $this CollectionsController */
/* @var $model TCollections */

$this->breadcrumbs=array(
	'Colecciones'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver todas las colecciones', 'url'=>array('index')),
);
?>

<h1>Crear una colección</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>