<?php

include './header.php';
if ($inSession) {
    header("Location:index.php");
}

$errorMsg = FALSE;
$cookie_name = 'id';

if (isset($_POST['submit_btn']) || $reg_redir) {
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5(mysqli_real_escape_string($conn, $_POST['password']));

    if($email == '' || $password == '') header("Location:index.php");
    
    if (isset($_POST['keep_login'])) {
        $keep_login = $_POST['keep_login'];
    }

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
            header("Location:properties.php");
        }
    } else {
        $errorMsg = TRUE;
        die($conn->error);
        echo 'err';
    }

    header("Location:properties.php");
} else {
    header("Location:properties.php");
}