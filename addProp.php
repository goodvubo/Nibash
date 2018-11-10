<?php
include './header.php';

//if (!$inSession) {
//    header("Location:index.php");
//}
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
        <link type="text/css" rel="stylesheet" href="./css/jquery.auto-complete.css" />
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

            .dropzone {
                border: 2px dashed #e040fb;
                min-height: 217px;
            }

            .dropzone .dz-message {
                margin: 5em 0;
            }

        </style>
        <style>
            .tlTip {
                position: relative;
                display: inline-block;
            }

            .tlTip .tlTiptext {
                visibility: hidden;
                width: 120px;
                background-color: #555;
                color: #fff;
                text-align: center;
                border-radius: 6px;
                padding: 5px 0;
                position: absolute;
                z-index: 1;
                top: -5px;
                left: 110%;
            }

            .tlTip .tlTiptext::after {
                content: "";
                position: absolute;
                top: 50%;
                right: 100%;
                margin-top: -5px;
                border-width: 5px;
                border-style: solid;
                border-color: transparent #555 transparent transparent;
            }
            .tlTip:hover .tlTiptext {
                visibility: visible;
            }
            .tlTip .tlTiptext {
                visibility: visible;
                top: -17px;
                left: 140%;
                width: 160px;
            }
        </style>
    </head>
    <body>

        <div class="page-wrap">
            <?php include './nav2.php'; ?>


            <div class="container-fluid">
                <div class="section">

                    <div class="row">

                        <div class="col l7 m7 s12 offset-l2">
                            <h4 class="purple-text text-accent-2">Offer Property</h4>


                            <form id="addFRM" class="col s12" method="post" action="insertProp.php">

                                <div class="row">
                                    <!--offerType-->
                                    <div class="input-field col s6">
                                        <select id="offerType" class="" name="offerType">
                                            <option value="" disabled selected>Select Offer Type *</option>
                                            <option value="rent">Rent</option>
                                            <option value="sale">Sale</option>
                                        </select>
                                    </div> 
                                    <!--catagory-->
                                    <div class="input-field col s6">
                                        <select id="category" class="" name="category">
                                            <option value="" disabled selected>Select Property Type *</option>
                                            <option value="apartment">Apartment</option>
                                            <option value="house">House</option>
                                            <option value="office">Office</option>
                                            <option value="shop">Shop</option>
                                        </select>
                                    </div>
                                </div>

                                <!--price-->
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input id="price" type="text" class="validate" name="price">
                                        <label for="price"><i class="fa fa-lg fa-money" aria-hidden="true"></i>&nbsp;&nbsp;Price(bdt)</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id ="available_from" class="datepicker" type="date" name="available_from" min=<?php echo date("Y-m-d"); ?>>
                                        <label for="available_from" class="active"><i class="fa fa-lg fa-calendar" aria-hidden="true"></i>&nbsp;&nbsp;Available From</label> 
                                    </div>
                                </div>
                                <!--Available From-->


                                <h5 class="purple-text text-accent-2">Property Address</h5>
                                <!--                                Country
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <input id="country" type="text" class="validate" name="country">
                                                                        <label for="country">Country *</label>
                                                                    </div>
                                                                </div>-->
                                <!--District-->
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input id="district" type="text" class="validate" name="district">
                                        <label for="district">District *</label>                                        
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="area" type="text" class="validate" name="area">
                                        <label for="area">Area *</label>
                                    </div>
                                </div>
                                <!--Area-->

                                <!--Full Adress-->
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="fullAddress" type="text" class="validate" name="fullAddress">
                                        <label for="fullAddress">Full Address</label>
                                    </div>
                                </div>

                                <div class="input-field col s12" style="border: 1px solid #4a148c; margin-bottom: 2.25rem;">
                                    <div class="tlTip" style="position: absolute; top: 35px; right: 20px; width: 3%;" >
                                        <img id="geoLocateIco" alt="geoLocate" class="" src="./img/gps.gif" style="width: 100%; cursor: pointer;" />
                                        <span class="tlTiptext">Get your location. Unblock if needed.</span>
                                    </div>
                                    <input id="location" type="text" class="validate" style="margin-top: 3%;" name="location">
                                    <label id="locLabel" for="location" style="margin-top: 3%;"><i class="fa fa-lg fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;Geolocation</label>
                                    <div id="map" style="margin-bottom: -9px;"></div>
                                    <div class="tlTip" style="left: 103%; bottom: 180px;" >
                                        <span class="tlTiptext">Find your property and click on the map to get the position</span>
                                    </div>
                                </div>

                                <h5 class="purple-text text-accent-2">Property Feature</h5>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input id="beds" type="number" class="validate" name="beds">
                                        <label for="beds"><i class="fa fa-lg fa-bed" aria-hidden="true"></i>&nbsp;&nbsp;Bedrooms</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="baths" type="number" class="validate" name="baths">
                                        <label for="baths"><i class="fa fa-lg fa-bath" aria-hidden="true"></i>&nbsp;&nbsp;Bathrooms</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input id="ttlrooms" type="number" class="validate" name="ttlrooms">
                                        <label for="ttlrooms">Total Rooms (unit) </label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="ttlarea" type="number" class="validate" name="ttlarea">
                                        <label for="ttlarea">Total Area (sq. ft) *</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="floor" type="number" class="validate" name="floor">
                                        <label for="floor">Floor No.</label>
                                    </div>
                                </div>
                                <div class="row" style="margin-top: 38%;">
                                    <div class="input-field col s12">
                                        <textarea id="propDetails" class="materialize-textarea" name="propDetails"></textarea>
                                        <label for="propDetails"><i class="fa fa-lg fa-info-circle" aria-hidden="true"></i>&nbsp;&nbsp;More About the Property</label>
                                    </div>
                                </div>
                                <input id="hdnImgZ" type="text" name="mediaZ" value="?" hidden>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button id="addSB" class="btn waves-effect waves-light purple accent-2" type="submit" name="add">
                                            Add Property
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="input-field col s7" style="position: absolute; bottom: -139%;">
                                    <form action="addUpImg.php"
                                          class="dropzone"
                                          id="my-awesome-dropzone"></form>
                                </div>
                            </div>

                            <div class="col hide-on-small-only m3 l3 s12 topped topped-map">
                                <!--                            <label>powered by <b>google</b></label>
                                                            <div id="map" style="border: 1px solid #4a148c;">
                                                            </div>-->
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div id="GLoc" class="modal">
            <div class="modal-content">
                <h4 class="orange-text text-accent-2">Dear User</h4>
                <p class="orange-text text-accent-2 geoAct">Would you like to get your location from the browser?</p>
                <p class="orange-text text-accent-2 geoRej" style="display: none;">Please use the map provided in the form to locate your property manually.</p>
            </div>
            <div class="modal-footer">
                <a id="LocRej" href="#!" class="geoAct modal-action waves-effect waves-grey btn white" style="color: initial;">No</a>
                <a id="LocAct" href="#!" class="geoAct modal-action modal-close waves-effect waves-green btn orange accent-2 white-text"><span>Yes</span></a>
                <a href="#!" class="geoRej modal-action modal-close waves-effect waves-grey btn white" style="color: initial; display: none;">Close</a>
            </div>
        </div>
        <?php include './footer.php'; ?>


        <script type="text/javascript" src="./js/jquery.auto-complete.min.js"></script>
        <script type="text/javascript" src="./js/nouislider.js"></script>
        <script type="text/javascript" src="./js/dropzone.js"></script>
        <script type="text/javascript" src="./js/init.js"></script>
        <script type="text/javascript" src="./overrider.js"></script>

        <script>
            var map;
            var marker;
            var infowindow;
            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                    zoom: 6,
                    minZoom: 6,
                    center: new google.maps.LatLng(23.777176, 90.399452)
                });

                infowindow = new google.maps.InfoWindow();

                marker = new google.maps.Marker({
                    map: map
                });
                map.setOptions({draggableCursor: 'crosshair'});
                google.maps.event.addListener(map, 'click', function (event) {
                    marker.setPosition(event.latLng);
                    map.panTo(event.latLng);
                    map.setOptions({zoom: 15});
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
                            marker.setPosition(pos);
                            map.panTo(pos);
                            map.setOptions({zoom: 15});
                            infowindow.setContent('<div>' +
                                    'Latitude: ' + position.coords.latitude + '<br>' +
                                    'Longitude: ' + position.coords.longitude
                                    + '</div>');
                            infowindow.open(map, marker);

                            $("#locLabel").addClass("active");
                            $("#location").val(position.coords.latitude + ", " + position.coords.longitude);
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
            }

        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7PQP6JmA6FHxC33sj2gHrMF9KMHRIIGA&callback=initMap">
        </script>

        <script>
            Dropzone.options.myAwesomeDropzone = {
                dictDefaultMessage: "Drop image of your property here to upload",
                addRemoveLinks: true,
                dictResponseError: 'Server not Configured',
                acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
//                renameFilename: function (filename) {
//                    return new Date().getTime() + '_' + filename;
//                },
                init: function () {
                    var self = this;
                    // config
                    self.options.addRemoveLinks = true;
                    self.options.dictRemoveFile = "Delete";
                    //New file added
                    self.on("addedfile", function (file) {
                        console.log('new file added: ', file.name);
                        if ($('#hdnImgZ').val() == "?") {
                            $('#hdnImgZ').val(file.name);
                        } else {
                            $('#hdnImgZ').val($('#hdnImgZ').val() + ", " + file.name);
                        }
                        console.log($('#hdnImgZ').val());
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

                        try {
                            if (window.XMLHttpRequest) {
                                // code for IE7+, Firefox, Chrome, Opera, Safari
                                xmlhttp = new XMLHttpRequest();
                            } else { // code for IE6, IE5
                                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                            }
                            xmlhttp.onreadystatechange = function () {
                                if (this.readyState == 4 && this.status == 200) {
                                    var res = this.responseText;
                                } else {
                                    console.log("err");
                                }
                            }
                            xmlhttp.open("POST", "upDelete.php?f=" + file.name, true);
                            xmlhttp.send();
                        } catch (exception) {
                            console.log("exception");
                        }

                    });
                }
            };
        </script>

        <script>

            (function ($) {
                $(function () {
                    $("#GLoc").modal();
                    $("#GLoc").modal('open');

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

                    $('.datepicker').pickadate({
                        selectMonths: true, // Creates a dropdown to control month
                        selectYears: 15, // Creates a dropdown of 15 years to control year,
                        today: 'Today',
                        clear: 'Clear',
                        close: 'Ok',
                        closeOnSelect: false // Close upon selecting a date,
                    });

                    $("#LocAct").click(function () {
                        $("#geoLocateIco").trigger("click");
                    });

                    $("#LocRej").click(function () {
                        $(".geoAct").hide();
                        $(".geoRej").fadeIn();
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

