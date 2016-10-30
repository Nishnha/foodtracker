var map;
require([
        "esri/map",
        "esri/dijit/LocateButton",
        "esri/geometry/Point",
        "esri/symbols/SimpleMarkerSymbol",
        "esri/graphic",
        "dojo/domReady!"
    ], function(Map, LocateButton) {
    
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

        geoLocate.startup();
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

<?php
    $servername = '151.28.65.186:3306';
    $username = 'root';
    $password = 'foodtracker1233';
    $conn = mysql_connect($servername, $username, $password);
    
    if(!$conn) {
        die('Could not connect: ' . mysql_error());
    } 
    sql = 'SELECT * FROM userstatus';
    mysql_select_db('Mysql');
    $retval = mysql_query($sql, $conn);
    if(!$retval){
        die('Could not get data: ' . mysql_error());
    }

    $cards = "";
    $name = "";
    $status = "";
    
    while($row = mysql_fetch_assoc($retval)) {
        $name = $row['name'];
        $status = $row['status'];
        $cards .= 'card("res/' . $name . '.png","' . $name . '", "' . $status . '");';
    }
    echo '<script type="text/javascript">',
         $cards,
         '</script>';            
    
    mysql_close($conn);
?>
