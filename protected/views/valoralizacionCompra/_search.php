<?php
/* @var $this ValoralizacionCompraController */
/* @var $model ValoralizacionCompra */
/* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <?php echo $form->textFieldControlGroup($model,'id_valoralizacion_compra'); ?>
    <?php echo $form->textFieldControlGroup($model,'id_compra'); ?>
    <?php echo $form->textFieldControlGroup($model,'valoralizacion'); ?>

    <div class="form-actions">
        <?php echo BsHtml::submitButton('Search',  array('color' => BsHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

<?php $this->endWidget(); ?>
