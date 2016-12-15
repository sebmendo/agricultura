<?php
/* @var $this ProductoController */
/* @var $model Producto */
/* @var $form BSActiveForm */
?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id'=>'producto-form',
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>

    <p class="help-block">Los campos con <span class="required">*</span> son requeridos.</p>

    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <div class="col-md-4">

    <?php echo $form->textFieldControlGroup($model,'nombre_producto',array('maxlength'=>70)); ?>
</div>
   <div class="col-md-4">

    <?php echo $form->textFieldControlGroup($model,'precio_producto',array('maxlength'=>10)); ?>
    </div>

    
  <div class="col-md-4">

    <?php echo $form->textFieldControlGroup($model,'stock'); ?>
    </div>


</div>
<div class="row">

 <div class="col-md-4">
     <?php echo $form->labelEx($model,'categoria'); ?>
        <?php echo $form->dropDownList($model,'id_categoria',CHtml::listData($categorias,'id_categoria','nombre_categoria'));?>

                            <?php echo $form->labelEx($model,'detalle'); ?>

    <?php echo $form->textArea($model,'detalle',array('maxlength'=>500)); ?>
        <?php echo $form->error($model,'detalle'); ?>


  <?php 
        $this->widget('CMultiFileUpload', array(
                'name' => 'images',
                'accept' => 'jpeg|jpg', // useful for verifying files
                'duplicate' => 'Archivo Ya esta Seleccionado!', // useful, i think
                'denied' => 'Deben ser Solo imagenes en formato: .jpeg o .jpg ', // useful, i think
            ));
    ?>
    </div>
    </div>

  
    <br>
    <?php echo BsHtml::submitButton('Guardar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>

<?php $this->endWidget(); ?>
