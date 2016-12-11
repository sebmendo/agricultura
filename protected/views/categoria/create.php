<?php
/* @var $this CategoriaController */
/* @var $model Categoria */
?>

<?php
$this->breadcrumbs=array(
	'Categorias'=>array('index'),
	'Create',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List Categoria', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage Categoria', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Create','Categoria') ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>