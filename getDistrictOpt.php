<?php

include './dbConnect.php';
$_q1 = mysqli_real_escape_string($conn, $_GET['q1']);

$seletSql = "SELECT DISTINCT district FROM " . $_q1;

//echo $_q1 . "<br />";
//echo $seletSql . "<br />";

$result = $conn->query($seletSql);

echo "<option value='' disabled selected>Select District</option>";
echo "<option value='null'>Any District</option>";
if ($result->num_rows > 0) {
    while ($rows = $result->fetch_assoc()) {
        if($rows['district'] != '')
        echo "<option value='" . strtolower($rows['district']) . "' >" . $rows['district'] . "</option>";
    }
}

mysqli_close($conn);
