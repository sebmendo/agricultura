<?php
$cs = Yii::app()->clientScript;

/**
 * StyleSHeets
 */
	
/**
 * JavaScripts
 */
$cs
    ->registerCoreScript('jquery',CClientScript::POS_END)
    ->registerCoreScript('jquery.ui',CClientScript::POS_END)
    ->registerScriptFile('recursos/js/bootstrap.min.js',CClientScript::POS_END)

    ->registerScript('tooltip',
        "$('[data-toggle=\"tooltip\"]').tooltip();
        $('[data-toggle=\"popover\"]').tooltip()"
        ,CClientScript::POS_READY);

?>

<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="es">
    <meta name="robots" content="all,follow">
    <meta name="googlebot" content="index,follow,snippet,archive">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <link href="recursos/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
    <!-- styles -->
    <link href="recursos/css/font-awesome.css" rel="stylesheet">
    <link href="recursos/css/bootstrap.min.css" rel="stylesheet">
    <link href="recursos/css/animate.min.css" rel="stylesheet">
    <link href="recursos/css/owl.carousel.css" rel="stylesheet">
    <link href="recursos/css/owl.theme.css" rel="stylesheet">
    <!-- theme stylesheet -->
    <link href="recursos/css/style.default.css" rel="stylesheet" id="theme-stylesheet">
    <script>$(document).ready(function(){
   jQuery.noConflict();
});</script>

    <!-- your stylesheet with modifications -->
    <link href="recursos/css/custom.css" rel="stylesheet">
    
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
$this->widget('bootstrap.widgets.BsNavbar', array(
    'collapse' => true,
    'brandLabel' => BsHtml::icon(BsHtml::GLYPHICON_HOME).' AgroMercado',
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
                        

                    )
                ),
                array(
                    'label' => 'Inicio',
                    'url' => array(
                        '/site/index'
                    )
                ),
				array(
                    'label' => 'Listado de productos',
 
                    'url' => array(
                        '/producto/index2'
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