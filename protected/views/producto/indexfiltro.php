<?php
/* @var $this ProductoController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs = array(
    'Productos',
);

/* $this->menu=array(
  array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create Producto', 'url'=>array('create')),
  array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage Producto', 'url'=>array('admin')),
  ); */
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
<script>
    function listarProductos(categoria) {
        var nombreProducto = $('#busquedaProducto').val();
        if (nombreProducto == '') {
            $.ajax({
                url: '<?php echo Yii::app()->baseUrl . '/index.php?r=producto/vaciofiltro' ?>',
                type: 'post',
                data: {nombre: nombreProducto, categoria: categoria},
                success: function (data) {
                    var datos = data.split("/");
                    $('#content').empty();
                    var i = 0;
                    for (i = 0; i < datos.length - 1; i = i + 7) {
                        if (datos[i] != null) {
                            if (datos[i + 6] != 0) {
                                $("#content").append('<div class="col-md-4 col-sm-6"><a href="/agromercado/index.php?r=valoralizacionProducto/valorizacioncompleta&id='+datos[i]+'" style="color: #000" title="Ver producto"><div class="product"><div class="thumbnail"><img src="images/' + datos[i + 3] + '" style= "height: 150px; width: 200px;" class="img-responsive"><div style="border-bottom: 1px solid rgba(0,0,0,.125);margin-top: 9px;"></div><div class="caption-full" style="margin: 5px;"><div class="text"><h4 class="pull-right">$' + datos[i + 2] + '</h4><h4 class="pull-left">' + datos[i + 1] + '</h4><br><br><p>' + datos[i + 4] + '</p>Stock Disponible: ' + datos[i + 5] + '<br><br><div style="border-top: 1px solid rgba(0,0,0,.125);"></div><p></p><div style="float:left; margin-left: 10px; margin-top: 8px"><div id="refrescar" style="font-size: 7px;"><input id="input-' + datos[i] + '-xs" class="rating rating-loading" data-show-clear="false" data-show-caption="false" value="' + datos[i + 6] + '" data-disabled="true" data-min="0" data-max="5" data-step="0.5" data-size="xs" style="font-size:10px"></div></div><div style="float:left; margin-left: 25px;"><a class="btn btn-large btn-success" href="/agromercado/index.php?r=producto/addToCart&amp;id_producto=' + datos[i] + '"><span class="fa fa-shopping-cart"></span></a></div><br><br></div></div></div></div></a></div>');

                            } else {
                                $("#content").append('<div class="col-md-4 col-sm-6"><a href="/agromercado/index.php?r=valoralizacionProducto/valorizacioncompleta&id='+datos[i]+'" style="color: #000" title="Ver producto"><div class="product"><div class="thumbnail"><img src="images/' + datos[i + 3] + '" style= "height: 150px; width: 200px;" class="img-responsive"><div style="border-bottom: 1px solid rgba(0,0,0,.125);margin-top: 9px;"></div><div class="caption-full" style="margin: 5px;"><div class="text"><h4 class="pull-right">$' + datos[i + 2] + '</h4><h4 class="pull-left">' + datos[i + 1] + '</h4><br><br><p>' + datos[i + 4] + '</p>Stock Disponible: ' + datos[i + 5] + '<br><br><div style="border-top: 1px solid rgba(0,0,0,.125);"></div><p></p><div style="float:left; margin-left: 10px; margin-top: 8px"><h10 style="font-size: 10px;">No ha sido calificado</h10></div><div style="float:left; margin-left: 25px;"><a class="btn btn-large btn-success" href="/agromercado/index.php?r=producto/addToCart&amp;id_producto=' + datos[i] + '"><span class="fa fa-shopping-cart"></span></a></div><br><br></div></div></div></div></a></div>');
                            }
                            $('#input-' + datos[i] + '-xs').rating({});
                        } else {

                        }
                    }
                },
            });
        } else {
            $.ajax({
                url: '<?php echo Yii::app()->baseUrl . '/index.php?r=producto/busquedafiltro' ?>',
                type: 'post',
                data: {nombre: nombreProducto, categoria: categoria},
                success: function (data) {
                    var datos = data.split("/");
                    $('#content').empty();
                    for (i = 0; i < datos.length - 1; i = i + 7) {
                        if (datos[i] != null) {
                            if (datos[i + 6] != 0) {
                                $("#content").append('<div class="col-md-4 col-sm-6"><a href="/agromercado/index.php?r=valoralizacionProducto/valorizacioncompleta&id='+datos[i]+'" style="color: #000" title="Ver producto"><div class="product"><div class="thumbnail"><img src="images/' + datos[i + 3] + '" style= "height: 150px; width: 200px;" class="img-responsive"><div style="border-bottom: 1px solid rgba(0,0,0,.125);margin-top: 9px;"></div><div class="caption-full" style="margin: 5px;"><div class="text"><h4 class="pull-right">$' + datos[i + 2] + '</h4><h4 class="pull-left">' + datos[i + 1] + '</h4><br><br><p>' + datos[i + 4] + '</p>Stock Disponible: ' + datos[i + 5] + '<br><br><div style="border-top: 1px solid rgba(0,0,0,.125);"></div><p></p><div style="float:left; margin-left: 10px; margin-top: 8px"><div id="refrescar" style="font-size: 7px;"><input id="input-' + datos[i] + '-xs" class="rating rating-loading" data-show-clear="false" data-show-caption="false" value="' + datos[i + 6] + '" data-disabled="true" data-min="0" data-max="5" data-step="0.5" data-size="xs" style="font-size:10px"></div></div><div style="float:left; margin-left: 25px;"><a class="btn btn-large btn-success" href="/agromercado/index.php?r=producto/addToCart&amp;id_producto=' + datos[i] + '"><span class="fa fa-shopping-cart"></span></a></div><br><br></div></div></div></div></a></div>');

                            } else {
                                $("#content").append('<div class="col-md-4 col-sm-6"><a href="/agromercado/index.php?r=valoralizacionProducto/valorizacioncompleta&id='+datos[i]+'" style="color: #000" title="Ver producto"><div class="product"><div class="thumbnail"><img src="images/' + datos[i + 3] + '" style= "height: 150px; width: 200px;" class="img-responsive"><div style="border-bottom: 1px solid rgba(0,0,0,.125);margin-top: 9px;"></div><div class="caption-full" style="margin: 5px;"><div class="text"><h4 class="pull-right">$' + datos[i + 2] + '</h4><h4 class="pull-left">' + datos[i + 1] + '</h4><br><br><p>' + datos[i + 4] + '</p>Stock Disponible: ' + datos[i + 5] + '<br><br><div style="border-top: 1px solid rgba(0,0,0,.125);"></div><p></p><div style="float:left; margin-left: 10px; margin-top: 8px"><h10 style="font-size: 10px;">No ha sido calificado</h10></div><div style="float:left; margin-left: 25px;"><a class="btn btn-large btn-success" href="/agromercado/index.php?r=producto/addToCart&amp;id_producto=' + datos[i] + '"><span class="fa fa-shopping-cart"></span></a></div><br><br></div></div></div></div></a></div>');
                            }
                            $('#input-' + datos[i] + '-xs').rating({});
                        } else {

                        }
                    }
                },
            });
        }
    }

</script>
<!-- theme stylesheet -->



<div class="producto-index">


    <?php
    $total_productos = 0;
    $positions = Yii::app()->shoppingCart->getPositions();
    foreach ($positions as $position) {


        $total_productos += $position->getQuantity(); //2
    }
    ?>






    <?php if (Yii::app()->user->hasFlash('success')): ?>
        <div class="info">

            <?php
            echo BsHtml::alert(BsHtml::ALERT_COLOR_SUCCESS, BsHtml::bold('Bien hecho!  ') . 'El producto se ha agregado exitosamente a su carro de compras');
            ?>

        </div>
    <?php endif; ?>
    <div class="row" style="padding: 20px;">
        <h2>Buscador</h2>
        <div id="custom-search-input" style="width: 70%;">
            <div class="input-group col-md-4">
                <input id="busquedaProducto" style="height: 34px;" type="text" class="  search-query form-control" placeholder="Buscar por Nombre" onkeyup="listarProductos(<?php echo $id_categoria; ?>)" />
                <span class="input-group-btn">
                    <button class="btn btn-danger" type="button">
                        <span class=" glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </div>
    </div>   
    <div class="box">
        <h1>Productos</h1>
        <p>Los productos son:</p>
    </div> 



    <div class="col-md-3">
        <!-- *** MENUS AND FILTERS ***
_________________________________________________________ -->
        <div class="panel panel-default sidebar-menu">

            <div class="panel-heading">
                <h3 class="panel-title">Categorias</h3>
            </div>

            <div class="panel-body">

                <ul class="nav nav-pills nav-stacked category-menu">
                    <li>



                        <?php echo CHtml::link('Todos', array('producto/index2')); ?>


                    </li>
                    <?php
                    $cont = 0;
                    foreach ($categorias as $categoria) {
                        ?>


                        <li>



                            <?php echo CHtml::link($categoria->nombre_categoria, array('producto/indexfiltro', 'id_categoria' => $categoria->id_categoria)); ?>
                            <?php
                            $cont++;
                            ?>

                        </li>
                    <?php } ?>
                </ul>

            </div>
        </div>




        <!-- *** MENUS AND FILTERS END *** -->


    </div>


    <div class="col-md-9">

        <div class="row products" id="content">
            <?php
            foreach ($productos as $producto) {
                ?>






                <div class="col-md-4 col-sm-6">
                    <a href="/agromercado/index.php?r=valoralizacionProducto/valorizacioncompleta&id=<?php echo $producto->id_producto; ?>" style="color: #000" title="Ver producto">

                    <div class="product">




                        <?php
                        $imagen_producto = ImagenProducto::model()->find('id_producto=:id_producto', array(':id_producto' => $producto->id_producto));
                        ?>




                        <div class="thumbnail">
                            <?php echo '<img src="images/' . $imagen_producto->nombre_imagen . '" style= "height: 150px; width: 200px;"class="img-responsive">'; ?>
                            <div style="border-bottom: 1px solid rgba(0,0,0,.125);margin-top: 9px;"></div>
                            <div class="caption-full" style="    margin: 5px;">
                                <h4 class="pull-right">$<?php echo $producto->precio_producto; ?></h4>
                                <h4 class="pull-left"><?php echo $producto->nombre_producto; ?>
                                </h4><br><br>
                                <p><?php echo $producto->detalle; ?></p>
                                <?php echo 'Stock Disponible: ' . $producto->stock; ?>

                                <br><br>


                                    <?php 
                                    $usuario_vende_producto= Usuario::model()->findByPk($producto->id_usuario);
                        
                                    $comuna_ubicacion_producto= Comuna::model()->findByPk($usuario_vende_producto->id_comuna);

                                    echo 'Ubicacion: '. $comuna_ubicacion_producto->nombre_comuna;

                                    ?>

                                <div style="border-top: 1px solid rgba(0,0,0,.125);"></div>
                                <p>

                                <div style="float:left; margin-left: 10px; margin-top: 8px">
                                    <?php
                                    $val = ValoralizacionProducto::model()->findAll(array(
                                        'condition' => 'id_producto=:id',
                                        'params' => array('id' => $producto->id_producto),
                                    ));
                                    $cantidad = 0;
                                    $suma = 0;
                                    //echo '<a href="#">';
                                    if (count($val) > 0) {
                                        foreach ($val as $valorizacion) {
                                            $suma = $suma + $valorizacion->valoralizacion;
                                            $cantidad++;
                                        }
                                        ?>
                                        <?php
                                        echo '<div style="font-size: 7px;"><input id="input-7-xs" class="rating rating-loading" data-show-clear="false" data-show-caption="false" value="' . $suma / $cantidad . '" data-disabled="true" data-min="0" data-max="5" data-step="0.5" data-size="xs" style="font-size:10px"></div>';
                                    } else {
                                        echo '<h10 style="font-size: 10px;">No ha sido calificado</h10>';
                                    }
                                    //echo '</a>'
                                    ?>

                                </div>
                                <div style="float:right; margin-right: 10px">
                                    <?php echo CHtml::link('<span class="fa fa-shopping-cart"></span>', array('producto/addToCart', 'id_producto' => $producto->id_producto), array('class' => 'btn btn-large btn-success')); ?>
                                </div>
                                <br><br>
                                </p>
                            </div>

                        </div>  
                        <!-- /.text -->


                        <!-- /.ribbon -->

                    </div>
                </a>
                    <!-- /.product -->
                </div>




            <?php }
            ?>

        </div>


        <?php
        $this->widget('CLinkPager', array(
            'pages' => $pages,
        ))
        ?>

    </div>



</div>





