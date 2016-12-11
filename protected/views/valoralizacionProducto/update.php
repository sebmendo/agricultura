<?php
/* @var $this ValoralizacionProductoController */
/* @var $model ValoralizacionProducto */
?>

<?php
$this->breadcrumbs=array(
	'Valoralizacion Productos'=>array('index'),
	$model->id_valoralizacion_producto=>array('view','id'=>$model->id_valoralizacion_producto),
	'Update',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List ValoralizacionProducto', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create ValoralizacionProducto', 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>'View ValoralizacionProducto', 'url'=>array('view', 'id'=>$model->id_valoralizacion_producto)),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage ValoralizacionProducto', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Update','ValoralizacionProducto '.$model->id_valoralizacion_producto) ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>