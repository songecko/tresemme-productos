<?php
/* @var $this ProductsController */
/* @var $model TProducts */

$this->breadcrumbs = array(
		'Productos' => array('index'),
		'Crear',
);

$this->menu = array(
		array('label' => 'Ver todas los productos', 'url' => array('index')),
);
?>

<h1>Crear un producto</h1>

<?php echo $this->renderPartial('_form', array('model' => $model, 'collections' => $collections)); ?>