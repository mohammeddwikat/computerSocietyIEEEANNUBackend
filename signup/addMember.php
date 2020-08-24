<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ieeecs";

$signUpStatus = new stdClass(); // init json response
$signUpStatus-> arr = "yes";
$startConn = mysqli_connect($servername, $username, $password, $dbname); //start connection to database
if (!$startConn) {
    $signUpStatus-> startConn = 'fail';
} else {
    $signUpStatus-> startConn = 'success';
}

if (isset($_POST['Firstname']) && isset($_POST['Lastname']) && isset($_POST['Email']) && isset($_POST['Password']) && isset($_POST['ID']) ) {
    $fisrtName = $_POST['Firstname'];
    $lastName = $_POST['Lastname'];
    $email = $_POST['Email'];
    $password = sha1($_POST['Password']);
    $id = $_POST['ID'];
    $date = date("Y-m-d");
    $sql = "INSERT INTO members (ID, fname, lname, email, pass, pic, joinDate, rate, noAttends, noVolunteering) VALUES ('$id', '$fisrtName', '$lastName','$email','$password',' ','$date','0','0','0')";
    $signUpStatus-> conn = 'asd';
    if (mysqli_query($startConn, $sql)) {
        $signUpStatus-> error = 'no';
    } else {
        $signUpStatus-> error = mysqli_error($startConn);
    }
    echo json_encode($signUpStatus);

   // mysqli_close($startConn);
}


?>




