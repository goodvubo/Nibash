<?php

include './header.php';
if ($inSession) {
    header("Location:index.php");
}

$errorMsg = FALSE;

if (isset($_POST['reg_act'])) {
    $fName = mysqli_real_escape_string($conn, $_POST['fName']);
    $lName = mysqli_real_escape_string($conn, $_POST['lName']);
    $email = mysqli_real_escape_string($conn, $_POST['mail']);
    $password = md5(mysqli_real_escape_string($conn, $_POST['pass']));

    $newUsr = "INSERT INTO `users`(`fname`, `lname`, `mail`, `pass`, `date_joined`) VALUES ('$fName','$lName','$email','$password','$date_')";

    if ($conn->query($newUsr) == TRUE) {
        
        
        $loginCheck = "SELECT * FROM users WHERE mail='$email' AND pass='$password'";

        $result = $conn->query($loginCheck);

        if ($result->num_rows > 0) {
            while ($rows = $result->fetch_assoc()) {
                $_SESSION['id'] = $rows['user_id'];
                $_SESSION['name'] = $rows['fname'] . " " . $rows['lname'];
                $_SESSION['img'] = $rows['img'];

                if ($keep_login == TRUE) {
                    setcookie($cookie_name, $_SESSION['id'], time() + (3600 * 24 * 30));
                }
                $s_id = mysqli_real_escape_string($conn, $_SESSION['id']);
                $s_name = mysqli_real_escape_string($conn, $_SESSION['name']);
                $s_img = mysqli_real_escape_string($conn, $_SESSION['img']);
                $inSession = TRUE;
            }
        } else {
            $errorMsg = TRUE;
            die($conn->error);
        }
        //**********auth stuff : end**************//
        
        header("Location:profile.php");
        
    } else {
        $errorMsg = TRUE;
        die($conn->error);
    }

    //header("Location:index.php");
}

