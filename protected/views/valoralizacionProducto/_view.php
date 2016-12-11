<?php
/* @var $this ValoralizacionProductoController */
/* @var $data ValoralizacionProducto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_valoralizacion_producto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_valoralizacion_producto),array('view','id'=>$data->id_valoralizacion_producto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_producto')); ?>:</b>
	<?php echo CHtml::encode($data->id_producto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valoralizacion')); ?>:</b>
	<?php echo CHtml::encode($data->valoralizacion); ?>
	<br />


</div>