<?php
/* @var $this ComunaController */
/* @var $model Comuna */
?>

<?php
$this->breadcrumbs=array(
	'Comunas'=>array('index'),
	'Create',
);
?>

<?php echo BsHtml::pageHeader('Registrar','Comuna') ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>