<?php
/* @var $this CategoriaController */
/* @var $model Categoria */
?>

<?php
$this->breadcrumbs=array(
	'Categorias'=>array('index'),
	$model->id_categoria,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List Categoria', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create Categoria', 'url'=>array('create')),
	array('icon' => 'glyphicon glyphicon-edit','label'=>'Update Categoria', 'url'=>array('update', 'id'=>$model->id_categoria)),
	array('icon' => 'glyphicon glyphicon-minus-sign','label'=>'Delete Categoria', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_categoria),'confirm'=>'Are you sure you want to delete this item?')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage Categoria', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('View','Categoria '.$model->id_categoria) ?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'id_categoria',
		'nombre_categoria',
	),
)); ?>