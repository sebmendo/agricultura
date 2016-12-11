<?php
/* @var $this ImagenProductoController */
/* @var $model ImagenProducto */
/* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <?php echo $form->textFieldControlGroup($model,'id_imagen_producto'); ?>
    <?php echo $form->textFieldControlGroup($model,'nombre_imagen',array('maxlength'=>500)); ?>
    <?php echo $form->textFieldControlGroup($model,'id_producto'); ?>

    <div class="form-actions">
        <?php echo BsHtml::submitButton('Search',  array('color' => BsHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

<?php $this->endWidget(); ?>
