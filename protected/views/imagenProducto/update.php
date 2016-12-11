<?php
/* @var $this ImagenProductoController */
/* @var $model ImagenProducto */
?>

<?php
$this->breadcrumbs=array(
	'Imagen Productos'=>array('index'),
	$model->id_imagen_producto=>array('view','id'=>$model->id_imagen_producto),
	'Update',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List ImagenProducto', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create ImagenProducto', 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>'View ImagenProducto', 'url'=>array('view', 'id'=>$model->id_imagen_producto)),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage ImagenProducto', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Update','ImagenProducto '.$model->id_imagen_producto) ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>