<?php
/* @var $this ComunaController */
/* @var $model Comuna */
?>

<?php
$this->breadcrumbs=array(
	'Comunas'=>array('index'),
	'Create',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List Comuna', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage Comuna', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Create','Comuna') ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>