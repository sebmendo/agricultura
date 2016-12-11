<?php
/* @var $this CompraController */
/* @var $model Compra */
?>

<?php
$this->breadcrumbs=array(
	'Compras'=>array('index'),
	$model->id_compra=>array('view','id'=>$model->id_compra),
	'Update',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List Compra', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create Compra', 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>'View Compra', 'url'=>array('view', 'id'=>$model->id_compra)),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage Compra', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Update','Compra '.$model->id_compra) ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>