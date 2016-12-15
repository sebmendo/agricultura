<?php
/* @var $this ProductoController */
/* @var $model Producto */
?>

<?php
$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model2->id_producto,
);


?>
<!-- styles -->
<link href="recursos/css/font-awesome.css" rel="stylesheet">
<link href="recursos/css/bootstrap.min.css" rel="stylesheet">
<link href="recursos/css/animate.min.css" rel="stylesheet">
<link href="recursos/css/owl.carousel.css" rel="stylesheet">
<link href="recursos/css/owl.theme.css" rel="stylesheet">
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
<link href="recursos/css/star-rating.css" media="all" rel="stylesheet" type="text/css" />

<!-- optionally if you need to use a theme, then include the theme CSS file as mentioned below -->
<link href="recursos/themes/krajee-svg/theme.css" media="all" rel="stylesheet" type="text/css" />

<!-- important mandatory libraries -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.js"></script>
<script src="recursos/js/star-rating.js" type="text/javascript"></script>
<!-- optionally if you need to use a theme, then include the theme JS file as mentioned below -->
<script src="recursos/themes/krajee-svg/theme.js"></script>

<div class="row" style="margin: 20px">
    <div class="col-md-12">
        <div class="thumbnail" >

            <?php
            $imagen_producto = ImagenProducto::model()->find('id_producto=:id_producto', array(':id_producto' => $model2->id_producto));
            
            ?>
       

            <div class="row">
                <div class="col-md-6" style="margin-top: 50px">
                    <center><img class="img-responsive" src="images/<?php echo $imagen_producto->nombre_imagen ?>" alt=""></center>
                    <div style="border-right: 1px solid rgba(0,0,0,.125);margin-top: 9px;"></div>
                </div>
                <div class="col-md-6">
                    <div class="caption-full" style="margin: 20px">
                        <h4 class="pull-right">$<?php echo $model2->precio_producto ?></h4>
                        <h4 class="pull-left"><?php echo $model2->nombre_producto ?>
                        </h4>
                    </div><br><br><br>
             
                    <br>
                    <div style="border-bottom: 1px solid rgba(0,0,0,.125);margin-top: 9px;"></div>
                    <div class="caption-full" style="margin: 20px">
                        <p>Descripción: <br><br><?php echo $model2->detalle ?></p>
                    </div>
                    <div style="border-bottom: 1px solid rgba(0,0,0,.125);margin-top: 9px;"></div>

            

                </div>
            </div>

        </div>



    </div>



</div>