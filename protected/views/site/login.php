<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<?php if(Yii::app()->user->hasFlash('error')):?>
    <div class="info">

        <?php
echo BsHtml::alert(BsHtml::ALERT_COLOR_ERROR, BsHtml::bold('Error!  ') . 'Debe Iniciar Sesión para Comprar');
?>

    </div>
<?php endif; ?>
<h1>Iniciar sesión</h1>
 <?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="info">

        <?php
echo BsHtml::alert(BsHtml::ALERT_COLOR_SUCCESS, BsHtml::bold('Bien hecho!  ') . 'Su cuenta de usuario ha sido creada exitosamente, inicie sesion para continuar');
        
?>

    
    </div>
<?php endif; ?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>


	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		
	</div>
    <br>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Login', array('class' => 'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
