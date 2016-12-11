    
<?php
$this->breadcrumbs=array(
  'Productos',
);

/*$this->menu=array(
    array('icon' => 'glyphicon glyphicon-plus-sign','label'=>'Create Producto', 'url'=>array('create')),
    array('icon' => 'glyphicon glyphicon-tasks','label'=>'Manage Producto', 'url'=>array('admin')),
);*/
?>


    <link href="recursos/css/font-awesome.css" rel="stylesheet">
    <link href="recursos/css/bootstrap.min.css" rel="stylesheet">
    <link href="recursos/css/animate.min.css" rel="stylesheet">
    <link href="recursos/css/owl.carousel.css" rel="stylesheet">
    <link href="recursos/css/owl.theme.css" rel="stylesheet">


<script type="text/javascript">

   function cambiarValor(cantidad, stock){
       var unidades = document.getElementById("cantidad"+cantidad).value;
       if(unidades > stock){
           unidades = stock;
           document.getElementById("cantidad"+cantidad).value = stock;
           alert('El máximo de stock disponible es: '+stock+' unidades');
       }
       var precioTotalActual = document.getElementById("precioTotal"+cantidad).innerHTML;
       var precioUnitario  = document.getElementById("precio"+cantidad).innerHTML;
       var totalVenta = document.getElementById("totalVenta").innerHTML;
       $('#precioTotal'+cantidad).empty();
       $('#precioTotal'+cantidad).append(unidades*precioUnitario);
       var precioTotalActual2 = document.getElementById("precioTotal"+cantidad).innerHTML;
       $('#totalVenta').empty();
       var totalFinal = parseInt(totalVenta)+(parseInt(precioTotalActual2)-parseInt(precioTotalActual));
       $('#totalVenta').append(totalFinal);
              $('#totalPagar').empty();

       var totalPagar= parseInt(totalFinal)+15000;
       $('#totalPagar').append(totalPagar);

       $.ajax({
            url: '<?php echo Yii::app()->baseUrl.'/index.php?r=producto/total'?>',
            type: 'post',
            data: {posicion: cantidad, cantidad: unidades},
            success: function (data) {
                $('#totalProductos').empty();
                $('#totalProductos').append('Actualmente  tienes '+data+' productos en tu carro.');     
            },  
        });
   }
   

</script>

              
 



<div class="producto-index">
      <?php 
  $total_venta=0;
$total_productos=0;
$positions = Yii::app()->shoppingCart->getPositions();
foreach($positions as $position) {


    $total_productos += $position->getQuantity(); //2
}   

                    ?>
  <div class="box">

                        <form method="post" action="checkout1.html">

                            <h1>Carro de compras</h1>
                            <p id="totalProductos" class="text-muted">Actualmente  tienes <?php echo $total_productos;?> productos en tu carro.</p>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th colspan="2">Imagen</th>
                                             <th>Cantidad</th>

                                            <th>Precio unitario</th>
                                            <th colspan="2">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                       

<?php 
                      foreach($positions = Yii::app()->shoppingCart->getPositions() as $position){

                          $producto = Producto::model()->find('id_producto=:id_producto',array(':id_producto'=>$position->id));



                      //  echo $position->nombre_producto;
                        //echo $position->quantity;
                  
                      //var_dump($position);
                   
                             

                                      ?>
                                       <tr>
                                            <td>
                                            <a href="#">

                                            <?php 

                                              $imagen_producto=ImagenProducto::model()->find('id_producto=:id_producto', array(':id_producto'=>$producto->id_producto));

                                                echo '<img src="images/'.$imagen_producto->nombre_imagen.'" style= "height: 100px; width: 100px;"class="img-responsive">';?>
                                            </a>
                                            </td>
                                            <td><?php echo $producto->nombre_producto;?>
                                            </td>
                                            <td>
                                                <?php echo '<input id="cantidad'.$producto->id_producto.'" type="number" min="1" value="'.$position->quantity.'" max"'.$producto->stock.'" step="1" " class="form-control" onkeyup="cambiarValor('.$producto->id_producto.','.$producto->stock.')" onclick="cambiarValor('.$producto->id_producto.','.$producto->stock.')" />';
                                                ?>
                                            </td>
                                            <td id="precio<?php echo $producto->id_producto ?>"><?php echo $producto->precio_producto;?></td>
                                            <td id="precioTotal<?php echo $producto->id_producto ?>"><?php $total_precio_por_producto=$producto->precio_producto*$position->quantity;
                                                        echo $total_precio_por_producto;

                                            ?></td>
                                            <td>
<?php echo CHtml::link('Eliminar', array('producto/eliminarproductocarrobyid', 'id' => $position->id,'confirm' => 'Are you sure?'),array('class'=> 'btn btn-large btn-primary')); ?>


                                             </td>


                                            <?php 

                                            $total_venta+=$total_precio_por_producto; ?>

                                            <?php  }?>
                                        </tr>



                                    </tbody>
                                    <tfoot>
                                      <tr>
                                            <th colspan="5">Costo de distribución</th>
                                            <?php 
                                            $costo_fijo_distribucion=15000; 
                                            ?>
                                            <th colspan="2"><?php echo $costo_fijo_distribucion;  ?></th>
                                        </tr>

                                        <tr>
                                            <th colspan="5">Total Venta</th>
                                            <th id="totalVenta" colspan="2"><?php echo $total_venta;  ?></th>
                                        </tr>
<?php $total_pagar=$costo_fijo_distribucion+$total_venta;

?>
                                         <tr>
                                            <th colspan="5">Total a pagar</th>
                                            <th id="totalPagar" colspan="2"><?php 
                                            echo $total_pagar;    ?></th>
                                        </tr>


                                    </tfoot>

                                
                                </table>
                                <center>
   <?php echo CHtml::link('<span class="fa fa-shopping-cart"> Realizar compra</span>', array('compra/create'), array('class'=> 'btn btn-large btn-primary')); ?>
                            </center>

                            </div>
                            <!-- /.table-responsive -->

                         

                        </form>

                    </div>

</div>

