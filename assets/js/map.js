var pointarray, heatmap;

var garbageData = [
     new google.maps.LatLng(49.2609, -123.1140),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),     
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),     
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),     
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),     
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),     
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),     
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),     
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),     
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240),
     new google.maps.LatLng(49.2619, -123.1240) 
];

function initialize2() {
    var mapOptions = {
        center: new google.maps.LatLng(49.2500, -123.100),
        zoom: 12,
        disableDefaultUI: true
//        zoomControl: false,
//        panControl: false
    };
    var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
    var pointArray = new google.maps.MVCArray(garbageData);

      heatmap = new google.maps.visualization.HeatmapLayer({
        data: pointArray
      });

      heatmap.setMap(map);
 }

function toggleHeatmap() {
  heatmap.setMap(heatmap.getMap() ? null : map);
}

function changeGradient() {
  var gradient = [
    'rgba(0, 255, 255, 0)',
    'rgba(0, 255, 255, 1)',
    'rgba(0, 191, 255, 1)',
    'rgba(0, 127, 255, 1)',
    'rgba(0, 63, 255, 1)',
    'rgba(0, 0, 255, 1)',
    'rgba(0, 0, 223, 1)',
    'rgba(0, 0, 191, 1)',
    'rgba(0, 0, 159, 1)',
    'rgba(0, 0, 127, 1)',
    'rgba(63, 0, 91, 1)',
    'rgba(127, 0, 63, 1)',
    'rgba(191, 0, 31, 1)',
    'rgba(255, 0, 0, 1)'
  ];
  heatmap.set('gradient', heatmap.get('gradient') ? null : gradient);
}

function changeRadius() {
  heatmap.set('radius', heatmap.get('radius') ? null : 200);
}

function changeOpacity() {
  heatmap.set('opacity', heatmap.get('opacity') ? null : 1.0);
}
    
initialize2();
