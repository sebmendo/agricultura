<?php
/* @var $this CategoriaController */
/* @var $model Categoria */
?>

<?php
$this->breadcrumbs=array(
	'Categorias'=>array('index'),
	$model->id_categoria=>array('view','id'=>$model->id_categoria),
	'Update',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List Categoria', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create Categoria', 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>'View Categoria', 'url'=>array('view', 'id'=>$model->id_categoria)),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage Categoria', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Update','Categoria '.$model->id_categoria) ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>