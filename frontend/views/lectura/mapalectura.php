<h1>Mapa Lectura Temperatura dia : 2021-09-12 01:00:00</h1>
<style>
    /* Set the size of the div element that contains the map */
#map {
  height: 400px;
  /* The height is 400 pixels */
  width: 100%;
  /* The width is the width of the web page */
}
    </style>

<div id="map"></div>

<script
  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0gCtDVapFZQt9Z6O2WtRGPi2LnRsollc&callback=initMap&libraries=&v=weekly"
  async
></script>

<?php

use frontend\models\base\Lectura;

$estaciones=Lectura::find()->where(['fecha'=>'2021-09-12 01:00:00'])->groupBy('id_estacion')->all();
 //print_r($estaciones);die();
?>
<script type="text/javascript">
// Initialize and add the map
function initMap() {
  // The location of Uluru 18.880909,-70.553474
  const uluru = { lat: 18.880909, lng: -70.553474 };
  // The map, centered at Uluru
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 8,
    center: uluru,
  });
  // The marker, positioned at Uluru
  <?php foreach ($estaciones as $esta):?>
    pos={lat:<?=$esta->estacion->latitud?>,lng:<?=$esta->estacion->longitud?>};
    marker = new google.maps.Marker({
    position: pos,
    label: '<?= "Temp:".$esta->temp_out?>',
    map: map,
  });
  <?php endforeach;?>
}
</script>