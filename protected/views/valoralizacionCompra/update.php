<?php
/* @var $this ValoralizacionCompraController */
/* @var $model ValoralizacionCompra */
?>

<?php
$this->breadcrumbs=array(
	'Valoralizacion Compras'=>array('index'),
	$model->id_valoralizacion_compra=>array('view','id'=>$model->id_valoralizacion_compra),
	'Update',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List ValoralizacionCompra', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create ValoralizacionCompra', 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>'View ValoralizacionCompra', 'url'=>array('view', 'id'=>$model->id_valoralizacion_compra)),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage ValoralizacionCompra', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Update','ValoralizacionCompra '.$model->id_valoralizacion_compra) ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>