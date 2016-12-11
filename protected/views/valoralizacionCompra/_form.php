<?php
/* @var $this ValoralizacionCompraController */
/* @var $model ValoralizacionCompra */
/* @var $form BSActiveForm */
?>

<?php
$form = $this->beginWidget('bootstrap.widgets.BsActiveForm', array(
    'id' => 'valoralizacion-compra-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation' => false,
        ));
?>
<!-- default styles -->
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
<link href="recursos/css/star-rating.css" media="all" rel="stylesheet" type="text/css" />

<!-- optionally if you need to use a theme, then include the theme CSS file as mentioned below -->
<link href="recursos/themes/krajee-svg/theme.css" media="all" rel="stylesheet" type="text/css" />

<!-- important mandatory libraries -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>
<script src="recursos/js/star-rating.js" type="text/javascript"></script>

<!-- optionally if you need to use a theme, then include the theme JS file as mentioned below -->
<script src="recursos/themes/krajee-svg/theme.js"></script>

<!-- optionally if you need translation for your language then include locale file as mentioned below -->
<script src="recursos/js/locales/<lang>.js"></script>

<?php echo $form->errorSummary($model); ?>


<label for="input-1" class="control-label">Calificación</label>
<input id="ValoralizacionCompra_valoralizacion" name="ValoralizacionCompra[valoralizacion]" class="rating rating-loading" data-min="0" data-max="5" data-step="1">
<?php echo $form->textAreaControlGroup($model, 'comentario'); ?>
<?php echo BsHtml::submitButton('Enviar', array('color' => BsHtml::BUTTON_COLOR_PRIMARY)); ?>

<?php $this->endWidget(); ?>
