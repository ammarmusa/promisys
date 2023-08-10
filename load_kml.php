<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/images/setia_icon.png" type="image/x-icon">
    <title>Load KML File</title>
    <style> html, body, #map { height: 100%; width: 100%; padding: 0; margin: 0; } </style>
    <!-- Leaflet (JS/CSS) -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css">
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <!-- Leaflet-KMZ -->
    <script src="https://unpkg.com/leaflet-kmz@latest/dist/leaflet-kmz.js"></script>
</head>
<body>

<?php
$file = $_GET['file'];
?>
<div id="map"></div>
<script>
  var map = L.map('map', {
    preferCanvas: true // recommended when loading large layers.
  });
  map.setView(new L.LatLng(3.417466466330672, 102.27447509765626), 8);

  var OpenTopoMap = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 17,
    attribution: 'Map data: &copy; SETIAGEOSOLUTIONS SDN BHD',
    opacity: 0.90
  });
  OpenTopoMap.addTo(map);

  // Instantiate KMZ layer (async)
  var kmz = L.kmzLayer().addTo(map);

  kmz.on('load', function(e) {
    control.addOverlay(e.layer, e.name);
    // e.layer.addTo(map);
  });

  var file = "<?= $file ?>"

  // Add remote KMZ files as layers (NB if they are 3rd-party servers, they MUST have CORS enabled)
  kmz.load(file);

  var control = L.control.layers(null, null, { collapsed:false }).addTo(map);
</script>
</body>
</html>