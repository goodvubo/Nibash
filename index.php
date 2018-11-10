<?php
include './header.php';
?>

<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>EstateBD</title>
        <link rel="icon" type="image/png" href="./favicon.ico">
        <link type="text/css" href="./css/icon.css" rel="stylesheet">
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

            .autocomplete-suggestion{
                font-size: 16px;
                color: #e040fb;
                display: block;
                line-height: 22px;
                padding: 14px 16px;
            }

            .collection .collection-item.active {
                background-color: #e040fb !important;
                color: #fff !important;
            }

        </style>
    </head>
    <body>

        <?php include './nav1.php'; ?>

        <div id="index-banner" class="parallax-container">
            <div class="section no-pad-bot">
                <div class="container">
                    <br><br>
                    <h1 class="header center purple-text text-accent-2">Home Sweet Home</h1>
                    <div class="row center">
                        <h5 class="header col s12 light">Find your next place with our help</h5>
                    </div>
                    <div class="row center">
                        
                    </div>
                    <br><br>

                </div>
            </div>
            <div class="parallax"><img src="./img/background1.jpg" alt="Unsplashed background img 1"></div>
        </div>


        <div class="container" id="niche">
            <div class="section">

                <!--   Icon Section   -->
                <div class="row">
                    <div class="col s12 center">
                        <h3><i class="mdi-content-send brown-text"></i></h3>
                        <a href="#" ><h4 class="purple-text text-accent-2">Explore</h4></a>
                        <br />
                        
                    </div>
                </div>

            </div>
        </div>


        <div class="parallax-container valign-wrapper">
            <div class="section no-pad-bot">
                <div class="container">
                    <div class="row center">
                        <!--                        <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>-->
                    </div>
                </div>
            </div>
            <div class="parallax"><img src="./img/background3.jpg" alt="Unsplashed background img 2"></div>
        </div>

        <div class="container">
            <div class="section">

                <div class="row">
                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center purple-text"><i class="material-icons">flash_on</i></h2>
                            <h5 class="center">Getting Things Done Faster</h5>

                            <p class="light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sodales quam ut lorem condimentum, eu elementum nunc fermentum. Aliquam non ante ex. In consectetur nisi diam, et vulputate nisl ullamcorper sit amet.</p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center purple-text"><i class="material-icons">group</i></h2>
                            <h5 class="center">Professional Consulting Service</h5>

                            <p class="light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sodales quam ut lorem condimentum, eu elementum nunc fermentum. Aliquam non ante ex. In consectetur nisi diam, et vulputate nisl ullamcorper sit amet. Sed sit amet sapien sed velit vulputate scelerisque placerat sed mauris.</p>
                        </div>
                    </div>

                    <div class="col s12 m4">
                        <div class="icon-block">
                            <h2 class="center purple-text"><i class="material-icons">settings</i></h2>
                            <h5 class="center">Designed for Best Experience</h5>

                            <p class="light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sodales quam ut lorem condimentum, eu elementum nunc fermentum. Aliquam non ante ex. In consectetur nisi diam, et vulputate nisl ullamcorper sit amet.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        <div class="parallax-container valign-wrapper">
            <div class="section no-pad-bot">
                <div class="container">
                    <div class="row center">
                        <!--                        <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>-->
                    </div>
                </div>
            </div>
            <div class="parallax"><img src="./img/background2.jpg" alt="Unsplashed background img 3"></div>
        </div>

        <?php include './footer.php'; ?>





        <script type="text/javascript" src="./js/jquery.auto-complete.min.js"></script>
        <script type="text/javascript" src="./js/init.js"></script>
        <script type="text/javascript" src="./overrider.js"></script>

        <script>
            (function ($) {
                $(function () {

                    //$('#tip').hide();
                    $('ul.tabs').tabs();
                    //                    $('ul.tabs').tabs({
                    //                        swipeable: true
                    //                    });
                    //$('ui.tabs').tabs('select_tab', 'test-swipe-1');

                    $('.dropdown-button').dropdown({
                        hover: true,
                        belowOrigin: true
                    });



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

                    var obj = $('input#autocomplete-input.autocomplete');
                    obj.change(function () {
                        if (obj.val() !== "") {
                            $('#tip').css("display", "block");
                        } else {
                            $('#tip').css("display", "none");
                        }
                    });

                });
            })(jQuery);
        </script>

    </body>
</html>

