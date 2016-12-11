<?php
/* @var $this ValoralizacionProductoController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Valoralizacion Productos',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create ValoralizacionProducto', 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage ValoralizacionProducto', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Valoralizacion Productos') ?>
<?php $this->widget('bootstrap.widgets.BsListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>