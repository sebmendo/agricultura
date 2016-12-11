<?php
/* @var $this ValoralizacionCompraController */
/* @var $data ValoralizacionCompra */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_valoralizacion_compra')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_valoralizacion_compra),array('view','id'=>$data->id_valoralizacion_compra)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_compra')); ?>:</b>
	<?php echo CHtml::encode($data->id_compra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valoralizacion')); ?>:</b>
	<?php echo CHtml::encode($data->valoralizacion); ?>
	<br />


</div>