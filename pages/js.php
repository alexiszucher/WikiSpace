<?php require_once "header.php"; ?>

<h2>Documentation JavaScript</h2>

<div class="col-12">
    <div tag="CREATION DASHBOARD GLISSER DEPOSER">
        <b>CREATION DASHBOARD GLISSER DEPOSER</b>
        <br /><br />
        <button onclick="copy('1')" id="copy" type="button" class="btn btn-dark">COPIE</button><br />
        <textarea id="1" cols="100" rows="7">
            Utiliser la librairie gridstack
        </textarea>
    </div>

    <br /><br />

    <div tag="INTEGRATION GOOGLE MAP CUSTOMIZE">
        <b>INTEGRATION GOOGLE MAP CUSTOMIZE</b>
        <br /><br />
        <button onclick="copy('2')" id="copy" type="button" class="btn btn-dark">COPIE</button><br />
        <textarea id="2" cols="100" rows="7">
            Utiliser la librairie leaflet
            <link href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" rel="stylesheet" type="text/css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="anonymous"/>
            <div id="mapid" style="height: 400px;"></div>
            <script type="text/javascript" src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin="anonymous"></script>
            <script type="text/javascript">
                var mymap = L.map('mapid').setView([44.812, -0.47], 16);
                L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                    maxZoom: 18,
                    id: 'mapbox/streets-v11',
                    tileSize: 512,
                    zoomOffset: -1
                }).addTo(mymap);
            </script>
        </textarea>
        <br /><br />
    </div>

    <div tag="REDIRECTION URL">
        <b>REDIRECTION URL</b>
        <br /><br />
        <button onclick="copy('3')" id="copy" type="button" class="btn btn-dark">COPIE</button><br />
        <textarea id="3" cols="100" rows="7">
            document.location.href = "template/home.php";
        </textarea>
    </div>
</div>

<?php require_once "footer.php"; ?>

