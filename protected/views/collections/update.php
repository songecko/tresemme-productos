<?php
/* @var $this CollectionsController */
/* @var $model TCollections */

$this->breadcrumbs = array(
		'Colecciones' => array('index'),
		'Actualizar',
);

$this->menu = array(
		array('label' => 'Ver todas las colecciones', 'url' => array('index')),
);
?>

<h1>Actualizar colección</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>