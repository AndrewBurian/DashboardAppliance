
<div data-row="1" data-col="1" data-sizex="1" data-sizey="1" >
    <div id="map-canvas"/>
</div>


<style type="text/css">
    html { height: 100% }
    body { height: 100%; margin: 0; padding: 0 }
    #map-canvas { height: 100% }
</style>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false&amp;callback=initialize">
</script>
<script type="text/javascript">
    function initialize() {
        var mapOptions = {
            center: new google.maps.LatLng(-34.397, 150.644),
            zoom: 8
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"),
                mapOptions);
    }
</script>