<?php

include './header.php';
echo 'yo';
$errorMsg = FALSE;
if (isset($_POST['add'])) {

    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $offerType = mysqli_real_escape_string($conn, $_POST['offerType']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $available_from = mysqli_real_escape_string($conn, $_POST['available_from']);

    //$country = mysqli_real_escape_string($conn, $_POST['country']);
    $district = mysqli_real_escape_string($conn, $_POST['district']);
    $area = mysqli_real_escape_string($conn, $_POST['area']);
    $fullAddress = mysqli_real_escape_string($conn, $_POST['fullAddress']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);

    $beds = mysqli_real_escape_string($conn, $_POST['beds']);
    $baths = mysqli_real_escape_string($conn, $_POST['baths']);
    $ttlrooms = mysqli_real_escape_string($conn, $_POST['ttlrooms']);
    $ttlarea = mysqli_real_escape_string($conn, $_POST['ttlarea']);
    $floor = mysqli_real_escape_string($conn, $_POST['floor']);
    $propDetails = mysqli_real_escape_string($conn, $_POST['propDetails']);
    $uploadFile = mysqli_real_escape_string($conn, $_POST['mediaZ']);
    $postDate = mysqli_real_escape_string($conn, date("Y-m-d") );

    if($category=='apartment')
    {
        $newProp = "INSERT INTO `apartment`(`owner_id`, `property_condition`, `price`, `available_from`, `district`, `area`, `fullAddress`, `location`, `beds`, `baths`, `rooms`,`size`, `floor`, `details`,`img`,`postDate`) VALUES('$s_id','$offerType','$price','$available_from','$district','$area','$fullAddress','$location','$beds','$baths','$ttlrooms','$ttlarea','$floor','$propDetails','$uploadFile','$postDate')";

    }
    elseif ($category=='house') {
        $newProp = "INSERT INTO `house`(`owner_id`, `property_condition`, `price`, `available_from`, `district`, `area`, `fullAddress`, `location`, `beds`, `baths`, `rooms`,`size`, `floor`, `details`,`img`,`postDate`) VALUES ('$s_id','$offerType','$price','$available_from','$district','$area','$fullAddress','$location','$beds','$baths','$ttlrooms','$ttlarea','$floor','$propDetails','$uploadFile','$postDate');";

    }elseif ($category=='office') {
        $newProp = "INSERT INTO `office`(`owner_id`, `property_condition`, `price`, `available_from`, `district`, `area`, `fullAddress`, `location`, `baths`, `rooms`, `size`, `floor`, `details`,`img`,`postDate`) VALUES ('$s_id','$offerType','$price','$available_from','$district','$area','$fullAddress','$location','$baths','$ttlrooms','$ttlarea','$floor','$propDetails','$uploadFile','$postDate')";

    }elseif ($category=='shop') {
         $newProp = "INSERT INTO `shop`(`owner_id`, `property_condition`, `price`, `available_from`, `district`, `area`, `fullAddress`, `location`, `size`, `floor`, `details`, `postDate`, `img`) VALUES ('$s_id','$offerType','$price','$available_from','$district','$area','$fullAddress','$location','$ttlarea','$floor','$propDetails','$postDate','$uploadFile')";

    }

    if($conn->query($newProp)==FALSE)
    {
        $errorMsg = TRUE;
        die($conn->error);
    }
    header("Location:index.php");
}

