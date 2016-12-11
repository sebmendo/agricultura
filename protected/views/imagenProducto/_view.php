<?php
/* @var $this ImagenProductoController */
/* @var $data ImagenProducto */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_imagen_producto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_imagen_producto),array('view','id'=>$data->id_imagen_producto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_imagen')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_imagen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_producto')); ?>:</b>
	<?php echo CHtml::encode($data->id_producto); ?>
	<br />


</div>