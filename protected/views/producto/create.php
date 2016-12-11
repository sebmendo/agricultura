<?php
/* @var $this ProductoController */
/* @var $model Producto */
?>

<?php
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	'Create',
);

echo CHtml::link('Gestionar Productos', array('producto/adminproductor'), array('class'=> 'btn btn-large btn-success')); 

?>

<?php echo BsHtml::pageHeader('Create','Producto') ?>


  <?php if(Yii::app()->user->hasFlash('error')):?>
    <div class="info">

        <?php
echo BsHtml::alert(BsHtml::ALERT_COLOR_ERROR, BsHtml::bold('Error!  ') . 'Debe seleccionar una imagen para registrar el producto');
?>

    </div>
<?php endif; ?>



<?php $this->renderPartial('_form', array('model'=>$model,'categorias'=>$categorias)); ?>