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
<script type="text/javascript">
    $(document).ready(function () {
        $('#mensaje').hide();
    });
</script>
<script>

    function agregarProductos(posicion) {
        var unidades = document.getElementById("cantidad").value;
        $.ajax({
            url: '<?php echo Yii::app()->baseUrl . '/index.php?r=producto/addToCart2' ?>',
            type: 'get',
            data: {posicion: posicion, cantidad: unidades},
            success: function (data) {
                var carro = document.getElementById("totalproductos").innerHTML;
                var carro2 = carro.split("(");
                $('#totalproductos').empty();
                var total = parseInt(carro2[1]) + parseInt(unidades);
                $('#totalproductos').append('('+total+')');
                $('#nproductos').empty();
                if (unidades == 1) {
                    $('#nproductos').append('<div style="padding-right: 35px;" class="alert alert-success in fade"><a href="#" class="close" data-dismiss="alert" type="button">×</a><strong>Bien hecho!  </strong>Se han agregado ' + unidades + ' producto al carro</div>');
                } else {
                    $('#nproductos').append('<div style="padding-right: 35px;" class="alert alert-success in fade"><a href="#" class="close" data-dismiss="alert" type="button">×</a><strong>Bien hecho!  </strong>Se han agregado ' + unidades + ' productos al carro</div>');
                }
                $('#mensaje').show();
                $('#mensaje').delay(3000).hide(600);
            },
        });
    }
</script>
<!-- optionally if you need to use a theme, then include the theme JS file as mentioned below -->
<script src="recursos/themes/krajee-svg/theme.js"></script>
<div id="mensaje">
    <div id="nproductos" class="info">
    </div>  
</div>
<div class="row" style="margin: 20px">
    <div class="col-md-12">
        <div class="thumbnail" >

            <?php
            $imagen_producto = ImagenProducto::model()->find('id_producto=:id_producto', array(':id_producto' => $model2->id_producto));
            $val = ValoralizacionProducto::model()->findAll(array(
                'condition' => 'id_producto=:id',
                'params' => array('id' => $model2->id_producto),
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
            }
            ?>
            <?php
            $total_venta = 0;
            $total_productos = 0;
            $positions = Yii::app()->shoppingCart->getPositions();
            foreach ($positions as $position) {


                $total_productos += $position->getQuantity(); //2
            }
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
                    <center><div style="margin-right: 10px">
                            <?php echo '<input style="width: 15%;height: 32px;margin-top: 8px;" id="cantidad" type="number" min="1" value="1" max"' . $model2->stock . '" step="1" " class="form-control" />';
                            ?><?php echo ' ' . CHtml::button('Agregar al Carro', array('class' => 'btn btn-large btn-success', 'onclick' => 'agregarProductos(' . $model2->id_producto . ')')); ?>
                        </div></center>
                    <br>
                    <div style="border-bottom: 1px solid rgba(0,0,0,.125);margin-top: 9px;"></div>
                    <div class="caption-full" style="margin: 20px">
                        <p>Descripción: <br><br><?php echo $model2->detalle ?></p>
                    </div>
                    <div style="border-bottom: 1px solid rgba(0,0,0,.125);margin-top: 9px;"></div>

                    <div class="ratings" style="margin: 20px">
                        <p class="pull-right"><?php
                            echo count($model);
                            if (count($model) == 1) {
                                echo ' Valorización';
                            } else {
                                echo ' Valorizaciones';
                            }
                            ?></p>
                        <p>
                            <?php
                            if ($cantidad == 0) {
                                ?> 
                            <h4>No ha sido calificado</h4>
                            <?php
                        } else {
                            ?> 
                            <div style="font-size: 15px;"><input id="input-7-xs" class="rating rating-loading" data-show-clear="false" data-show-caption="true" value="<?php echo $suma / $cantidad; ?>" data-disabled="true" data-min="0" data-max="5" data-step="0.5" data-size="xs" style="font-size:10px"></div>

                            <?php
                        }
                        ?>
                        </p>
                    </div> 

                </div>
            </div>

        </div>

        <div class="well">
            <?php foreach ($model as $val) { ?>
                <div class="row">
                    <div class="col-md-12">
                        <div style="font-size: 10px;"><input id="input-7-xs" class="rating rating-loading" data-show-clear="false" data-show-caption="true" value="<?php echo $val->valoralizacion; ?>" data-disabled="true" data-min="0" data-max="5" data-step="0.5" data-size="xs" style="font-size:10px"></div>
                        <strong><?php
                            $compra = Compra::model()->findByPk($val->id_compra);
                            $usuario = Usuario::model()->findByPk($compra->id_usuario);
                            echo '<br>' . $usuario->username;
                            ?></strong>
                        <span class="pull-right"><?php
                            $date = date_create($val->fecha);
                            echo date_format($date, 'd-m-Y');
                            ?></span>
                        <p><?php echo '<br>' . $val->comentario; ?></p>
                    </div>
                </div>
                <hr>
            <?php } ?>


        </div>

    </div>
</div>