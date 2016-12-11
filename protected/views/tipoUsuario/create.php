<?php
/* @var $this TipoUsuarioController */
/* @var $model TipoUsuario */
?>

<?php
$this->breadcrumbs=array(
	'Tipo Usuarios'=>array('index'),
	'Create',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List TipoUsuario', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage TipoUsuario', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Create','TipoUsuario') ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>