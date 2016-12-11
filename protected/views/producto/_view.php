<?php
/* @var $this ProductoController */
/* @var $data Producto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_producto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_producto),array('view','id'=>$data->id_producto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_producto')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_producto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio_producto')); ?>:</b>
	<?php echo CHtml::encode($data->precio_producto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('detalle')); ?>:</b>
	<?php echo CHtml::encode($data->detalle); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_categoria')); ?>:</b>
	<?php echo CHtml::encode($data->id_categoria); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario); ?>
	<br />


</div>