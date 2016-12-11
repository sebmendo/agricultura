<?php
/* @var $this CompraController */
/* @var $model Compra */


$this->breadcrumbs=array(
	'Compras'=>array('index'),
	'Manage',
);

 

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#compra-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<?php echo BsHtml::pageHeader('Administrar','rutas') ?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php echo BsHtml::button('Advanced search',array('class' =>'search-button', 'icon' => BsHtml::GLYPHICON_SEARCH,'color' => BsHtml::BUTTON_COLOR_PRIMARY), '#'); ?></h3>
    </div>
    <div class="panel-body">
        <p>
            You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
                &lt;&gt;</b>
            or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
        </p>

        <div class="search-form" style="display:none">
            <?php $this->renderPartial('_search',array(
                'model'=>$model,
            )); ?>
        </div>
        <!-- search-form -->
                              <div class="table-responsive">

        <?php $this->widget('bootstrap.widgets.BsGridView',array(
			'id'=>'compra-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
        	'id_compra',
			'fecha',
			'precio_total',
			//'observacion',
			array(
					'class'=>'CLinkColumn',
 					'label'=>'Ver ruta',
			       'urlExpression'=>'Yii::app()->createUrl("/compra/verruta", array("id" => $data["id_compra"]))'
			),
			),
 

        )); ?>
    </div>
        </div>

</div>
