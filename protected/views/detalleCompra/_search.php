<?php
/* @var $this DetalleCompraController */
/* @var $model DetalleCompra */
/* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <?php echo $form->textFieldControlGroup($model,'id_detalle_compra'); ?>
    <?php echo $form->textFieldControlGroup($model,'id_compra'); ?>
    <?php echo $form->textFieldControlGroup($model,'id_producto'); ?>
    <?php echo $form->textFieldControlGroup($model,'precio',array('maxlength'=>10)); ?>
    <?php echo $form->textFieldControlGroup($model,'cantidad',array('maxlength'=>10)); ?>

    <div class="form-actions">
        <?php echo BsHtml::submitButton('Search',  array('color' => BsHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

<?php $this->endWidget(); ?>
