
   function cambiarValor(cantidad){
       
       var unidades = document.getElementById("cantidad"+cantidad).value;
       
       var precioTotalActual = document.getElementById("precioTotal"+cantidad).innerHTML;
       var precioUnitario  = document.getElementById("precio"+cantidad).innerHTML;
       var totalVenta = document.getElementById("totalVenta").innerHTML;
       $('#precioTotal'+cantidad).empty();
       $('#precioTotal'+cantidad).append(unidades*precioUnitario);
       var precioTotalActual2 = document.getElementById("precioTotal"+cantidad).innerHTML;
       $('#totalVenta').empty();
       var totalFinal = parseInt(totalVenta)+(parseInt(precioTotalActual2)-parseInt(precioTotalActual));
       $('#totalVenta').append(totalFinal);
       $.ajax({
            url: '<?php echo Yii::$app->urlManager->createUrl(['/pedido/total']) ?>',
            type: 'post',
            data: {posicion: cantidad, cantidad: unidades},
            success: function (data) {
                
            },  
        });
   }
   