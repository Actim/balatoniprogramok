 <?php
    include_once("php/functions.php");
 ?>

<!DOCTYPE html>
<html>
<head>
    <title>Balatoni helyszínek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script type="text/javascript" src="https://www.bing.com/api/maps/mapcontrol?key=0THsVTkjqrGrAseConbv~lLNC_EstflQ95cRn07HdsA~An4kf1i13ZGcVG_07vEQWRp6G14ht1pe2SwWILAirOepSnqst10sIM5Tbxd0QmN8"></script>
    <script type="text/javascript">
        var markers = [
            <?php
                getLocations();
            ?>];
        
    </script>
    <script type="text/javascript" src="js/map_php.js"></script>
</head>
<body onload="loadMapScenario();">
    <header class="bg-primary text-white text-center py-5">
        <h1>Balaton körüli látványosságok</h1>
        <p>A Balaton körül nyaralsz, és nincs mit csinálnod? Böngéssz a térképen!</p>
    </header>

    <div class="col-md-9 p-3 mx-auto">
        <div class="d-flex">
            <input type="text" class="form-control" id="searchInput" placeholder="Keresés">
        </div>
        <div class="p-3" id="infoDiv"></div>
    </div>
    <div class="col-md-9 p-3 mx-auto" style="height: 600px">
        <div id="myMap" class="rounded-pill" style="position:relative;width:100%;height:100%;"></div>
    </div>
    
</body>
</html>
