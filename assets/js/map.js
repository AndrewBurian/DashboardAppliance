
var pointarray, heatmap, map;


var xhr = new XMLHttpRequest();
xhr.open('GET', 'helpers/heatmapHelper.php', true);
xhr.onload = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
        if (xhr.responseText.length == 0) {
            console.log("No data to load.");
            return;
        }
        var jsonData = JSON.parse(xhr.responseText);
        
        var garbageData = [];
        for (var i = 0; i < jsonData.length; i++) {
            garbageData.push(new google.maps.LatLng(jsonData[i]['location'][0],jsonData[i]['location'][1]));
        }
        
        var pointArray = new google.maps.MVCArray(garbageData);

        heatmap = new google.maps.visualization.HeatmapLayer({
            data: pointArray
        });
        
        heatmap.setMap(map);
    }

};
xhr.send();

function initialize2() {
    var mapOptions = {
        center: new google.maps.LatLng(49.2500, -123.100),
        zoom: 12,
        disableDefaultUI: true
    };
    map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
   
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
