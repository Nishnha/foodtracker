<script>
var map;
require([
        "esri/map",
        "esri/dijit/LocateButton",
        "esri/geometry/Point",
        "esri/symbols/PictureMarkerSymbol",
        "esri/graphic",
        "esri/dijit/PopupTemplate",
        "esri/layers/FeatureLayer",
        "dojo/on",
        "dojo/domReady!"
    ], function(Map,
                FeatureLayer,
                LocateButton,
                PopupTemplate,
                Point,
                PictureMarkerSymbol,
                Graphic,
                on) {

        map = new Map("map", {
            basemap: "streets", //streets, satellite, hybrid, topo
            center: [-79.046761, 35.904613], // longitude, latitude
            zoom: 16
        });

        var geoLocate = new LocateButton({
            map: map,
                highlightLocation: true
            }, "LocateButton"
        );

        featureLayer = new FeatureLayer(featureCollection, {
            id: 'events',
            infoTemplate: popupTemplate
        });

        featureLayer.on("click", function(evt) {
            map.infoWindow.setFeatures([evt.graphic]);
        });

        map.addLayers([featureLayer]);
</script>

        //popupTemplate = new PopupTemplate({
            <?php
                $servername = '152.23.65.186:3306';
                $username = 'root';
                $password = 'foodtracker1234';
                $conn = mysql_connect($servername, $username, $password);

                if(!$conn) {
                    die('Could not connect: ' . mysql_error());
                }
                sql = 'SELECT * FROM events';
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

                echo "
                    var geometry = new Point($longitude, $latitude);
                    var pictureMarkerSymbol = new PictureMarkerSymbol('$img', 25, 25);
                    var popupTemplate = new PopupTemplate({
                        title: $eventname,
                        description: $emailbody
                    });
                    var graphic = new Graphic(geometry, pictureMarkerSymbol, popupTemplate);
                    featureLayer.applyEdits(graphic, null, null);
                    ";

                }

             mysql_close($conn);
            ?>
        //});
<script>
        geoLocate.startup();

        // Hide the popup if its outside of the map's window
        map.on("mouse-drag", function(evt) {
            if (map.infoWindow.isShowing) {
                var loc = map.infoWindow.getSelectedFeature().geometry;
                if (!map.extent.contains(loc)) {
                    map.infoWindow.hide();
                }
            }
        });

        map.on("load", addIcons);

        function addIcons() {

        };
});


// Smooth scrolling when going to div
$(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
      if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
        var target = $(this.hash);
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
        if (target.length) {
                $('html, body').animate({
                          scrollTop: target.offset().top
                        }, 1000);
                return false;
              }
      }
    });
});
</script>
