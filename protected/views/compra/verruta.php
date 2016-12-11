<?php
/* @var $this CompraController */
/* @var $dataProvider CActiveDataProvider */
?>
<?php
$this->breadcrumbs=array(
'Compras',
);
?>
<?php echo BsHtml::pageHeader('Rutas a recorrer') ?>
<link href="recursos/css/font-awesome.css" rel="stylesheet">
<link href="recursos/css/bootstrap.min.css" rel="stylesheet">
<link href="recursos/css/animate.min.css" rel="stylesheet">
<link href="recursos/css/owl.carousel.css" rel="stylesheet">
<style type="text/css">
html, body {
height: 100%;
margin: 0;
padding: 0;
}
#right-panel {
font-family: 'Roboto','sans-serif';
line-height: 30px;
padding-left: 10px;
}
#right-panel select, #right-panel input {
font-size: 15px;
}
#right-panel select {
width: 100%;
}
#right-panel i {
font-size: 12px;
}
#map {
height: 500px;
}
#right-panel {
height: 100%;
float: right;
width: 390px;
overflow: auto;
}
</style>
<link href="recursos/css/owl.theme.css" rel="stylesheet">
<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1.0">
    <meta charset="utf-8">
    <!-- This stylesheet contains specific styles for displaying the map
    on this page. Replace it with your own styles as described in the
    documentation:
    https://developers.google.com/maps/documentation/javascript/tutorial -->
    
    
    <script type="text/javascript">
   
    function enviarinformacion(){
    var obtenerid =  document.getElementById("id_producto");
    var id_producto= obtenerid.options[obtenerid.selectedIndex].value;
    //console.log(id_producto);
    $.ajax({
    data: {id_producto: id_producto},
    //Cambiar a type: POST si necesario
    url: '<?php echo Yii::app()->baseUrl.'/index.php?r=compra/ruta'?>',
    type: "POST",
    dataType:'json',
    // cache: false,
    success : function(data) {
    $('#end').empty();
    
   // console.log((data["nombre_comuna"]));
    document.getElementById("end").value=data["nombre_comuna"]+', Chile';
    //return data;
    },
    });
      $('#mensaje').empty();
     $('#mensaje').append(''); 
    }
    </script>
  </head>
  <body >
   
      <?php
      $usuario = Usuario::model()->findByPk($compra->id_usuario);
      $comuna= Comuna::model()->findByPk($usuario->id_comuna);
      $total_rutas= count($productos);
      $cont=0;
      ?>
       <div id="mensaje" style="color:red;font-size: medium;">

    </div>
                    <div class="row">

              <div class="col-md-6">

      <select onchange ="enviarinformacion();" id="id_producto">
        <?php
                echo '<option value="nada">Seleccione un producto</option>';

        foreach($productos as $producto) {
      
        echo '<option value="'.$producto->id_producto.'">'.$producto->nombre_producto.'</option>';
        
        ?>
        <?php
        }
        ?>
      </select>
        </div>
                </div>



<div class="row">
 
                    <div class="col-md-4">
      <b>Ubicación actual (Administrador): </b>
<br>
      <?php
      //  echo  '<input id="start" value="'.$usuario->direccion.','.$comuna->nombre_comuna.', Chile" onload="calcRoute();" />';
      echo  '<input readonly="readonly" id="start1" value=""   />';
      
      ?>        </div>

     </div>






<div class="row">
 
                    <div class="col-md-4">
      <b>Primera parada (Productor): </b>
<br>
      <?php
      //  echo  '<input id="start" value="'.$usuario->direccion.','.$comuna->nombre_comuna.', Chile" onload="calcRoute();" />';
      echo  '<input readonly="readonly" id="start" value="'.$comuna->nombre_comuna.', Chile"   />';
      
      ?>        </div>

     </div>
<div class="row">

                         <div class="col-md-4">
      <b>Segunda parada (Cliente): </b>       
<br>
      <?php
      echo  '<input readonly="readonly" id="end"/>';
      ?>
       </div>
     </div>


     </div>
     <div class="row">
                    <div style="visibility:hidden" class="col-md-6">

      <b>Distancia a la primera ruta:</b> <span id='total1' value=""></span>        </div>
    </div>
        <div class="row">
                    <div style="visibility:hidden" class="col-md-6">

      <b>Distancia a la segunda ruta:</b> <span id='total2' value=""></span>        </div>
    </div>

    <div class="row">
                    <div class="col-md-6">

      <b>Distancia total:</b> <span id='total'></span>        </div>
    </div>


        </div>
        <diV class="row">
              <div class="col-md-6">

   <button onclick="calculateAndDisplayRoute();" type="button" class="btn btn-primary">Calcular ruta</button>
        </div>        </div>


    <br>
    
    <div  id="detalle" class="row">
      <div class="col-lg-12">
        <h4>Mapa:</h4>
        <div id="map"></div>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkL6mfjPfT6kQW9afrWpYAIyvuA0fKP1w&callback=initMap" async defer></script>
        <script>
      function calculateAndDisplayRoute() {
        var goo = google.maps;
           var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 7,
        center: {lat: -36.85, lng: -72.65}
        });
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById('right-panel'));
        google.maps.event.addListener(directionsDisplay, 'directions_changed', function() {




    
        });

        App         = { map               :map,
                    bounds            : new goo.LatLngBounds(),
                    directionsService : new goo.DirectionsService(),    
                    directionsDisplay1: new goo.DirectionsRenderer({
                                          map             : map,
                                          preserveViewport: true,
                                          polylineOptions : {strokeColor:
                                                              'red'}}),
                    directionsDisplay2: new goo.DirectionsRenderer({
                                          map             : map,
                                          preserveViewport: true,
                                          polylineOptions : {strokeColor:
                                                              'blue'}})
                  
        },
     startLeg   = {  origin     :   document.getElementById('start1').value,
                    destination :  document.getElementById('start').value,
                    travelMode  :  goo.TravelMode.DRIVING},        
     middleLeg  = {  origin     :  document.getElementById('start').value,
                    destination :  document.getElementById('end').value,
                    travelMode  :  goo.TravelMode.DRIVING};        

  App.directionsService.route(startLeg, function(result, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      App.directionsDisplay1.setDirections(result);
      App.map.fitBounds(App.bounds.union(result.routes[0].bounds));
    }else{
   $('#mensaje').empty();
     $('#mensaje').append('Debe seleccionar un producto para realizar el calculo de la ruta de transporte del cliente.');     



    }
  }); 

  App.directionsService.route(middleLeg, function(result, status) {
    if (status == google.maps.DirectionsStatus.OK) {
      App.directionsDisplay2.setDirections(result);
      App.map.fitBounds(App.bounds.union(result.routes[0].bounds));
    }else{
         $('#mensaje').empty();
     $('#mensaje').append('Debe seleccionar un producto para realizar el calculo de la ruta de transporte del cliente.');     


    }


      var ubicacionadmin=document.getElementById('start1').value;
      var ubicacionprod= document.getElementById('start').value
            var ubicacioncliente= document.getElementById('end').value


var ciudadadmin = ubicacionadmin.split(",");
var ciudadprod = ubicacionprod.split(",");
var ciudadcliente = ubicacioncliente.split(",");

    if(ciudadcliente[0].localeCompare(ciudadprod[0])==0){
                    computeTotalDistance1( App.directionsDisplay1.directions);
 var total= parseFloat(document.getElementById("total1").value);
       document.getElementById("total").innerHTML = total + " km";

    }

       if(ciudadadmin[0].localeCompare(ciudadprod[0])==0){
                    computeTotalDistance2( App.directionsDisplay2.directions);
 var total= parseFloat(document.getElementById("total2").value);
       document.getElementById("total").innerHTML = total + " km";

    }

     if(ciudadadmin[0].localeCompare(ciudadcliente[0])==0){
                    computeTotalDistance1( App.directionsDisplay1.directions);
 var total= parseFloat(document.getElementById("total1").value);
       document.getElementById("total").innerHTML = total + " km";

    }

    if(ciudadadmin[0].localeCompare(ciudadcliente[0])!=0&&ciudadadmin[0].localeCompare(ciudadprod[0])!=0&&ciudadcliente[0].localeCompare(ciudadprod[0])!=0){

                  computeTotalDistance1( App.directionsDisplay1.directions);
                    computeTotalDistance2( App.directionsDisplay2.directions);
        var total= parseFloat(document.getElementById("total1").value) +parseFloat(document.getElementById("total2").value);
       document.getElementById("total").innerHTML = total + " km";

    }




  });

 




          


      // Try HTML5 geolocation.
        if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
        var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
        };
     /*   var marker = new google.maps.Marker({
        position: pos,
        map: map,
        });*/
        }, function() {
        var infoWindow = new google.maps.InfoWindow({map: map});
        handleLocationError(true, infoWindow, map.getCenter());
        });
        } else {
        var infoWindow = new google.maps.InfoWindow({map: map});
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
        }





}

        function computeTotalDistance1(result) {
        var total = 0;
        var myroute = result.routes[0];
        for (i = 0; i < myroute.legs.length; i++) {
        total += myroute.legs[i].distance.value;
        }
        total = total / 1000.
        document.getElementById("total1").value = total;

       
        }

         function computeTotalDistance2(result) {
        var total = 0;
        var myroute = result.routes[0];
        for (i = 0; i < myroute.legs.length; i++) {
        total += myroute.legs[i].distance.value;
        }
        total = total / 1000.
        document.getElementById("total2").value = total;

       
        }


        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(browserHasGeolocation ?
        'Error: The Geolocation service failed.' :
        'Error: Your browser doesn\'t support geolocation.');
        }
        </script>
        <script>
        function initMap(){
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 7,
        center: {lat: -36.85, lng: -72.65}
        });
        directionsDisplay.setMap(map);
        directionsDisplay.setPanel(document.getElementById('right-panel'));
             google.maps.event.addListener(directionsDisplay, 'directions_changed', function() {
        computeTotalDistance(directionsDisplay.directions);
        // Try HTML5 geolocation.
       
        });
        
 if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
        var pos = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
        };
      /*  var marker = new google.maps.Marker({
        position: pos,
        map: map,
        });
*/



            var la= position.coords.latitude;
        var ln= position.coords.longitude;
     
        var latlng = {
          lat: parseFloat(la),
          lng: parseFloat(ln)
        };

  var geocoder = new google.maps.Geocoder;


           geocoder.geocode({
 'location': latlng
   }, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      if (results[1]) {
          $('#start1').empty();
    
   // console.log((data["nombre_comuna"]));
    document.getElementById("start1").value=results[1].formatted_address;

     
      } else {
        window.alert('No hay resultados');
      }
    } else {
      window.alert('Geocoder failed due to: ' + status);
    }
  });




    
    

        }, function() {
        var infoWindow = new google.maps.InfoWindow({map: map});
        handleLocationError(true, infoWindow, map.getCenter());
        });
        } else {
        var infoWindow = new google.maps.InfoWindow({map: map});
        // Browser doesn't support Geolocation
        handleLocationError(false, infoWindow, map.getCenter());
        }
        }
       
        </script>
        <br>
      </div>
    </div>
    
  </body>
</html>
<!-- /.table-responsive -->
