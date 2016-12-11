<?php
/* @var $this CompraController */
/* @var $model Compra */
/* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>

    <?php echo $form->textFieldControlGroup($model,'id_compra'); ?>
    <?php echo $form->textFieldControlGroup($model,'fecha'); ?>
    <?php echo $form->textFieldControlGroup($model,'precio_total',array('maxlength'=>10)); ?>
    <?php echo $form->textFieldControlGroup($model,'observacion',array('maxlength'=>300)); ?>

    <div class="form-actions">
        <?php echo BsHtml::submitButton('Search',  array('color' => BsHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

<?php $this->endWidget(); ?>
