<?php
include './header.php';

//if (!$inSession) {
//    header("Location:index.php");
//}
?>

<?php
if (isset($_GET['q1']) && isset($_GET['q2'])) {
    $_q1 = mysqli_real_escape_string($conn, $_GET['q1']);
    $_q2 = intval($_GET['q2']);
    $seletSql = "SELECT * FROM " . $_q1 . " WHERE id = '" . $_q2 . "'";
    //echo $seletSql;
}
?>


<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>EstateBD</title>
        <link rel="icon" type="image/png" href="./favicon.ico">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="./css/nouislider.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="./css/materialize.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="./css/font-awesome.min.css"/>
        <link type="text/css" rel="stylesheet" href="./css/dropzone.css"/>
        <link type="text/css" rel="stylesheet" href="./css/style.css" />
        <link type="text/css" rel="stylesheet" href="./overrider.css" />
        <style>

            input[type]:not(.browser-default), input[type]:not(.browser-default):focus:not([readonly]){
                border-bottom: 1px solid #4a148c;
                box-shadow: 0 1px 0 0 #4a148c;
            }

            /* label color */
            .input-field label{
            }
            .input-field input[type]:focus + label.active {
                color: #4a148c;
            }
            /* label focus color */
            .input-field input[type=text]:focus + label {
                color: #4a148c;
            }
            /* label underline focus color */
            .input-field input[type=text]:focus {
                border-bottom: 1px solid #4a148c;
                box-shadow: 0 1px 0 0 #4a148c;
            }

            /* textarea css */
            .input-field textarea:focus + label.active {
                color: #4a148c;
            }
            /* textarea label focus color */
            .input-field textarea:focus + label {
                color: #4a148c;
            }
            /* textarea label underline focus color */
            textarea:not(.browser-default), textarea:not(.browser-default):focus:not([readonly]) {
                border-bottom: 1px solid #4a148c;
                box-shadow: 0 1px 0 0 #4a148c;
            }

            /*             valid color 
                        .input-field input[type=text].valid {
                            border-bottom: 1px solid #4a148c;
                            box-shadow: 0 1px 0 0 #4a148c;
                        }
                         invalid color 
                        .input-field input[type=text].invalid {
                            border-bottom: 1px solid #4a148c;
                            box-shadow: 0 1px 0 0 #4a148c;
                        }
                         icon prefix focus color 
                        .input-field .prefix.active {
                            color: #4a148c;
                        }*/

            label#srch, label#srch.active{
                color: #4a148c !important;
            }

            a.underlin{
                text-decoration: underline;
            }

            .brd-r{
                border-right: 2px solid #4a148c;
            }

            .brd-r-light{
                border-right: 2px solid #e040fb;
            }

            .brd-r-teal{
                border-right: 2px solid #26a69a;
            }

            @media only screen and (min-width: 470px){
                .modal {
                    width: 40%;
                }
            }


            #modalLog{
                max-height: 81%;
            }

            .checkbox-pruple[type="checkbox"].filled-in:checked + label:after{
                border: 2px solid #e040fb;
                background-color: #e040fb;
            }

            #map {
                width: 100%;
                height: 290px;
            }

            /* Only necessary for window height sized blocks */
            html, body, .block {
                height: 100%;
            }

            .topped {
                position: fixed;
                top: 0;
                left: 0;
                z-index: 999;
                width: 100%;
                height: 23px;
            }

            .topped-filters {
                top: 80px;
            }

            .topped-map {
                top: 167px;
                right: 0 !important;
            }

            .bgWhite{
                border-radius: 10px;
                background-color: #ffffff;
            }

            /*            .select-dropdown{
                            border-bottom: 1px solid #26a69a !important;
                            box-shadow: 0 1px 0 0 #26a69a !important;
                        }*/

            .noUi-target .range-label, .noUi-connect {
                background-color: #4a148c;
            }

            ul.dropdown-content.select-dropdown li span {
                color: #e040fb;
            }

            ul.dropdown-content.select-dropdown li.disabled span{
                color: rgba(0,0,0,0.3);
            }

            .card-eff{
                background: #fff;
                margin: 1rem;
                box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
            }

            #materialbox-overlay{
                opacity: 0.5 !important;
            }

            .carousel {
                height: 295px;
            }

            .carousel-item .active .material-placeholder .materialboxed{
                cursor: zoom-in;
            }

            #infoTabs{
                margin-top: -96px;
            }

            .dz-message > span{
                border: 2px dashed #e040fb;
                padding: 5%;
                padding-left: 25%;
                padding-right: 25%;
            }

        </style>
    </head>
    <body>

        <div class="page-wrap">
            <?php include './nav1.php'; ?>




            <div class="container-fluid">
                <div class="section">

                    <div class="row">

                        <div class="col l7 m7 s12 offset-l2">
                            <h4 class="purple-text text-accent-2">Offer Property</h4>


                            <form class="col s12">

                                <div class="input-field col s12">
                                    <select id="category" class="">
                                        <option value="" disabled selected>Select Property Type</option>
                                        <option value="apartment">Apartment</option>
                                        <option value="house">House</option>
                                        <option value="office">Office</option>
                                        <option value="shop">Shop</option>
                                    </select>
                                    <label>Choose your option</label>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="price" type="text" class="validate">
                                        <label for="price"><i class="fa fa-lg fa-money" aria-hidden="true"></i>&nbsp;&nbsp;Price</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12" style="border: 1px solid #4a148c; padding-bottom: .75rem; margin-bottom: .75rem;">
                                        <img id="geoLocateIco" alt="geoLocate" class="" src="./img/gps.gif" style="position: absolute; top: 35px; right: 20px; width: 3%; cursor: pointer; " />
                                        <input id="location" type="text" class="validate" style="margin-top: 3%;">
                                        <label id="locLabel" for="location" style="margin-top: 3%;"><i class="fa fa-lg fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;Location</label>
                                        <div id="map"></div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="country" type="text" class="validate">
                                            <label for="country">Country</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="district" type="text" class="validate">
                                            <label for="district">District</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="area" type="text" class="validate">
                                            <label for="area">Area</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <textarea id="textarea1" class="materialize-textarea"></textarea>
                                            <label for="textarea1"><i class="fa fa-lg fa-info-circle" aria-hidden="true"></i>&nbsp;&nbsp;More About the Property</label>
                                        </div>
                                    </div>




                                </div>
                            </form>


                            <form action="addUpImg.php"
                                  class="dropzone"
                                  id="my-awesome-dropzone"></form>

                            <div class="col hide-on-small-only m3 l3 s12 topped topped-map">
                                <!--                            <label>powered by <b>google</b></label>
                                                            <div id="map" style="border: 1px solid #4a148c;">
                                                            </div>-->
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            <?php include './footer.php'; ?>



            <script type="text/javascript" src="./js/nouislider.js"></script>
            <script type="text/javascript" src="./js/dropzone.js"></script>
            <script type="text/javascript" src="./js/init.js"></script>
            <script type="text/javascript" src="./overrider.js"></script>

            <script>
                var map;
                function initMap() {
                    map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 6,
                        minZoom: 6,
                        center: new google.maps.LatLng(23.777176, 90.399452),
                        mapTypeId: 'terrain'
                    });

                    var infowindow = new google.maps.InfoWindow();

                    var marker = new google.maps.Marker({
                        map: map
                    });
                    map.setOptions({draggableCursor: 'crosshair'});
                    google.maps.event.addListener(map, 'click', function (event) {
                        marker.setPosition(event.latLng);
                        infowindow.setContent('<div>' +
                                'Latitude: ' + event.latLng.lat() + '<br>' +
                                'Longitude: ' + event.latLng.lng()
                                + '</div>');
                        infowindow.open(map, marker);

                        $("#locLabel").addClass("active");
                        $("#location").val(event.latLng.lat() + ", " + event.latLng.lng());

                        //alert("Latitude: " +  + " " + ", longitude: " + event.latLng.lng());
                    });


                    $("#geoLocateIco").click(function () {
                        // Try HTML5 geolocation.
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(function (position) {
                                var pos = {
                                    lat: position.coords.latitude,
                                    lng: position.coords.longitude
                                };

                                infoWindow.setPosition(pos);
                                infoWindow.setContent('Location found.');
                                infoWindow.open(map);
                                map.setCenter(pos);
                            }, function () {
                                handleLocationError(true, infoWindow, map.getCenter());
                            });
                        } else {
                            // Browser doesn't support Geolocation
                            handleLocationError(false, infoWindow, map.getCenter());
                        }
                    });


                    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
                        infoWindow.setPosition(pos);
                        infoWindow.setContent(browserHasGeolocation ?
                                'Error: The Geolocation service failed.' :
                                'Error: Your browser doesn\'t support geolocation.');
                        infoWindow.open(map);
                    }

                    //                // bounds of the desired area
                    //                var strictBounds = new google.maps.LatLngBounds(
                    //                        new google.maps.LatLng(20.681228, 92.802149),
                    //                        new google.maps.LatLng(26.664276, 88.067301)
                    //                        );
                    //
                    //                // Listen for the dragend event
                    //                google.maps.event.addListener(map, 'dragend', function () {
                    //                    if (strictBounds.contains(map.getCenter()))
                    //                        return;
                    //
                    //                    // We're out of bounds - Move the map back within the bounds
                    //
                    //                    var c = map.getCenter(),
                    //                            x = c.lng(),
                    //                            y = c.lat(),
                    //                            maxX = strictBounds.getNorthEast().lng(),
                    //                            maxY = strictBounds.getNorthEast().lat(),
                    //                            minX = strictBounds.getSouthWest().lng(),
                    //                            minY = strictBounds.getSouthWest().lat();
                    //
                    //                    if (x < minX)
                    //                        x = minX;
                    //                    if (x > maxX)
                    //                        x = maxX;
                    //                    if (y < minY)
                    //                        y = minY;
                    //                    if (y > maxY)
                    //                        y = maxY;
                    //
                    //                    map.setCenter(new google.maps.LatLng(y, x));
                    //                });
                }

            </script>
            <script async defer
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7PQP6JmA6FHxC33sj2gHrMF9KMHRIIGA&callback=initMap">
            </script>

            <script>
                Dropzone.options.myAwesomeDropzone = {
                    addRemoveLinks: true,
                    dictResponseError: 'Server not Configured',
                    acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
                    init: function () {
                        var self = this;
                        // config
                        self.options.addRemoveLinks = true;
                        self.options.dictRemoveFile = "Delete";
                        //New file added
                        self.on("addedfile", function (file) {
                            console.log('new file added ', file.name);
                        });
                        // Send file starts
                        self.on("sending", function (file) {
                            //console.log('upload started', file);
                            $('.meter').show();
                        });

                        // File upload Progress
                        self.on("totaluploadprogress", function (progress) {
                            //console.log("progress ", progress);
                            $('.roller').width(progress + '%');
                        });

                        self.on("queuecomplete", function (progress) {
                            $('.meter').delay(999).slideUp(999);
                        });

                        // On removing file
                        self.on("removedfile", function (file) {
                            //console.log(file);
                            console.log(file.name);
                        });
                    }
                };
            </script>

            <script>

                (function ($) {
                    $(function () {

                        $('.carousel').carousel();
                        $('.collapsible').collapsible();
                        $(".not-collapse").on("click", function (e) {
                            e.stopPropagation();
                        });
                        $('.materialboxed').materialbox();
                        $('select').material_select();
                        $('.dropdown-button').dropdown({
                            hover: true,
                            belowOrigin: true
                        });


                        $('#category').change(function () {

                        });

                        $('#district').change(function () {

                        });

                    }); // end of document ready
                })(jQuery);

            </script>
    </body>
</html>

