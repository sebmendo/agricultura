<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs = array(
    'Usuarios' => array('index'),
    'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#usuario-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h3>Administración de Cuentas de Usuarios</h3>



<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'usuario-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        'username',
        'rut',
        'nombre_completo',
        'email',
        'telefono',
        'direccion',
        'id_tipo_usuario' => array(
            'name' => 'id_tipo_usuario',
            'value' => '$data->idTipoUsuario->nombre_tipo',
            'filter' => CHtml::listData(TipoUsuario::model()->findAll(), 'id_tipo_usuario', 'nombre_tipo'),
        ),
        'id_comuna' => array(
            'name' => 'id_comuna',
            'value' => '$data->idComuna->nombre_comuna',
            'filter' => CHtml::listData(Comuna::model()->findAll(), 'id_comuna', 'nombre_comuna'),
        ),
        'id_estado' => array(
            'name' => 'id_estado',
            'value' => '$data->estados->nombre_estado',
            'filter' => CHtml::listData(EstadoUsuario::model()->findAll(), 'id_estado', 'nombre_estado'),
        ),
        'link' => array(
            'header' => '<h4 style="font-size: 10px">Bloquear/Activar</h4>',
            'type' => 'raw',
            
            'value' => function($model) {
                if ($model->id_estado == 0) {
                    return CHtml::link("<center><i class='fa fa-lock' style='font-size: 20px' title='Bloquear'></i></center>",array('bloquear', 'id' => $model->id_usuario));
                } else {
                    return CHtml::link("<center><i class='fa fa-unlock' style='font-size: 20px' title='Activar'></i></center>",array('desbloquear', 'id' => $model->id_usuario));
                } 
            }
                ),
                array(
                    'class' => 'CButtonColumn',
                ),
            ),
        ));
        ?>
