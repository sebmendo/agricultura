<?php
/* @var $this CategoriaController */
/* @var $data Categoria */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_categoria')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_categoria),array('view','id'=>$data->id_categoria)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_categoria')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_categoria); ?>
	<br />


</div>