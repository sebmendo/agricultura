<?php
/* @var $this ProductoController */
/* @var $model Producto */
/* @var $form BSActiveForm */

        $categorias= Categoria::model()->findAll();

?>

<?php $form=$this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'action'=>Yii::app()->createUrl($this->route),
    'method'=>'get',
)); ?>


 <div class="row">
        <div class="col-md-4">
    <?php echo $form->textFieldControlGroup($model,'id_producto'); ?>

</div>

 <div class="col-md-4">
    <?php echo $form->textFieldControlGroup($model,'nombre_producto',array('maxlength'=>70)); ?>

    </div>




   <div class="col-md-4">

    <?php echo $form->textFieldControlGroup($model,'precio_producto',array('maxlength'=>10)); ?>
    </div>

    
</div>
<div class="row">

 <div class="col-md-4">
     <?php echo $form->labelEx($model,'categoria'); ?>
        <?php echo $form->dropDownList($model,'id_categoria',CHtml::listData($categorias,'id_categoria','nombre_categoria'));?>

                      
    </div>
    </div>
 

    <div class="form-actions">
        <?php echo BsHtml::submitButton('Search',  array('color' => BsHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

<?php $this->endWidget(); ?>
