<?php
/* @var $this DetalleCompraController */
/* @var $model DetalleCompra */
?>

<?php
$this->breadcrumbs=array(
	'Detalle Compras'=>array('index'),
	$model->id_detalle_compra,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List DetalleCompra', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create DetalleCompra', 'url'=>array('create')),
	array('icon' => 'glyphicon glyphicon-edit','label'=>'Update DetalleCompra', 'url'=>array('update', 'id'=>$model->id_detalle_compra)),
	array('icon' => 'glyphicon glyphicon-minus-sign','label'=>'Delete DetalleCompra', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_detalle_compra),'confirm'=>'Are you sure you want to delete this item?')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage DetalleCompra', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('View','DetalleCompra '.$model->id_detalle_compra) ?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'id_detalle_compra',
		'id_compra',
		'id_producto',
		'precio',
		'cantidad',
	),
)); ?>