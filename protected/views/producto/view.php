<?php
/* @var $this ProductoController */
/* @var $model Producto */
?>

<?php
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model->id_producto,
);


?>

<?php echo BsHtml::pageHeader('View','Producto '.$model->id_producto) ?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'id_producto',
		'nombre_producto',
		'precio_producto',
		'detalle',
		'id_categoria',
		'id_usuario',
	),
)); ?>