<?php
/* @var $this ValoralizacionCompraController */
/* @var $model ValoralizacionCompra */
?>

<?php
$this->breadcrumbs=array(
	'Valoralizacion Compras'=>array('index'),
	$model->id_valoralizacion_compra,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List ValoralizacionCompra', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create ValoralizacionCompra', 'url'=>array('create')),
	array('icon' => 'glyphicon glyphicon-edit','label'=>'Update ValoralizacionCompra', 'url'=>array('update', 'id'=>$model->id_valoralizacion_compra)),
	array('icon' => 'glyphicon glyphicon-minus-sign','label'=>'Delete ValoralizacionCompra', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_valoralizacion_compra),'confirm'=>'Are you sure you want to delete this item?')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage ValoralizacionCompra', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('View','ValoralizacionCompra '.$model->id_valoralizacion_compra) ?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'id_valoralizacion_compra',
		'id_compra',
		'valoralizacion',
	),
)); ?>