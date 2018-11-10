<?php

include './dbConnect.php';
$_q1 = mysqli_real_escape_string($conn, $_GET['q1']);
$_q2 = mysqli_real_escape_string($conn, $_GET['q2']);

$seletSql = "SELECT DISTINCT area FROM " . $_q1. " WHERE district = '" . $_q2. "'";

//echo $_q1 . "<br />";
//echo $seletSql . "<br />";

$result = $conn->query($seletSql);

echo "<option value='' disabled selected>Select Area</option>";
echo "<option value='null'>Any Area</option>";
if ($result->num_rows > 0) {
    while ($rows = $result->fetch_assoc()) {
        if($rows['area'] != '')
        echo "<option value='" . strtolower($rows['area']) . "' >" . $rows['area'] . "</option>";
    }
}

mysqli_close($conn);
