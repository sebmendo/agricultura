<?php
/* @var $this CompraController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs = array(
    'Compras',
);
?>

<?php echo BsHtml::pageHeader('Detalle de la compra') ?>
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



<div class="producto-index">
    <div class="box">

        <form method="post" action="checkout1.html">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Imagen</th>
                            <th>Producto</th>

                            <th>Cantidad</th>

                            <th>Precio unitario</th>
                            <th colspan="1">Total</th>
                            <th colspan="2">Calificación</th>
                        </tr>
                    </thead>
                    <tbody>




                        <?php
                        $total_venta = 0;
                        foreach ($detalle_compras as $detalle_compra) {



                            $producto = Producto::model()->find('id_producto=:id_producto', array(':id_producto' => $detalle_compra->id_producto));

                            //  echo $position->nombre_producto;
                            //echo $position->quantity;
                            //var_dump($position);
                            ?>
                            <tr>
                                <td>
                                    <a href="#">
                                        <?php
                                        $imagen_producto = ImagenProducto::model()->find('id_producto=:id_producto', array(':id_producto' => $producto->id_producto));

                                        echo '<img src="images/' . $imagen_producto->nombre_imagen . '" style= "height: 100px; width: 100px;"class="img-responsive">';
                                        ?>




                                    </a>
                                </td>
                                <td><?php echo $producto->nombre_producto; ?>
                                </td>
                                <td>    
                                    <?php
                                    echo $detalle_compra->cantidad;
                                    ?>

                                </td>
                                <td>$<?php echo $producto->precio_producto; ?></td>
                                <td>$<?php
                                    echo $detalle_compra->precio * $detalle_compra->cantidad;
                                    ;
                                    ?></td>

                                <td colspan="2">
                                    <?php
                                    $val = null;
                                    $val = ValoralizacionProducto::model()->count(array(
                                        'condition' => 'id_producto=:id and id_compra=:id2',
                                        'params' => array('id' => $producto->id_producto, 'id2' => $detalle_compra->id_compra),
                                    ));
                                    if ($compra->estado_compra == 1 && $val == 0) {
                                        echo CHtml::link('Calificar', array('valoralizacionProducto/create', 'id' => $producto->id_producto, 'id_compra' => $detalle_compra->id_compra), array('class' => 'btn btn-large btn-primary'));
                                    } else {
                                        if ($compra->estado_compra == 1) {
                                            $val = ValoralizacionProducto::model()->find(array(
                                                'condition' => 'id_producto=:id and id_compra=:id2',
                                                'params' => array('id' => $producto->id_producto, 'id2' => $detalle_compra->id_compra),
                                            ));
                                            echo '<input id="input-7-xs" class="rating rating-loading" data-show-clear="false" data-show-caption="true" value="'.$val->valoralizacion.'" data-disabled="true" data-min="0" data-max="5" data-step="0.5" data-size="xs">';
                                           
                                            ?>

                                            <?php
                                        }else{
                                            echo 'No hay';
                                        }
                                    }
                                    ?>
                                </td>
                                <?php
                                $total_venta+=$detalle_compra->precio * $detalle_compra->cantidad;
                                ;
                                ?>

                            <?php } ?>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="6">Costo de distribución</th>

                            <th colspan="4">$<?php echo $compra->costo_distribucion; ?></th>
                        </tr>

                        <tr>
                            <th colspan="6">Total Venta</th>
                            <th id="totalVenta" colspan="4">$<?php echo $total_venta; ?></th>
                        </tr>

                        <tr>
                            <th colspan="6">Total pagado</th>

                            <th colspan="4">$<?php echo $compra->precio_total; ?></th>
                        </tr>


                    </tfoot>


                </table>
                <center>
                </center>

            </div>
            <!-- /.table-responsive -->



        </form>

    </div>

</div>