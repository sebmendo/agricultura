<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>
       <!-- styles -->
    

    <!-- theme stylesheet -->
    <script src="recursos/js/jquery.rut.js"></script>


<div class="box">


<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

 
	<?php echo $form->errorSummary($model); ?>
 	<div class="row">
        <div class="col-md-4">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'username'); ?>
	
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'password'); ?>
 
 		<?php echo $form->labelEx($model,'rut'); ?>
		<?php echo $form->textField($model,'rut',array('id' => 'rut',' maxlength'=>20)); ?>
		<?php echo $form->error($model,'rut'); ?>
     </div>


         <div class="col-md-4">

 		<?php echo $form->labelEx($model,'nombre_completo'); ?>
		<?php echo $form->textField($model,'nombre_completo',array('size'=>60,'maxlength'=>70)); ?>
		<?php echo $form->error($model,'nombre_completo'); ?>
	
 		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>70)); ?>
		<?php echo $form->error($model,'email'); ?>

		<?php echo $form->labelEx($model,'telefono'); ?>
		<?php echo $form->textField($model,'telefono',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'telefono'); ?>
	            </div>

            <div class="col-md-4">

		<?php echo $form->labelEx($model,'direccion'); ?>
		<?php echo $form->textField($model,'direccion',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'direccion'); ?>


		<?php echo $form->labelEx($model,'Tipo Usuario'); ?>
        <?php echo $form->dropDownList($model,'id_tipo_usuario',CHtml::listData($tipo_usuario,'id_tipo_usuario','nombre_tipo'));?>

		<?php echo $form->error($model,'id_tipo_usuario'); ?>


		<?php echo $form->labelEx($model,'Comuna'); ?>
        <?php echo $form->dropDownList($model,'id_comuna',CHtml::listData($comunas,'id_comuna','nombre_comuna'));?>
		<?php echo $form->error($model,'id_comuna'); ?>

    </div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Registrar' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
    
$("input#rut").rut({
    formatOn: 'keyup'
});

</script>