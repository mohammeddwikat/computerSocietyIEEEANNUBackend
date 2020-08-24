<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectswe";

$getInformationResponse = new stdClass(); // init json response

$startConn = mysqli_connect($servername, $username, $password, $dbname); //start connection to database
if (!$startConn) {
    $getInformationResponse-> startConn = 'fail';
} else {
    $getInformationResponse-> startConn = 'success';
}

if (isset($_POST['id'])) {
    $query = "SELECT * FROM rented WHERE IDrented ='".$_POST['id']."'";
    $result = $startConn->query($query);
    if($row = $result-> fetch_assoc()) {
        $getInformationResponse-> FirstName = $row['Fname'];
        $getInformationResponse-> LastName = $row['Lname'];
        $getInformationResponse-> Email = $row['email'];
        $getInformationResponse-> Company = $row['Fname'];
        $getInformationResponse-> City = $row['state'];
        $getInformationResponse-> SSN = $row['SSN'];
        $getInformationResponse-> Type = 'Rented'; 
    } else {
        # Please Enter Correct User Name and password
    }
}

echo json_encode($getInformationResponse);

mysqli_close($startConn);
