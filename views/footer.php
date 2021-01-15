<footer class="footer" class="page-footer font-small blue pt-4">

<!-- Footer Links -->
<div class="container-fluid text-center text-md-left">

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-md-6 mt-md-0 mt-3">

    <div id="mapid"></div>


    </div>
    <!-- Grid column -->

    <hr class="clearfix w-100 d-md-none pb-3">

    <!-- réseaux sociaux -->
    <div class="col-md-3 mb-md-0 mb-3">
    <h5 class="text-uppercase">mon entreprise</h5>
      <p>forme juridique</p>
    <h5 class="text-uppercase">contact</h5>
      <?php foreach ($coords as $n) {
        ?>
      <a href="<?php echo $n['fb']?>" target="_blank"><img class="imgFb" src="images/fb.png" alt="logo facebook"></a>


      <a href="mailto:<?php echo $n['mail']?>?Subject=Contact" target="_top"><img class="imgFb" src="images/mail.png" alt="logo mail"></a>

    </div>
    <!-- Grid column -->

    <!-- coordonnées-->
    <div class="col-md-3 mb-md-0 mb-3">
    <h5 class="text-uppercase">mon entreprise</h5>
      <address>

          <?php echo $n['numero']?>
          <?php echo $n['rue']."<br>"?>
          <?php echo $n['cp']."<br>"?>
          <?php echo $n['ville']."<br>"?>
          <?php echo "Tél: ".$n['tel']."<br>"?>
          <?php echo "Mail: ".$n['mail']."<br>"?>
          <?php
        }
        ?>
      </address>



    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

</div>

<!-- map -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
    integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
    crossorigin=""></script>

    <script>

    var mymap = L.map('mapid').setView([51.505, -0.09], 13);

    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoiYXJ0aHVydXVzIiwiYSI6ImNrank4cW16ajBhNGIybm82YjExMHQxMHIifQ._8s8THTDTFHjt6_Dc8rngw'
}).addTo(mymap);

var marker = L.marker([51.5, -0.09]).addTo(mymap);

marker.bindPopup("<b>Hello world!</b><br>I am a popup.").openPopup();
circle.bindPopup("I am a circle.");
polygon.bindPopup("I am a polygon.");
    </script>
</footer>