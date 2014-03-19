<?php
/* @var $this ProductsController */
/* @var $model TProducts */

$this->breadcrumbs = array(
		'Productos' => array('index'),
		'Actualizar',
);

$this->menu = array(
		array('label' => 'Ver todos los productos', 'url' => array('index')),
);
?>

<h1>Actualizar Producto</h1>

<?php echo $this->renderPartial('_form', array('model' => $model, 'collections' => $collections)); ?>