<?php
/* @var $this CompraController */
/* @var $model Compra */
?>

<?php
$this->breadcrumbs=array(
	'Compras'=>array('index'),
	$model->id_compra,
);

?>

<?php echo BsHtml::pageHeader('Detalle','Transaccion '.$model->id_compra) ?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'id_compra',
		'fecha',
		'precio_total',
		'observacion',
	),
)); ?>