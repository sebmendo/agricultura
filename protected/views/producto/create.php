<?php
/* @var $this ProductoController */
/* @var $model Producto */
?>

<?php
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	'Create',
);

 
?>

<?php echo BsHtml::pageHeader('Registrar','Producto') ?>


  <?php if(Yii::app()->user->hasFlash('error')):?>
    <div class="info">

        <?php
echo BsHtml::alert(BsHtml::ALERT_COLOR_ERROR, BsHtml::bold('Error!  ') . 'Debe seleccionar una imagen para registrar el producto');
?>

    </div>
<?php endif; ?>



<?php $this->renderPartial('_form', array('model'=>$model,'categorias'=>$categorias)); ?>