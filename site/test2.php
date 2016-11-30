<?php
/**
 * Created by PhpStorm.
 * User: Rom
 * Date: 29/11/2016
 * Time: 19:58
 */
?>
<div id="map" style="width:100%;height:500px"></div>

<script>
    function myMap() {
        var mapCanvas = document.getElementById("map");
        var mapOptions = {
            center: new google.maps.LatLng(51.508742,-0.120850),
            zoom: 5
        };
        var map = new google.maps.Map(mapCanvas, mapOptions);
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?callback=myMap&key=AIzaSyCA_hrOWnYWoP_MO8-8y_35Gy1gIGtBF7I"></script>

