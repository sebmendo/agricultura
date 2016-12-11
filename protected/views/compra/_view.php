<?php
/* @var $this CompraController */
/* @var $data Compra */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_compra')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_compra),array('view','id'=>$data->id_compra)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio_total')); ?>:</b>
	<?php echo CHtml::encode($data->precio_total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observacion')); ?>:</b>
	<?php echo CHtml::encode($data->observacion); ?>
	<br />


</div>