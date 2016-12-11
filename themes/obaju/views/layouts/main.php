<?php
$cs = Yii::app()->clientScript;
$themePath = Yii::app()->theme->baseUrl;

/**
 * StyleSHeets
 */
$cs
        ->registerCssFile($themePath . '/assets/css/bootstrap.css')
        ->registerCssFile($themePath . '/assets/css/animate.min.css')
        ->registerCssFile($themePath . '/assets/css/owl.theme.css')
        ->registerCssFile($themePath . '/assets/css/owl.carousel.css')
        ->registerCssFile($themePath . '/assets/css/bootstrap.min.css');

/**
 * JavaScripts
 */
$cs
        ->registerCoreScript('jquery', CClientScript::POS_END)
        ->registerCoreScript('jquery.ui', CClientScript::POS_END)
        ->registerScriptFile($themePath . '/assets/js/bootstrap.min.js', CClientScript::POS_END)
        ->registerScript('tooltip', "$('[data-toggle=\"tooltip\"]').tooltip();
        $('[data-toggle=\"popover\"]').tooltip()"
                , CClientScript::POS_READY);
?>
<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
    <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/html5shiv.js"></script>
    <script src="<?php echo Yii::app()->theme->baseUrl ?>/assets/js/respond.min.js"></script>
<![endif]-->
<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="en">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

        <!-- blueprint CSS framework -->

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>


    <body>



<?php
$usuarios = CHtml::listData(Usuario::model()->findAll(array(
    'condition'=>'username=:name',
    'params'=> array(':name'=>Yii::app()->user->name),
)),'id_tipo_usuario', 'id_tipo_usuario');
$id_user_conectado = ''; 
foreach($usuarios as $usuario){
    $id_user_conectado = $usuario; 
}

function visible($id_user_conectado) {
    if ($id_user_conectado == 3 && !Yii::app()->user->isGuest) {
        return true;
    } else {
        return false;
    }
}

function visibleProductor($id_user_conectado) {
    if ($id_user_conectado == 2 && !Yii::app()->user->isGuest) {
        return true;
    } else {
        return false;
    }
}

function visibleCliente($id_user_conectado) {
    if ($id_user_conectado == 1 && !Yii::app()->user->isGuest) {
        return true;
    } else {
        return false;
    }
}

$this->widget('bootstrap.widgets.BsNavbar', array(
    'collapse' => true,
    'brandLabel' => BsHtml::icon(BsHtml::GLYPHICON_HOME) . ' AgroMercado',
    'brandUrl' => Yii::app()->homeUrl,
    'items' => array(
        array(
            'class' => 'bootstrap.widgets.BsNav',
            'type' => 'navbar',
            'activateParents' => true,
            'items' => array(
            )
        ),
        array(
            'class' => 'bootstrap.widgets.BsNav',
            'type' => 'navbar',
            'activateParents' => true,
            'items' => array(
                array(
                    'label' => 'Mantenedores',
                    'url' => array(
                        '#'
                    ),
                    'items' => array(
                        array(
                            'label' => 'Producto',
                            'url' => array(
                                '/producto/admin'
                            )
                        ),
                        array(
                            'label' => 'Imagen Producto',
                            'url' => array(
                                '/imagenProducto/admin'
                            )
                        ),
                        array(
                            'label' => 'Valoración Producto',
                            'url' => array(
                                '/valoralizacionProducto/admin'
                            )
                        ),
                        array(
                            'label' => 'Compra',
                            'url' => array(
                                '/compra/admin'
                            )
                        ),
                        array(
                            'label' => 'Detalle Compra',
                            'url' => array(
                                '/detalleCompra/admin'
                            )
                        ),
                        array(
                            'label' => 'Valoración Compra',
                            'url' => array(
                                '/valoralizacionCompra/admin'
                            )
                        ),
                        array(
                            'label' => 'Categoría',
                            'url' => array(
                                '/categoria/admin'
                            )
                        ),
                        array(
                            'label' => 'Usuario',
                            'url' => array(
                                '/usuario/admin'
                            )
                        ),
                        array(
                            'label' => 'Tipo de Usuario',
                            'url' => array(
                                '/tipoUsuario/admin'
                            )
                        ),
                        array(
                            'label' => 'Comuna',
                            'url' => array(
                                '/comuna/admin'
                            )
                        ),
                    ),
                    'visible' => visible($id_user_conectado)
                ),
                array(
                    'label' => 'Inicio',
                    'url' => array(
                        '/site/index'
                    )
                ),
                array(
                    'label' => 'Acerca de',
                    'url' => array(
                        '/site/page',
                        'view' => 'about'
                    )
                ),
                array(
                    'label' => 'Contacto',
                    'url' => array(
                        '/site/contact'
                    )
                ),
                array(
                    'label' => 'Registrarse',
                    'url' => array(
                        '/usuario/create'
                    ),
                    'visible' => Yii::app()->user->isGuest
                ),
                array(
                    'label' => 'Iniciar Sesión',
                    'url' => array(
                        '/site/login'
                    ),
                    'pull' => BsHtml::NAVBAR_NAV_PULL_RIGHT,
                    'visible' => Yii::app()->user->isGuest
                ),
                array(
                    'label' => 'Cerrar Sesión (' . Yii::app()->user->name . ')',
                    'pull' => BsHtml::NAVBAR_NAV_PULL_RIGHT,
                    'url' => array(
                        '/site/logout'
                    ),
                    'visible' => !Yii::app()->user->isGuest
                )
            ),
            'htmlOptions' => array(
                'pull' => BsHtml::NAVBAR_NAV_PULL_RIGHT
            )
        )
    )
));
?>












<?php
$this->beginWidget('bootstrap.widgets.BsPanel', array(
    'footer' => '<center>AgroMercado 2016</center>'
));
?>
<?php echo $content; ?>
<?php
$this->endWidget();
?>










    </body>

</html>