<?php
/* @var $this ImagenProductoController */
/* @var $model ImagenProducto */
?>

<?php
$this->breadcrumbs=array(
	'Imagen Productos'=>array('index'),
	'Create',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List ImagenProducto', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage ImagenProducto', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Create','ImagenProducto') ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>