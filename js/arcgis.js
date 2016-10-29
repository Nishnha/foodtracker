var map;
require([
        "esri/map",
        "esri/dijit/LocateButton",
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
