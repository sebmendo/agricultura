<?php
/* @var $this ComunaController */
/* @var $model Comuna */
?>

<?php
$this->breadcrumbs=array(
	'Comunas'=>array('index'),
	$model->id_comuna=>array('view','id'=>$model->id_comuna),
	'Update',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List Comuna', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create Comuna', 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>'View Comuna', 'url'=>array('view', 'id'=>$model->id_comuna)),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage Comuna', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Update','Comuna '.$model->id_comuna) ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>