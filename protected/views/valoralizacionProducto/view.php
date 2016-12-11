<?php
/* @var $this ValoralizacionProductoController */
/* @var $model ValoralizacionProducto */
?>

<?php
$this->breadcrumbs=array(
	'Valoralizacion Productos'=>array('index'),
	$model->id_valoralizacion_producto,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List ValoralizacionProducto', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create ValoralizacionProducto', 'url'=>array('create')),
	array('icon' => 'glyphicon glyphicon-edit','label'=>'Update ValoralizacionProducto', 'url'=>array('update', 'id'=>$model->id_valoralizacion_producto)),
	array('icon' => 'glyphicon glyphicon-minus-sign','label'=>'Delete ValoralizacionProducto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_valoralizacion_producto),'confirm'=>'Are you sure you want to delete this item?')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage ValoralizacionProducto', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('View','ValoralizacionProducto '.$model->id_valoralizacion_producto) ?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'id_valoralizacion_producto',
		'id_producto',
		'valoralizacion',
	),
)); ?>