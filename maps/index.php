<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/partials/header.php');
?>
<style type="text/css">
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="/maps/ammap/ammap.js" type="text/javascript"></script>
<script src="/maps/ammap/maps/js/world_low.js" type="text/javascript"></script>
<h1>amMaps</h1>
<hr />
<h4><a href="http://www.ammap.com/" target="_blank">amMaps</a></h4>
<h4><a href="http://blog.amcharts.com/2012/11/getting-started-with-javascript-maps.html">Tutorial</a></h4>
<hr />
<div id="mapdiv" style="width: 100%; height: 370px;"></div>​

<script>
$(document).ready(function() {
	
	var map;
	
	// Comment added vis GitHub

	AmCharts.ready(function() {
	    map = new AmCharts.AmMap();
	    map.pathToImages = "/maps/ammap/images/";
	    //map.panEventsEnabled = true; // this line enables pinch-zooming and dragging on touch devices
	    map.balloon.color = "#000000";

	    var dataProvider = {
	        // mapVar: AmCharts.maps.worldLow,
	        mapURL: "/maps/ammap/maps/svg/world_low.svg",
	        getAreasFromMap: true
	    };

	    map.dataProvider = dataProvider;

	    map.areasSettings = {
	        autoZoom: true,
	        selectedColor: "#CC0000"
	    };

	    map.smallMap = new AmCharts.SmallMap();

	    map.write("mapdiv");

	});
});

</script>
