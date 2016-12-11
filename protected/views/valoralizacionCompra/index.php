<?php
/* @var $this ValoralizacionCompraController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Valoralizacion Compras',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create ValoralizacionCompra', 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage ValoralizacionCompra', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Valoralizacion Compras') ?>
<?php $this->widget('bootstrap.widgets.BsListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>