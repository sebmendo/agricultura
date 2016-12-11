<?php
/* @var $this CompraController */
/* @var $model Compra */
?>

<?php
$this->breadcrumbs=array(
	'Compras'=>array('index'),
	'Create',
);
?>

<?php echo BsHtml::pageHeader('Comprar','productos') ?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>