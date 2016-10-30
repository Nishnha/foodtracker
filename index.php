<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1,user-scalable=no"/>

    <title>FoodTrackr</title>

    <link rel="stylesheet" href="https://js.arcgis.com/3.18/esri/css/esri.css"/>
    <script src="https://js.arcgis.com/3.18/"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script src="arcgis.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/main.css">
  </head>

  <body>
    <div id="phpshit">
            <?php
            $servername = '152.23.65.186';
            $username = 'php';
            $password = 'foodtracker1234';
            $conn = mysql_connect($servername, $username, $password);

            if(!$conn) {
                die('Could not connect: ' . mysql_error());
            }
            $sql = 'SELECT * FROM foodtrackr.events';
            mysql_select_db('Mysql');
            $retval = mysql_query($sql, $conn);
            if(!$retval){
                die('Could not get data: ' . mysql_error());
            }

            $latitude = "";
            $longitude = "";
            $food = "";
            $timeevent = "";
            $location = "";
            $eventname = "";
            $emailbody = "";
            $img = "";

            while($row = mysql_fetch_assoc($retval)) {
                $latitude = $row['latitude'];
                $longitude = $row['longitude'];
                $food = $row['food'];
                $timeevent = $row['timeevent'];
                $location = $row['location'];
                $eventname = $row['eventname'];
                $emailbody = $row['emailbody'];

            switch ($food) {
                case "pizza":
                    $img = "/res/pizza.svg";
                    break;
                case "smores":
                    $img = "/res/smore.svg";
                    break;
                default:
                    $img = "/res/apple.svg";
                    break;
            }

            echo <<< EOT
                <p id="phpShit">
                    var geometry = new Point($longitude, $latitude);
                    var pictureMarkerSymbol = new PictureMarkerSymbol('$img', 25, 25);
                    var popupTemplate = new PopupTemplate({
                        title: $eventname,
                        description: $emailbody
                    });
                    var graphic = new Graphic(geometry, pictureMarkerSymbol, popupTemplate);
                    featureLayer.applyEdits(graphic, null, null);
                </p>
            EOT;
            }
            mysql_close($conn);
            ?>
    </div>

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
