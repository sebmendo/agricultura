<?php
/* @var $this CompraController */
/* @var $model Compra */
/* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id'=>'compra-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>


    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        
        <div class="col-md-4">

    <?php
    echo 'Precio total a pagar:'.$model->precio_total;
 ?>

    </div>


</div>
         <div class="row">
                    <div class="col-md-4">


                                        <?php echo $form->labelEx($model,'observacion'); ?>

    <?php echo $form->textArea($model,'observacion',array('maxlength'=>300)); ?>
        <?php echo $form->error($model,'observacion'); ?>
    </div>

 </div>
    <?php echo BsHtml::submitButton('Comprar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>

<?php $this->endWidget(); ?>
