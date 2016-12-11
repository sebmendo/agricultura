<?php
/* @var $this DetalleCompraController */
/* @var $model DetalleCompra */
/* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id'=>'detalle-compra-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->textFieldControlGroup($model,'id_compra'); ?>
    <?php echo $form->textFieldControlGroup($model,'id_producto'); ?>
    <?php echo $form->textFieldControlGroup($model,'precio',array('maxlength'=>10)); ?>
    <?php echo $form->textFieldControlGroup($model,'cantidad',array('maxlength'=>10)); ?>

    <?php echo BsHtml::submitButton('Submit', array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>

<?php $this->endWidget(); ?>
