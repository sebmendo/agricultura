<?php
/* @var $this ProductoController */
/* @var $model Producto */


$this->breadcrumbs=array(
	'Productos'=>array('index'),
	'Manage',
);

echo CHtml::link('Crear producto', array('producto/create'), array('class'=> 'btn btn-large btn-success')); 

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#producto-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>



<?php echo BsHtml::pageHeader('Gestionar','Productos') ?>
<?php if(Yii::app()->user->hasFlash('error')):?>
    <div class="info">

        <?php
echo BsHtml::alert(BsHtml::ALERT_COLOR_ERROR, BsHtml::bold('Error!  ') . 'No es posible eliminar este producto ya que se encuentra registrado en una compra');
?>

    </div>
<?php endif; ?>

<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="info">

        <?php
echo BsHtml::alert(BsHtml::ALERT_COLOR_SUCCESS, BsHtml::bold('Bien!  ') . 'Producto eliminado correctamente');
?>

    </div>
<?php endif; ?>



<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo BsHtml::button('Busqueda avanzada',array('class' =>'search-button', 'icon' => BsHtml::GLYPHICON_SEARCH,'color' => BsHtml::BUTTON_COLOR_PRIMARY), '#'); ?></h3>
    </div>
    <div class="panel-body">
      <p>
            Tabla resumen de los productos de nuestra página.
        </p>

        <div class="search-form" style="display:none">
            <?php $this->renderPartial('_search',array(
                'model'=>$model,
            )); ?>
        </div>
        <!-- search-form -->
                              <div class="table-responsive">

        <?php $this->widget('bootstrap.widgets.BsGridView',array(
			'id'=>'producto-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
 		'nombre_producto',
		'precio_producto',
		'detalle',
		'stock',
				'Categoria.nombre_categoria',
		'Usuario.nombre_completo',
			 'link' => array(
            'header' => 'Eliminar',
            'type' => 'raw',
            
             'value' => function($model) {
                    return CHtml::link("<center><i class='fa fa-trash-o' style='font-size: 20px' title='Eliminar'></i></center>",array('delete3', 'id' => $model->id_producto));
               
                 }
		),

				array(
					'class'=>'bootstrap.widgets.BsButtonColumn',
					            'template'=>'{update}{view}',

				),
			),
        )); ?>
    </div>
        </div>

</div>




