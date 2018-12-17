<?php 
	session_start();
	if (!isset($_SESSION['nik'])) {
		echo "<script>window.history.back();</script>";
	}else{
?>
<!DOCTYPE html >

<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Select Your Location</title>
    <style>
    #map {
        height: 100%;
    }

    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
        overflow-y: hidden;
    }
    </style>
</head>

<body>
    <div id="map" height="460px" width="100%"></div>
    <div id="form">
        <table>
            <tr>
                <td></td>
                <td>
                    <input type='button' value='Save' onclick='saveData()' />
                </td>
            </tr>
        </table>
    </div>
    <div id="message">Location saved</div>
    <script>
    var map;
    var marker;
    var infowindow;
    var messagewindow;

    function initMap() {
        var bekasi = { lat: -6.2382063, lng: 106.9764368 };
        map = new google.maps.Map(document.getElementById('map'), {
            center: bekasi,
            zoom: 15
        });

        infowindow = new google.maps.InfoWindow({
            content: document.getElementById('form')
        });

        messagewindow = new google.maps.InfoWindow({
            content: document.getElementById('message')
        });

        google.maps.event.addListener(map, 'click', function(event) {
            marker = new google.maps.Marker({
                position: event.latLng,
                map: map
            });

            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(map, marker);
            });
        });
    }

    function saveData() {
        var latlng = marker.getPosition();
        var url = 'p_daftar.php?lat=' + latlng.lat() + '&lng=' + latlng.lng();

        downloadUrl(url, function(data, responseCode) {
            if (responseCode == 200 && data.length <= 1) {
                infowindow.close();
                messagewindow.open(map, marker);
            }
        });
    }

    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
            if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request.responseText, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }

    function doNothing() {}
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqcebSgHABuyF6R10PRjgEekSG7mhv-f8&callback=initMap"></script>
</body>

</html>
<?php }?>