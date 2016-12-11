<?php
/* @var $this ProductoController */
/* @var $model Producto */
?>

<?php
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model->id_producto=>array('view','id'=>$model->id_producto),
	'Update',
);
?> 

<?php

echo CHtml::link('Gestionar Productos', array('producto/adminproductor'), array('class'=> 'btn btn-large btn-success')); 

?>



<div align="right">
<?php



?>
</div>
<?php echo BsHtml::pageHeader('Editando','Producto '.$model->id_producto) ?>
<?php $this->renderPartial('_form', array('model'=>$model,'categorias'=>$categorias)); ?>