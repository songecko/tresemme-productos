<?php
/* @var $this CollectionsController */
/* @var $data TCollections */
?>

<div class="view">

	<table border="0" width="100%">
		<tr>
			<td>
				<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
				<?php echo CHtml::encode($data->title); ?>
			</td>
			<td style="text-align: right;">
				<?php echo CHtml::link('Actualizar', array('update', 'id' => $data->id_collection), array('class' => 'btn btn-mini')); ?>
				<?php echo CHtml::link('Eliminar', array('delete', 'id' => $data->id_collection), array(
						'class' => 'btn btn-mini',
						'submit' => array('delete'),
						'confirm' => 'Seguro que desea eliminar este registro?',
						'params' => array('id' => $data->id_collection),
						)); ?>
			</td>
		</tr>
	</table>

</div>