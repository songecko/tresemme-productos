<?php
/* @var $this CollectionsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
		'Colecciones',
);

$this->menu = array(
		array('label' => 'Crear una colección', 'url' => array('create')),
);
?>

<h1>Listado de todas las colecciones</h1>

<?php
$this->widget('zii.widgets.CListView', array(
		'dataProvider' => $dataProvider,
		'itemView' => '_view',
		'summaryText' => '',
));
?>
