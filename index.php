<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1,user-scalable=no"/>
    
    <title>FoodTrackr</title>
 
    <link rel="stylesheet" href="https://js.arcgis.com/3.18/esri/css/esri.css"/>
    <script src="https://js.arcgis.com/3.18/"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="js/arcgis.php"></script>
    
    <link rel="stylesheet" href="css/main.css">
  </head>

  <body>
    <div id="info-page">
        <div id="info">
            <img id="logo" src="res/logo.png">
            <h1 id="header">FoodTrackr</h1>
            <p class="paa">Do you like food?</p>
            <p class="paa">Do you like free stuff?</p>
            <p class="paa comb">Cool.<br>We combined the two</p>
            <p class="p-last">
                <a href="#map-page">Scroll down for more</a>
            </p>
        </div>
    </div>
    <div id="map-page">
        <div id="map">
            <div id="LocateButton"></div>
        </div>
        <h2>Find free food near you</h2>
    </div>
  </body>
</html>
