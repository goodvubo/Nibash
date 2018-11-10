<?php
include './header.php';

if (!$inSession) {
    header("Location:index.php");
}
?>

<?php
$upload_status = 1;
if (isset($_POST['update_btn'])) {
    $target = "img/uploads/" . $_FILES['uploadFile']['name'];

    $fileSource = $_FILES['uploadFile']['tmp_name'];
    $fileExtension = pathinfo($target, PATHINFO_EXTENSION);

    $fileSize = $_FILES['uploadFile']['size'];

    if ($fileExtension != "jpg" && $fileExtension != "png" && $fileExtension != "jpeg" && $fileExtension != "JPG" && $fileExtension != "PNG" && $fileExtension != "JPEG") {
        $upload_status = 0;
    }

    if (file_exists($target)) {

        $exs = 1;
        $upload_status = 0;
    }

    if ($upload_status) {
        $updateSql = "UPDATE `users` SET `img`='$target' WHERE `user_id`='$s_id'";
        if ($conn->query($updateSql) == TRUE) {
            if (move_uploaded_file($fileSource, $target)) {
                $up = 1;
            }
        } else {
            die($conn->error);
        }
    }

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    $updateSql = "UPDATE `users` SET `fname`='$fname',`lname`='$lname',`mail`='$email' WHERE `user_id`='$s_id'";

    if ($conn->query($updateSql) == TRUE) {
        header("Location:profile.php");
    } else {
        die($conn->error);
    }
}
?>

<?php
$profileData = "SELECT * FROM users WHERE user_id='$s_id'";

        $resultD = $conn->query($profileData);

        if ($resultD->num_rows > 0) {
            while ($rowsD = $resultD->fetch_assoc()) {
                $_f = $rowsD['fname'];
                $_l = $rowsD['lname'];
                $_mail = $rowsD['mail'];
                $_img = $rowsD['img'];
            }
        }
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

            /* img overlay */
            #image_preview {
                position: relative;
                width: 50%;
                border: 1px solid #4a148c;
                border-radius: 5px;
                padding: 0;
            }

            .image {
                opacity: 1;
                display: block;
                width: 100%;
                height: auto;
                transition: .5s ease;
                backface-visibility: hidden;
            }

            .middle {
                transition: .5s ease;
                opacity: 0;
                width: 120%;
                position: absolute;
                top: 92%;
                left: 50%;
                transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%)
            }

            #image_preview:hover .image {
                opacity: 0.3;
            }

            #image_preview:hover .middle {
                opacity: 1;
            }

            .text {
                border-radius: 7px;
                background-color: #e040fb;
                color: white;
                font-size: 16px;
                padding: 16px 32px;
            }

            .pS{
                color: #ffab40;
                margin-right: 24px;
                -webkit-transition: color .3s ease;
                transition: color .3s ease;
                text-transform: uppercase;
            }
/*            #previewing{
                cursor: pointer;
            }*/

        </style>
    </head>
    <body>
			<div  class="page-wrap">
            <?php include './nav1.php'; ?>

            <div class="container">
                <div class="section">

                    <div class="row">

                        <div class="col s12" >
                            
                            <form class="col s12" action="profile.php" method='POST' enctype='multipart/form-data'>
                                <div class="row">
                                    <div class="input-field">
                                        <label class="control-label">Profile Picture</label>
                                        <br /><br />
                                        <div class="fileupload fileupload-new" data-provides="fileupload">
                                            <input type="hidden" value="" name="">
                                            <div class="fileupload-new img-thumbnail" id="image_preview" style="width: 200px; height: 200px;">
                                                <img id="previewing" alt="Avatar" class="image img-thumbnail" style="width: 100%; height: 100%;" src="<?php
                                                if ($_img != "") {
                                                    echo $_img;
                                                } else {
                                                    echo 'img/uploads/default_159_8584217216.jpg';
                                                }
                                                ?>" />
                                                <a class="waves-effect waves-light btn middle purple accent-2">
                                                    <input type="file" name="uploadFile" id="profilepic">
                                                </a>
                                            </div>
                                            <div class="fileupload-preview fileupload-exists img-thumbnail" style="display: none;"></div>
                                            <!--                                            <div class="file-field input-field" style="display: none;">
                                                                                            <div class="btn" id="selectImage">
                                                                                                <span class="fileupload-new">Select image</span>
                                                                                                <input type="file" name="uploadFile" id="profilepic">
                                                                                            </div>
                                                                                            <div class="file-path-wrapper">
                                                                                                <input class="file-path validate" type="text">
                                                                                            </div>
                                                                                        </div>-->
                                        </div>
                                        <p><?php
                                            if (isset($_POST['update_btn'])) {
                                                if (!($upload_status)) {
                                                    echo "<br>" . "File can't be uploaded.";
                                                }
                                                if ($up) {
                                                    echo "<br>" . 'File size is: ' . number_format((($fileSize / 1024) / 1024), 2) . "MB<br/>" . 'File uploaded succesfully.';
                                                } elseif ($exs) {
                                                    echo "<br>" . 'File already exsist.';
                                                }
                                            }
                                            ?>
                                        </p>
                                        <div id="message"></div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input value="<?php echo $_f; ?>" name='fname' id="first_name" type="text" class="validate">
                                        <label class="active" for="first_name">First Name</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input value="<?php echo $_l; ?>" name='lname' id="last_name" type="text" class="validate">
                                        <label class="active" for="last_name">Last Name</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input value="<?php echo $_mail; ?>" name='email' id="email" type="email" class="validate">
                                        <label class="active" for="email">Email</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <a href="#" class="pS">
                                            <i class="fa fa-lg fa-external-link" aria-hidden="true"></i>&nbsp;&nbsp;<span style="text-decoration: underline;">privacy & security settings</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="btn waves-effect waves-light purple accent-2" type="submit" name="update_btn">
                                            Update / Save
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>
		
        <?php include './footer.php'; ?>
        
         <script type="text/javascript" src="./js/init.js"></script>
        <script type="text/javascript" src="./js/imgUpload.js"></script>
        <script type="text/javascript" src="./overrider.js"></script>

        <script>

            (function ($) {
                $(function () {

                    Materialize.updateTextFields();

                    $('.dropdown-button').dropdown({
                        hover: true,
                        belowOrigin: true
                    });

                });
            })(jQuery);

        </script>
       
    </body>
</html>

