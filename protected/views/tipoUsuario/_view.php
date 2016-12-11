<?php
/* @var $this TipoUsuarioController */
/* @var $data TipoUsuario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_usuario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_usuario),array('view','id'=>$data->id_tipo_usuario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_tipo')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_tipo); ?>
	<br />


</div>