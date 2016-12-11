<?php
/* @var $this TipoUsuarioController */
/* @var $model TipoUsuario */
?>

<?php
$this->breadcrumbs=array(
	'Tipo Usuarios'=>array('index'),
	$model->id_tipo_usuario=>array('view','id'=>$model->id_tipo_usuario),
	'Update',
);

$this->menu=array(
    array('icon' => 'glyphicon glyphicon-list','label'=>'List TipoUsuario', 'url'=>array('index')),
	array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create TipoUsuario', 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-list-alt','label'=>'View TipoUsuario', 'url'=>array('view', 'id'=>$model->id_tipo_usuario)),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage TipoUsuario', 'url'=>array('admin')),
);
?>

<?php echo BsHtml::pageHeader('Update','TipoUsuario '.$model->id_tipo_usuario) ?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>