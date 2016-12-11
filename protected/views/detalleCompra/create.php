<?php
/* @var $this DetalleCompraController */
/* @var $model DetalleCompra */
?>

<?php
$this->breadcrumbs=array(
	'Detalle Compras'=>array('index'),
	'Create',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List DetalleCompra', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage DetalleCompra', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Create','DetalleCompra') ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>