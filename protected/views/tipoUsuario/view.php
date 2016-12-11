<?php
/* @var $this TipoUsuarioController */
/* @var $model TipoUsuario */
?>

<?php
$this->breadcrumbs=array(
	'Tipo Usuarios'=>array('index'),
	$model->id_tipo_usuario,
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List TipoUsuario', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create TipoUsuario', 'url'=>array('create')),
	array('icon' => 'glyphicon glyphicon-edit','label'=>'Update TipoUsuario', 'url'=>array('update', 'id'=>$model->id_tipo_usuario)),
	array('icon' => 'glyphicon glyphicon-minus-sign','label'=>'Delete TipoUsuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tipo_usuario),'confirm'=>'Are you sure you want to delete this item?')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage TipoUsuario', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('View','TipoUsuario '.$model->id_tipo_usuario) ?>

<?php $this->widget('zii.widgets.CDetailView',array(
	'htmlOptions' => array(
		'class' => 'table table-striped table-condensed table-hover',
	),
	'data'=>$model,
	'attributes'=>array(
		'id_tipo_usuario',
		'nombre_tipo',
	),
)); ?>