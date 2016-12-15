<?php
/* @var $this ProductoController */
/* @var $model Producto */
?>

<?php
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model->id_producto=>array('view','id'=>$model->id_producto),
	'Update',
);
?> 
<?php if(Yii::app()->user->hasFlash('error')):?>
    <div class="info">

        <?php
echo BsHtml::alert(BsHtml::ALERT_COLOR_ERROR, BsHtml::bold('Error!  ') . 'Debe seleccionar una imagen para actualizar el producto');
?>

    </div>
<?php endif; ?>
<?php

echo CHtml::link('Gestionar Productos', array('producto/adminproductor'), array('class'=> 'btn btn-large btn-success')); 

?>



<div align="right">
<?php



?>
</div>
<?php echo BsHtml::pageHeader('Editando','Producto ') ?>
<?php $this->renderPartial('_form', array('model'=>$model,'categorias'=>$categorias)); ?>