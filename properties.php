<?php
include './header.php';

//if (!$inSession) {
//    header("Location:index.php");
//}

$q1 = "null";
$q2 = "null";
$q3 = "null";
$q0 = "";
?>

<?php
if (isset($_GET['q1'])) {
    $q1 = mysqli_real_escape_string($conn, $_GET['q1']);
}
if (isset($_GET['q2'])) {
    $q2 = mysqli_real_escape_string($conn, $_GET['q2']);
}
if (isset($_GET['q3'])) {
    $q3 = mysqli_real_escape_string($conn, $_GET['q3']);
}
if (isset($_GET['search'])) {
    $q0 = mysqli_real_escape_string($conn, $_GET['search']);
}
//echo $q1 . ", " . $q2 . ", " . $search . "<br />";
?>


<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>EstateBD</title>
        <link rel="icon" type="image/png" href="./favicon.ico">
        <link type="text/css" href="./css/icon.css" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="./css/nouislider.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="./css/materialize.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="./css/font-awesome.min.css"/>
        <link type="text/css" rel="stylesheet" href="./css/jquery.auto-complete.css" />
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
                margin-left: -15px !important;
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

            #lineLoader{
                margin-top: -1rem;
            }

            #circleLoader{
                left: 43%;
                margin-top: 10%;
            }

            .circle-clipper{
                border-color: #e040fb !important;
            }

            input.select-dropdown{
                color: initial;
            }

        </style>
    </head>
    <body>

        <div class="page-wrap">
            <?php include './nav2.php'; ?>




            <div class="container-fluid">
                <div id="lineLoader" class="loaderClass">
                    <div class="progress purple lighten-5">
                        <div class="indeterminate purple accent-2">

                        </div>

                    </div>

                </div>

                <div class="section">
                    <div class="row">
                        <div class="col l2 m2 s12 topped topped-filters fixme">
                            <form id="filterData">
                                <div class="input-field col s12 bgWhite card-eff">
                                    <select id="category" class="filter">
                                        <option value="" disabled selected>Select Category</option>
                                        <option value="null">Any Category</option>
                                        <option value="apartment">Apartment</option>
                                        <option value="house">House</option>
                                        <option value="office">Office</option>
                                        <option value="shop">Shop</option>
                                    </select>
                                    <label style="color: #4a148c;">Choose Category</label>
                                </div>
                                

                                <div class="input-field col s12 bgWhite card-eff" id="budget" style="margin-top: 0;">
                                    <label style="font-size: 0.8rem; color: #4a148c;">Select Budget</label>
                                    <br /><br />
                                    <div id="fee-range">
                                    </div>
                                    <br />
                                    <input id="input0" style="color: #e040fb;" readonly>
                                    <span style="color: #4a148c">to</span>
                                    <input id="input1" style="color: #e040fb;" readonly>
                                </div>
                            </form>
                        </div>

                        <nav id='moreF' class="col l7 m7 s12 offset-l2 fixme white" style="z-index: 9999; border: 1px solid #e040fb; box-shadow: none;">
                            <div class="nav-wrapper">
                                <span class="brand-logo" style="font-size: larger;">More Filters:</span>
                                <ul id="nav-mobile" class="right hide-on-med-and-down">
                                    <li class="forAp mFill">
                                        <div class="input-field col s12">
                                            <select id="Ap1" class="filter mrFilter">
                                                <option value="" disabled selected>Number of Beds</option>
                                                <option value="null">Any Bed option</option>
                                                <option value="1">1 Bed(s)</option>
                                                <option value="2">2 Bed(s)</option>
                                                <option value="3">3 Bed(s)</option>
                                                <option value="4">4 Bed(s)</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li class="forAp mFill">
                                        <div class="input-field col s12">
                                            <select id="Ap2" class="filter mrFilter">
                                                <option value="" disabled selected>Number of Baths</option>
                                                <option value="null">Any Bath option</option>
                                                <option value="1">1 Bath(s)</option>
                                                <option value="2">2 Bath(s)</option>
                                                <option value="3">3 Bath(s)</option>
                                                <option value="4">4 Bath(s)</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li class="forAp mFill">
                                        <div class="input-field col s12">
                                            <select id="Ap3" class="filter mrFilter">
                                                <option value="" disabled selected>Parking Space</option>
                                                <option value="null">Any Parking option</option>
                                                <option value="1">1 Parking(s)</option>
                                                <option value="2">2 Parking(s)</option>
                                                <option value="3">3 Parking(s)</option>
                                                <option value="4">4 Parking(s)</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li class="forOf mFill">
                                        <div class="input-field col s12">
                                            <select id="Of1" class="filter mrFilter">
                                                <option value="" disabled selected>Number of Lifts</option>
                                                <option value="null">Any Lift option</option>
                                                <option value="1">1 Lift(s)</option>
                                                <option value="2">2 Lift(s)</option>
                                                <option value="3">3 Lift(s)</option>
                                                <option value="4">4 Lift(s)</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li class="forOf mFill">
                                        <div class="input-field col s12">
                                            <select id="Of2" class="filter mrFilter">
                                                <option value="" disabled selected>Number of Baths</option>
                                                <option value="null">Any Bath option</option>
                                                <option value="1">1 Bath(s)</option>
                                                <option value="2">2 Bath(s)</option>
                                                <option value="3">3 Bath(s)</option>
                                                <option value="4">4 Bath(s)</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li class="forOf mFill">
                                        <div class="input-field col s12">
                                            <select id="Of3" class="filter mrFilter">
                                                <option value="" disabled selected>Number of Rooms</option>
                                                <option value="null">Any Room option</option>
                                                <option value="1">1 Room(s)</option>
                                                <option value="2">2 Room(s)</option>
                                                <option value="3">3 Room(s)</option>
                                                <option value="4">4 Room(s)</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li class="forHs mFill">
                                        <div class="input-field col s12">
                                            <select id="Hs1" class="filter mrFilter">
                                                <option value="" disabled selected>Number of Floors</option>
                                                <option value="null">Any Floor option</option>
                                                <option value="1">1 Floor(s)</option>
                                                <option value="2">2 Floor(s)</option>
                                                <option value="3">3 Floor(s)</option>
                                                <option value="4">4 Floor(s)</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li class="forHs mFill">
                                        <div class="input-field col s12">
                                            <select id="Hs2" class="filter mrFilter">
                                                <option value="" disabled selected>Number of Lifts</option>
                                                <option value="null">Any Lift option</option>
                                                <option value="1">1 Lift(s)</option>
                                                <option value="2">2 Lift(s)</option>
                                                <option value="3">3 Lift(s)</option>
                                                <option value="4">4 Lift(s)</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li class="forHs mFill">
                                        <div class="input-field col s12">
                                            <select id="Hs3" class="filter mrFilter">
                                                <option value="" disabled selected>Parking Space</option>
                                                <option value="null">Any Parking option</option>
                                                <option value="1">1 Parking(s)</option>
                                                <option value="2">2 Parking(s)</option>
                                                <option value="3">3 Parking(s)</option>
                                                <option value="4">4 Parking(s)</option>
                                            </select>
                                        </div>
                                    </li>
                                    <li class="forSh mFill">
                                        <div class="input-field col s12">
                                            <select id="Sh1" class="filter mrFilter">
                                                <option value="" disabled selected>Floor Number</option>
                                                <option value="null">Any Floor option</option>
                                                <option value="0">Ground Floor</option>
                                                <option value="1">1st</option>
                                                <option value="2">2nd</option>
                                                <option value="3">3rd</option>
                                                <option value="4">4th</option>
                                            </select>
                                        </div>
                                    </li>
                                    <!--                                    <li class="forSh mFill">
                                                                            <div class="input-field col s12">
                                                                                <select id="Sh2" class="filter">
                                                                                    <option value="" disabled selected>Number of Baths</option>
                                                                                    <option value="null">Any Bath option</option>
                                                                                    <option value="1">1 Bath(s)</option>
                                                                                    <option value="2">2 Bath(s)</option>
                                                                                    <option value="3">3 Bath(s)</option>
                                                                                    <option value="4">4 Bath(s)</option>
                                                                                </select>
                                                                            </div>
                                                                        </li>-->
                                    <!--                                    <li class="forSh mFill">
                                                                            <div class="input-field col s12">
                                                                                <select id="Sh3" class="filter">
                                                                                    <option value="" disabled selected>Parking Space</option>
                                                                                    <option value="null">Any Parking option</option>
                                                                                    <option value="1">1 Parking(s)</option>
                                                                                    <option value="2">2 Parking(s)</option>
                                                                                    <option value="3">3 Parking(s)</option>
                                                                                    <option value="4">4 Parking(s)</option>
                                                                                </select>
                                                                            </div>
                                                                        </li>-->
                                </ul>
                            </div>
                        </nav>

                        <div id="propList" class="col l7 m7 s12 offset-l2" data-last="10">
                            <!--                            <h4 class="purple-text text-accent-2">Explore</h4>-->

                            <div id="circleLoader" class="preloader-wrapper small active">
                                <div class="spinner-layer">
                                    <div class="circle-clipper left">
                                        <div class="circle"></div>
                                    </div><div class="gap-patch">
                                        <div class="circle"></div>
                                    </div><div class="circle-clipper right">
                                        <div class="circle"></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col hide-on-small-only m3 l3 s12 topped topped-map">
                            <label>powered by <b>google</b></label>
                            <div id="map" style="border: 1px solid #4a148c;">
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <?php include './footer2.php'; ?>



        <script type="text/javascript" src="./js/nouislider.js"></script>
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
                    center: new google.maps.LatLng(23.777176, 90.399452),
                });

                infowindow = new google.maps.InfoWindow();
                marker = new google.maps.Marker();

                $("#propList").on({
                    mouseenter: function () {
                        var center = new google.maps.LatLng($(this).attr("data-lat"), $(this).attr("data-lng"));
                        marker.setMap(map);
                        map.setOptions({zoom: 15});
                        map.panTo(center);

                        marker.setPosition(center);
                        infowindow.setContent('<div>' +
                                '<strong>Address: </strong>' + $(this).attr("data-addr") + '<br>' +
                                '<strong>Rent: </strong>' + $(this).attr("data-price")
                                + ' TK </div>');
                        infowindow.open(map, marker);
                    },
                    mouseleave: function () {
                        //map.setOptions({zoom: 6});
                        marker.setMap(null);
                        infowindow.setMap(null);
                    }
                }, '.lItem');
            }

        </script>
        <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7PQP6JmA6FHxC33sj2gHrMF9KMHRIIGA&callback=initMap">
        </script>

        <script>

            (function ($) {
                $(function () {
                    //$('.loaderClass').hide();
                    //$('.forAp').hide();

                    var faultz0 = 0;
                    var faultz1 = 50000;
                    var no = 1;
                    var fixmeTop = $('.fixme').offset().top;       // get initial position of the element

                    $(window).scroll(function () {                  // assign scroll event listener

                        var currentScroll = $(window).scrollTop(); // get current position

                        if (currentScroll >= fixmeTop) {           // apply position: fixed if you
                            $('.fixme').css({// scroll to that element or below it
                                position: 'fixed',
                                top: '1px',
                                left: '0'
                            });
                            $(".fixme").css('margin-left', '16.6666666667%');
                        } else {                                   // apply position: static
                            $('.fixme').css({// if you scroll above it
                                position: 'static'
                            });
                            $(".fixme").css('margin-left', '2%');
                        }

                        if (true)
                        {
                            if ($(window).height() + $(window).scrollTop() == $(document).height()) {
                                no = 2;
                                if (window.XMLHttpRequest) {
                                    // code for IE7+, Firefox, Chrome, Opera, Safari
                                    xmlhttp = new XMLHttpRequest();
                                } else { // code for IE6, IE5
                                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                                }
                                xmlhttp.onreadystatechange = function () {
                                    if (this.readyState == 4 && this.status == 200) {
                                        var res = this.responseText;
                                        //console.log(res);
                                        setTimeout(function () {
                                            $('#propList').find('#circleLoader').remove();
                                            $("#propList").append(res);
                                        }, 2000);
                                    } else {
                                        if (!$('#propList #circleLoader').length) {
                                            $("#propList").append('<div id="circleLoader" class="preloader-wrapper small active circleLDR">' +
                                                    '<div class="spinner-layer">' +
                                                    '<div class="circle-clipper left">' +
                                                    '<div class="circle"></div>' +
                                                    '</div><div class="gap-patch">' +
                                                    '<div class="circle"></div>' +
                                                    '</div><div class="circle-clipper right">' +
                                                    '<div class="circle"></div>' +
                                                    '</div>' +
                                                    '</div>' +
                                                    '</div>');
                                        }
                                    }
                                }
                                var v1 = $('#category').val();
                                var v2 = $('#district').val();
                                var v3 = $('#area').val();
                                var v4 = faultz0;
                                var v5 = faultz1;
                                var v6 = $('#bed').val();
                                var v7 = $('#bath').val();
                                var v8 = $('#park').val();
                                xmlhttp.open("GET", "getList.php?q1=" + v1 + "&q2=" + v2 + "&q3=" + v3 + "&q4=" + v4 + "&q5=" + v5 + "&q6=" + v6 + "&q7=" + v7 + "&q8=" + v8 + "&l=" + $("#propList").attr("data-last"), true);
                                xmlhttp.send();
                                $("#propList").attr("data-last", parseInt($("#propList").attr("data-last")) + 10);
                            }
                        }

                    });

                    function mFilterZ(catZ) {
                        $('.mFill').hide();
                        if (catZ == 'apartment') {
                            $('.forAp').show();
                        }
                        if (catZ == 'house') {
                            $('.forHs').show();
                        }
                        if (catZ == 'office') {
                            $('.forOf').show();
                        }
                        if (catZ == 'shop') {
                            $('.forSh').show();
                        }
                    }

                    var cat = '<?php echo $q1; ?>';
                    var dis = '<?php echo $q2; ?>';
                    var ara = '<?php echo $q3; ?>';
                    var srch = '<?php echo $q0; ?>';

                    console.log(srch + "," + cat + "," + dis + "," + ara);

                    $('#category').val(cat);
                    mFilterZ(cat);
                    districtOpt(cat);
                    areaOpt(cat, dis);
                    $('select').material_select();

                    if (srch == '') {
                        showList(cat, dis, ara, 0, 50000);
                    } else {
                        searchList(srch);
                    }

                    $('.dropdown-button').dropdown({
                        hover: true,
                        belowOrigin: true
                    });

                    var feeSlider = document.getElementById('fee-range');

                    noUiSlider.create(feeSlider, {
                        start: [0, 50000],
                        connect: true,
                        step: 1,
                        range: {
                            'min': 0,
                            'max': 50000
                        },
                        format: wNumb({
                            decimals: 0
                        })
                    });

                    var input0 = document.getElementById('input0');
                    var input1 = document.getElementById('input1');

                    faultz0 = 0;
                    faultz1 = 50000;

                    feeSlider.noUiSlider.on('update', function (values, handle) {

                        var value = values[handle];

                        if (handle) {
                            faultz1 = Math.round(value);
                            input1.value = faultz1 + " Tk";
                        } else {
                            faultz0 = Math.round(value);
                            input0.value = faultz0 + " Tk";
                        }

                        if (!$('#propList #circleLoader').length) {
                            setTimeout(function () {
                                showList($('#category').val(), $('#district').val(), $('#area').val(), faultz0, faultz1, $('#bed').val(), $('#bath').val(), $('#park').val());
                            }, 2000);
                        }

                    });

                    input0.addEventListener('change', function () {
                        feeSlider.noUiSlider.set([Math.round(this.value), null]);
                    });

                    input1.addEventListener('change', function () {
                        feeSlider.noUiSlider.set([null, Math.round(this.value)]);
                    });

                    $('#category').on('change', function () {
                        mFilterZ(this.value);
                        districtOpt(this.value);
                        $('#district').val(null);//reset
                        showList(this.value, $('#district').val(), $('#area').val(), faultz0, faultz1, $('#bed').val(), $('#bath').val(), $('#park').val());
                    });
                    $('#district').on('change', function () {
                        areaOpt($('#category').val(), this.value);
                        $('#area').val(null);//reset
                        showList($('#category').val(), this.value, $('#area').val(), faultz0, faultz1, $('#bed').val(), $('#bath').val(), $('#park').val());
                    });
                    $('#area').on('change', function () {
                        showList($('#category').val(), $('#district').val(), this.value, faultz0, faultz1, $('#bed').val(), $('#bath').val(), $('#park').val());
                    });
                    //apartment
                    $('#Ap1').on('change', function () {
                        showList($('#category').val(), $('#district').val(), $('#area').val(), faultz0, faultz1, this.value, $('#Ap2').val(), $('#Ap3').val());
                    });
                    $('#Ap2').on('change', function () {
                        showList($('#category').val(), $('#district').val(), $('#area').val(), faultz0, faultz1, $('#Ap1').val(), this.value, $('#Ap3').val());
                    });
                    $('#Ap3').on('change', function () {
                        showList($('#category').val(), $('#district').val(), $('#area').val(), faultz0, faultz1, $('#Ap1').val(), $('#Ap2').val(), this.value);
                    });
                    //office
                    $('#Of1').on('change', function () {
                        showList($('#category').val(), $('#district').val(), $('#area').val(), faultz0, faultz1, this.value, $('#Of2').val(), $('#Of3').val());
                    });
                    $('#Of2').on('change', function () {
                        showList($('#category').val(), $('#district').val(), $('#area').val(), faultz0, faultz1, $('#Of1').val(), this.value, $('#Of3').val());
                    });
                    $('#Of3').on('change', function () {
                        showList($('#category').val(), $('#district').val(), $('#area').val(), faultz0, faultz1, $('#Of1').val(), $('#Of2').val(), this.value);
                    });
                    //house
                    $('#Hs1').on('change', function () {
                        showList($('#category').val(), $('#district').val(), $('#area').val(), faultz0, faultz1, this.value, $('#Hs2').val(), $('#Hs3').val());
                    });
                    $('#Hs2').on('change', function () {
                        showList($('#category').val(), $('#district').val(), $('#area').val(), faultz0, faultz1, $('#Hs1').val(), this.value, $('#Hs3').val());
                    });
                    $('#Hs3').on('change', function () {
                        showList($('#category').val(), $('#district').val(), $('#area').val(), faultz0, faultz1, $('#Hs1').val(), $('#Hs2').val(), this.value);
                    });
                    //shop
                    $('#Sh1').on('change', function () {
                        showList($('#category').val(), $('#district').val(), $('#area').val(), faultz0, faultz1, this.value);
                    });

                }); // end of document ready
            })(jQuery);

        </script>

        <script>
            function searchList(q1) {
                try {
                    $("#propList").attr("data-last", 10);
                    map.panTo(new google.maps.LatLng(23.777176, 90.399452));
                    map.setOptions({zoom: 6});
                    marker.setMap(null);
                    infowindow.setMap(null);
                } catch (err) {
                    console.log(err.message);
                }

                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else { // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        if (!$('#propList #circleLoader').length) {
                            document.getElementById("propList").innerHTML = "";
                        }
                        var res = this.responseText;
                        setTimeout(function () {
                            document.getElementById("propList").innerHTML = res;
                            $('.loaderClass').hide();
                        }, 2000);
                    } else {
                        $('.loaderClass').show();
                    }
                }
                xmlhttp.open("GET", "searchList.php?q1=" + q1, true);
                xmlhttp.send();
            }
        </script>

        <script>
            function showList(q1, q2, q3, q4, q5, q6, q7, q8) {
                try {
                    $("#propList").attr("data-last", 10);
                    map.panTo(new google.maps.LatLng(23.777176, 90.399452));
                    map.setOptions({zoom: 6});
                    marker.setMap(null);
                    infowindow.setMap(null);
                } catch (err) {
                    console.log(err.message);
                }

                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else { // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        if (!$('#propList #circleLoader').length) {
                            document.getElementById("propList").innerHTML = "";
                        }
                        var res = this.responseText;
                        setTimeout(function () {
                            document.getElementById("propList").innerHTML = res;
                            $('.loaderClass').hide();
                        }, 2000);
                    } else {
                        $('.loaderClass').show();
                    }
                }
                xmlhttp.open("GET", "getList.php?q1=" + q1 + "&q2=" + q2 + "&q3=" + q3 + "&q4=" + q4 + "&q5=" + q5 + "&q6=" + q6 + "&q7=" + q7 + "&q8=" + q8, true);
                xmlhttp.send();
            }
        </script>



        <script>
            function districtOpt(q1, selD) {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else { // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("district").innerHTML = "";
                        $('#district').material_select('destroy');
                        document.getElementById("district").innerHTML = this.responseText;
                        $('#district').val(selD);
                        $('#district').material_select();
                        //console.log(this.responseText);
                    }
                }
                xmlhttp.open("GET", "getDistrictOpt.php?q1=" + q1, true);
                xmlhttp.send();
            }
        </script>
        <script>
            function areaOpt(q1, q2, selA) {
                if (window.XMLHttpRequest) {
                    // code for IE7+, Firefox, Chrome, Opera, Safari
                    xmlhttp = new XMLHttpRequest();
                } else { // code for IE6, IE5
                    xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                }
                xmlhttp.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("area").innerHTML = "";
                        $('#area').material_select('destroy');
                        document.getElementById("area").innerHTML = this.responseText;
                        $('#area').val(selA);
                        $('#area').material_select();
                        //console.log(this.responseText);
                    }
                }
                xmlhttp.open("GET", "getAreaOpt.php?q1=" + q1 + "&q2=" + q2, true);
                xmlhttp.send();
            }
        </script>

        <script>
            (function ($) {
                $(function () {
                    $('input#autocomplete-input.autocomplete').autoComplete({
                        minChars: 1,
                        source: function (term, suggest) {
                            if (window.XMLHttpRequest) {
                                // code for IE7+, Firefox, Chrome, Opera, Safari
                                xmlhttp = new XMLHttpRequest();
                            } else { // code for IE6, IE5
                                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                            }
                            xmlhttp.onreadystatechange = function () {
                                if (this.readyState == 4 && this.status == 200) {
                                    term = term.toLowerCase();
                                    var choices = JSON.parse(this.responseText);
                                    var matches = [];
                                    console.log(choices[0].district);
                                    for (i = 0; i < choices.length; i++)
                                        if (~(choices[i].district.toLowerCase().indexOf(term)))
                                            matches.push(choices[i].district);
                                    suggest(matches);
                                }
                            }
                            xmlhttp.open("GET", "autoComplete.php?x=" + term, true);
                            xmlhttp.send();
                        }
                    });
                });
            })(jQuery);
        </script>

    </body>
</html>

