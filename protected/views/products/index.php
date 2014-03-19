<?php
/* @var $this ProductsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
		'Productos',
);

$this->menu = array(
		array('label' => 'Crear un producto', 'url' => array('create')),
);
?>

<h1>Listado de todos los productos</h1>

<div>
	<table border="0" width="100%" style="font-weight: bold;">
			<tr style="background-color: lightgrey; text-align: left;">
				<td width="50%" style="padding: 10px;">Modelo</td>
				<td width="30%">Colección</td>
				<td>Acciones</td>
			</tr>
	</table>
</div>

<?php
$this->widget('zii.widgets.CListView', array(
		'dataProvider' => $dataProvider,
		'itemView' => '_view',
		'summaryText' => '',
));
?>
