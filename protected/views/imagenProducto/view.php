<?php
/* @var $this ImagenProductoController */
/* @var $model ImagenProducto */
?>

<?php
$this->breadcrumbs=array(
	'Imagen Productos'=>array('index'),
	$model->id_imagen_producto,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List ImagenProducto', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create ImagenProducto', 'url'=>array('create')),
	array('icon' => 'glyphicon glyphicon-edit','label'=>'Update ImagenProducto', 'url'=>array('update', 'id'=>$model->id_imagen_producto)),
	array('icon' => 'glyphicon glyphicon-minus-sign','label'=>'Delete ImagenProducto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_imagen_producto),'confirm'=>'Are you sure you want to delete this item?')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage ImagenProducto', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('View','ImagenProducto '.$model->id_imagen_producto) ?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'id_imagen_producto',
		'nombre_imagen',
		'id_producto',
	),
)); ?>