<?php

session_start();
include './dbConnect.php';
$inSession = FALSE;
$reg_redir = FALSE;

$s_id = NULL;
$s_name = NULL;
$s_img = NULL;

if (isset($_SESSION['id']) || isset($_COOKIE['id'])) {
    if (!isset($_SESSION['id'])) {
        
        $tmpID = $_COOKIE['id'];
        $_SESSION['id'] = $tmpID;
        
        $loginCheckD = "SELECT * FROM user WHERE UserId='$tmpID'";

        $resultD = $conn->query($loginCheckD);

        if ($resultD->num_rows > 0) {
            while ($rowsD = $resultD->fetch_assoc()) {
                $_SESSION['name'] = $rowsD['UserFname'] . " " . $rowsD['UserLname'];
                $_SESSION['img'] = $rowsD['img'];
            }
        }
    }
    $inSession = TRUE;
}

if ($inSession) {
    $s_id = mysqli_real_escape_string($conn, $_SESSION['id']);
    $s_name = mysqli_real_escape_string($conn, $_SESSION['name']);
    $s_img = mysqli_real_escape_string($conn, $_SESSION['img']);
}