<?php
/* @var $this ProductsController */
/* @var $data TProducts */
?>

<div class="view">
	
	<table border="0" width="100%">
		<tr>
			<td width="50%">
				<?php echo CHtml::encode($data->model); ?>
			</td>
			<td width="30%">
				<?php echo CHtml::encode($data->idCollection->title); ?>
			</td>
			<td>
				<?php echo CHtml::link('Actualizar', array('update', 'id' => $data->id_product), array('class' => 'btn btn-mini')); ?>
				<?php echo CHtml::link('Eliminar', array('delete', 'id' => $data->id_product), array(
						'class' => 'btn btn-mini',
						'submit' => array('delete'),
						'confirm' => 'Seguro que desea eliminar este registro?',
						'params' => array('id' => $data->id_product),
						)); ?>
			</td>
		</tr>
	</table>

</div>