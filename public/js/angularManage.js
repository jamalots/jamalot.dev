(function() {
    "use strict";

    // This should be the actual name of your module
    var app = angular.module("angularManage", []);

    // Find the token value from the page using jQuery
    const TOKEN = $("meta[name=csrf-token]").attr("content");
    
    // Set the token as an Angular constant
    app.constant("CSRF_TOKEN", TOKEN);
    
    // Configure $http to include both your token and a flag indicating the request is AJAX
    app.config(["$httpProvider", "CSRF_TOKEN", function($httpProvider, CSRF_TOKEN) {
        $httpProvider.defaults.headers.common["X-Csrf-Token"] = CSRF_TOKEN;
        $httpProvider.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";
    }]);

    app.filter('phpDate', function() {
    // A filter declaration should return an anonymous function.
    // The first argument is the input passed to the filter
    // Any additional arguments are paramaters passed AFTER the filter name
        return function(input, format) {
            // Create an instance of Moment. Use both the
            // date value and timezone information PHP sent
            var date = moment.tz(input.date, input.timezone);

            if (format == "human") {
                // Special case for formatting. If user asks for "human" format
                // return a value like "13 minutes ago" or "2 weeks ago" etc.
                return date.fromNow();
            } else {
                // Covert the moment to a string using the passed format
                // If nothing is passed, uses default JavaScript date format
                return date.format(format);
            }
        };
    });

    app.controller('ManageController',["$http", "$log", "$scope", function($http, $log, $scope){
        $scope.event = [];
        var address = "";

        $scope.loadEvent = function(eventId) {
            $http.get('/events/' + eventId).then(function(response){
                $log.info("Event list success");

                $log.info(response);

                $scope.event = response.data;

                $log.info(response.data);

                address = $scope.event.address + ", " + $scope.event.city + ", " + $scope.event.state + ", " + $scope.event.zip;


                var geocoder = new google.maps.Geocoder();

                // Geocode our address
                geocoder.geocode( { 'address': address}, function(results, status) {
                  // Check for a successful result
                  if (status == google.maps.GeocoderStatus.OK) {
                    // Set our map options
                    var mapOptions = {
                      // Set the zoom level
                      zoom: 10,
                      // This sets the center of the map at our location
                      center: results[0].geometry.location  

                    }
                    console.log(mapOptions);
                    // Render the map
                    var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);

                    var marker = new google.maps.Marker({
                    position: results[0].geometry.location,
                    map: map
                    });

                    
                    
                    map.setCenter(results[0].geometry.location); // sets center without animation
                    

                    // var infowindow = new google.maps.InfoWindow({
                    //     content: $scope.event.
                    // });

                  }
                });

            }, function(response){
                $log.error("Event list fail");

                $log.debug(response);
            });
        };
    }]);

    $(document).ready(function() {
    $(".section").not(":first").hide();
    $("ul#menu li:first").addClass("active").show(); 
 
    $("ul#menu li").click(function() {
        $("ul#menu li.active").removeClass("active");
        $(this).addClass("active");
        $(".section").slideUp();       
        $($('a',this).attr("href")).slideDown('slow');
 
        return false;
    });
 
});
})();