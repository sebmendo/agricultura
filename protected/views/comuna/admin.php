<?php
/* @var $this ComunaController */
/* @var $model Comuna */


$this->breadcrumbs=array(
	'Comunas'=>array('index'),
	'Manage',
);

echo CHtml::link('Crear comuna', array('comuna/create'), array('class'=> 'btn btn-large btn-success')); 


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#comuna-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo BsHtml::pageHeader('Administrar','Comunas') ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo BsHtml::button('Busqueda avanzada',array('class' =>'search-button', 'icon' => BsHtml::GLYPHICON_SEARCH,'color' => BsHtml::BUTTON_COLOR_PRIMARY), '#'); ?></h3>
    </div>
    <div class="panel-body">
          <p>
            Tabla resumen de las comunas registradas.
        </p>

        <div class="search-form" style="display:none">
            <?php $this->renderPartial('_search',array(
                'model'=>$model,
            )); ?>
        </div>
        <!-- search-form -->

        <?php $this->widget('bootstrap.widgets.BsGridView',array(
			'id'=>'comuna-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
 		'nombre_comuna',
				array(
					'class'=>'bootstrap.widgets.BsButtonColumn',
					            'template'=>'{update}',

				),
			),
        )); ?>
    </div>
</div>




