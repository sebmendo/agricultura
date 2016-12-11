<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
?>



<?php echo BsHtml::pageHeader('Registrar','cuenta') ?>

<?php $this->renderPartial('_form', array('model'=>$model,'tipo_usuario'=>$tipo_usuario,'comunas'=>$comunas)); ?>