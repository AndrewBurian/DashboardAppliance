<div id="map-canvas" style="height: 300px; width: 350px"/>


<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false&amp;callback=initialize">
</script>
<script type="text/javascript">
    function initialize() {
        var mapOptions = {
            center: new google.maps.LatLng(-34.397, 150.644),
            zoom: 8
        };
        var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
    }
</script>