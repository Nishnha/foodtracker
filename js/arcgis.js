var map;
require([
        "esri/map",
        "esri/dijit/LocateButton",
        "esri/geometry/Point",
        "esri/symbols/PictureMarkerSymbol",
        "esri/graphic",
        "esri/dijit/PopupTemplate",
        "esri/layers/FeatureLayer",
        "esri/request",
        "dojo/on",
        "dojo/domReady!"
    ], function(Map,
                esriRequest,
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

        //popupTemplate = new PopupTemplate({

        //});
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
