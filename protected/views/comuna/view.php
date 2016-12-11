<?php
/* @var $this ComunaController */
/* @var $model Comuna */
?>

<?php
$this->breadcrumbs=array(
	'Comunas'=>array('index'),
	$model->id_comuna,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List Comuna', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create Comuna', 'url'=>array('create')),
	array('icon' => 'glyphicon glyphicon-edit','label'=>'Update Comuna', 'url'=>array('update', 'id'=>$model->id_comuna)),
	array('icon' => 'glyphicon glyphicon-minus-sign','label'=>'Delete Comuna', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_comuna),'confirm'=>'Are you sure you want to delete this item?')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage Comuna', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('View','Comuna '.$model->id_comuna) ?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'id_comuna',
		'nombre_comuna',
	),
)); ?>