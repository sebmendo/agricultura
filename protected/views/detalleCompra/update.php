<?php
/* @var $this DetalleCompraController */
/* @var $model DetalleCompra */
?>

<?php
$this->breadcrumbs=array(
	'Detalle Compras'=>array('index'),
	$model->id_detalle_compra=>array('view','id'=>$model->id_detalle_compra),
	'Update',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List DetalleCompra', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create DetalleCompra', 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>'View DetalleCompra', 'url'=>array('view', 'id'=>$model->id_detalle_compra)),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage DetalleCompra', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Update','DetalleCompra '.$model->id_detalle_compra) ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>