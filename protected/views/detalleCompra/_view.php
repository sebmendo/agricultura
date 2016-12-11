<?php
/* @var $this DetalleCompraController */
/* @var $data DetalleCompra */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_detalle_compra')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_detalle_compra),array('view','id'=>$data->id_detalle_compra)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_compra')); ?>:</b>
	<?php echo CHtml::encode($data->id_compra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_producto')); ?>:</b>
	<?php echo CHtml::encode($data->id_producto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio')); ?>:</b>
	<?php echo CHtml::encode($data->precio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad); ?>
	<br />


</div>