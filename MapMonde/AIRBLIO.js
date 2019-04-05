window.onload = function(){
  
//var long = '50.**************', lat = '0.**************'
        var Lat='';//latitude
        var Long='';//longitude
        var coordsObj = {coords:{latitude:Lat, longitude:Long}};

        if (navigator.geolocation) {
          var timeoutVal = 10 * 1000 * 1000;
          navigator.geolocation.getCurrentPosition(
            displayPosition, 
            displayError,
            { enableHighAccuracy: true, timeout: timeoutVal, maximumAge: 0 }
          );
        }
        else {
          alert("Geolocation is not supported by this browser");
        }

        function displayPosition(position) {
            //console.log(position, position.coords)
            //console.log("Latitude: " + position.coords.latitude + ", Longitude: " + position.coords.longitude);
            var Lat = position.coords.latitude;
            var Long = position.coords.longitude;
            reverseGeoLookup(Lat, Long);
            //alert(Lat);
            //alert(Long);
        }           

        function displayError(error) {
          var errors = { 
            1: 'Permission denied',
            2: 'Position unavailable',
            3: 'Request timeout'
          };
          alert("Error: " + errors[error.code]);
        }

        function reverseGeoLookup(lat, lon) {
          var req = new XMLHttpRequest();
          //console.log("requesting: ", "https://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+lon+"&sensor=true")
          req.open("GET", "https://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+lon+"&sensor=true", true);
          req.onreadystatechange = function() {
              if(req.readyState == 4) {
                  var result = JSON.parse(req.response).results
                  for(var i = 0, length = result.length; i < length; i++) {
                      for(var j = 0; j < result[i].address_components.length; j++) {
                          var component = result[i].address_components[j];
 
//This bit here grabs the postal_code bits, and the tilde negative operator returns the postcode values rather than the address names.. not sure how.
// I need some sort of filter or loop here to grab the first or just one of these postal code elements, at the moment I get too many...
                        if(~component.types.indexOf("postal_code")) {
                            var outPut = document.getElementById('addressInput');
                            outPut.value = component.short_name;
                          }
                      }
                  }
              }
          }
          req.send();
        }

var latlng = displayPosition(coordsObj);
reverseGeoLookup.apply(this, latlng);

};


var demo = new Vue({
  el: "#vue-map",
  data: {
    options: {
      zoom: 3,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      center: new google.maps.LatLng(48.856614, 2.352222)
    },
    map: "",
    zoomTreshold: 4,
    radiusTreshold: 400000, 
    locations: [
    { lat:40.7308619, lng:-73.9871558, boutique: "Base de New York" },
     { lat: 47.2186371, lng: -1.5541362 , boutique: "Base de Nantes" },
     { lat: 43.2954, lng: 5.363100000000031 , boutique: "Base de Marseille" },
     { lat: 37.7793, lng: -122.41899999999998 , boutique: "Base de San Francisco" },

      { lat: -12.0621065, lng: -77.0365256, boutique: "Base de Lima"},
      { lat: 35.6828387, lng: 139.7594549 , boutique: "Base de Tokyo"},
      { lat: -20.8789, lng: 55.44820000000004 , boutique: "Base de Saint Denis de la Réunion"},
      
      //{ lat: 48.391032, lng: -4.484432, boutique: "29200 Brest, France" }
    ],
    visibleMarkers: [],
    noVisibleMarkers: false,
    markers: [],
    uluru: [{ lat: -25.363, lng: 131.044 }],
    infoWindow: "",
    currentZoom: 0,
    currentLocation: ""
  },
  watch: {
    locations: function(val) {
      this.deleteMarkers();
      this.createMarkers();
    }
  },
  methods: {
    addUluru: function() {
      for (var i = 1; i < this.uluru.length; i++) {
        this.locations.push(this.uluru[i]);
      }
    },
    createMarkers: function() {
      var self = this;
      this.markers = this.locations.map(function(location, i) {
        var infoWindowContent =
          "<h4> AIRBLIO " +
          i +
          "</h4>" +
          "</p><strong>Tel: </strong>02 97 53 80 88<h4>Horaire d’ouverture :</h4><p> Du lundi au samedi :10h30-12h30 et 15h30-18h30 <br> Dimanche :10h20-13h et 15h30-18h30</p>";
        var marker = new google.maps.Marker({
          position: location,
          name: "Base n° " + i,
          boutique: location.boutique,
          info: infoWindowContent,
          id: i + 1
        });
        google.maps.event.addListener(marker, "click", function() {
          self.infoWindow.setContent(this.info);
          self.infoWindow.open(self.map, this);
        });
        return marker;
      });
      new MarkerClusterer(this.map, this.markers, {
        imagePath: "https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m"
      });
    },
    deleteMarkers() {
      for (var i = 0; i < this.markers.length; i++) {
        this.markers[i].setMap(null);
      }
      this.markers = [];
    },
    getVisibleMarkers: function() {
      var self = this;
      google.maps.event.addListener(self.map, "idle", function() {
        self.noVisibleMarkers = false;
        
        bounds = self.map.getBounds();

        self.visibleMarkers = [];

        for (var i = 0; i < self.markers.length; i++) {
          currentMarker = self.markers[i];

          
          if (bounds.contains(currentMarker.getPosition())) {
            

            self.visibleMarkers.push(currentMarker);
          }
        }
        
        if (self.visibleMarkers.length) {
          self.moveBoutiquesToTop();
        } else {
          self.noVisibleMarkers = true;
          self.getInvisibleMarkersInTresholdRadius();
          self.moveBoutiquesToTop();
        }
      });
      
      console.log(this.noVisibleMarkers);
    },
    getInvisibleMarkersInTresholdRadius: function() {
      
      var center = this.currentLocation.position ? this.currentLocation.position : this.map.center;
      for (var i = 0; i < this.markers.length; i++) { 
        var distance = google.maps.geometry.spherical.computeDistanceBetween(
          center,
          this.markers[i].position
        );
        if (distance < this.radiusTreshold) {
          this.visibleMarkers.push(this.markers[i]);
        }
      }
    },
    moveBoutiquesToTop: function() {
      var center = this.currentLocation.position ? this.currentLocation.position : this.map.center;
      for (var i = 0; i < this.visibleMarkers.length; i++) {
        var distance = google.maps.geometry.spherical.computeDistanceBetween(
          center,
          this.visibleMarkers[i].position
        );
        this.visibleMarkers[i].distanceFromCenter = distance;
        // si distance <400km
        if (distance < this.radiusTreshold && this.visibleMarkers[i].boutique) {
          var a = this.visibleMarkers.splice(i, 1);
          this.visibleMarkers.unshift(a[0]);
        }
      }
    },
    initAutocomplete: function() {
      var self = this;
      var autocompleteInput = document.getElementById("autocompleteInput");
      var autocomplete = new google.maps.places.Autocomplete(autocompleteInput);
      autocomplete.addListener("place_changed", function() {
        var place = autocomplete.getPlace();
        if (!place.geometry) {
          
          window.alert("Veuillez appuyer sur l'adresse proposée sur : '" + place.name + "'");
          return;
        } else {
          if (self.currentLocation) {
            self.currentLocation.setMap(null);
          }                 
          self.currentLocation = new google.maps.Marker({
            position: place.geometry.location,
            id: "currentLocation",
            icon: "https://mt.googleapis.com/vt/icon/name=icons/onion/SHARED-mymaps-pin-container_4x.png,icons/onion/1899-blank-shape_pin_4x.png&highlight=0288D1&scale=2.0",
            map: self.map
          });
        }
        if (place.geometry.viewport) {
          self.map.fitBounds(place.geometry.viewport);
        } else {
          self.map.setCenter(place.geometry.location);
          self.map.setZoom(17); // Why 17? Because it looks good.
        }
      });
    },
    getCurrentZoom: function() {
      var self = this;
      google.maps.event.addListener(self.map, "idle", function() {
        self.currentZoom = self.map.zoom; //controle mouse sur la map ( zoom / dezoom)
      });
    },
    centerMapToMarker: function(e) {
      var id = e.target.dataset.id;
      for (var i = 0; i < this.visibleMarkers.length; i++) {
        if (this.visibleMarkers[i].id == id) {
          var thisMarker = this.visibleMarkers[i];
          

          this.map.panTo(thisMarker.getPosition());
          this.map.setZoom(17); // zoom initial sur la map

          return false;
        }
      }
    }
  },
  mounted: function() {
    this.map = new google.maps.Map(
      document.getElementById("map_canvas2"),
      this.options
    );
    this.createMarkers();
    this.getVisibleMarkers();
    this.infoWindow = new google.maps.InfoWindow({ content: "" });
    this.initAutocomplete();
    this.getCurrentZoom();
  }
});