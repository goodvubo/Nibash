<?php

include './header.php';
echo 'yo';
$errorMsg = FALSE;

if (isset($_POST['update'])) {

    $pId = mysqli_real_escape_string($conn, $_POST['hdnId']);
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
        $newProp = "UPDATE  `apartment` SET `property_condition`='$offerType', `price`='$price', `available_from`='$available_from', `district`='$district', `area`='$area', `fullAddress`='$fullAddress', `location`='$location', `beds`='$beds', `baths`='$baths', `rooms`='$ttlrooms',`size`='$ttlarea', `floor`='$floor', `details`='$propDetails',`img`='$uploadFile' WHERE id =".$pId;
    }
    elseif ($category=='house') {
        $newProp = "UPDATE `house` SET `property_condition`='$offerType', `price`='$price', `available_from`='$available_from', `district`='$district', `area`='$area', `fullAddress`='$fullAddress', `location`='$location', `beds`='$beds', `baths`='$baths', `rooms`='$ttlrooms',`size`='$ttlarea', `floor`='$floor', `details`='$propDetails',`img`='$uploadFile' WHERE id =".$pId;

    }elseif ($category=='office') {
        $newProp = "UPDATE `office` SET `property_condition`='$offerType', `price`='$price', `available_from`='$available_from', `district`='$district', `area`='$area', `fullAddress`='$fullAddress', `location`='$location', `beds`='$beds', `baths`='$baths', `rooms`='$ttlrooms',`size`='$ttlarea', `floor`='$floor', `details`='$propDetails',`img`='$uploadFile' WHERE id =".$pId;

    }elseif ($category=='shop') {
         $newProp = "UPDATE `shop` SET `property_condition`='$offerType', `price`='$price', `available_from`='$available_from', `district`='$district', `area`='$area', `fullAddress`='$fullAddress', `location`='$location', `beds`='$beds', `baths`='$baths', `rooms`='$ttlrooms',`size`='$ttlarea', `floor`='$floor', `details`='$propDetails',`img`='$uploadFile' WHERE id =".$pId;
                  
    }

    if($conn->query($newProp)==FALSE)
    {
        $errorMsg = TRUE;
        die($conn->error);
    }
    header("Location:propDetails.php?q1=".$category."&q2=".$pId);
}

