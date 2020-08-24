<?php

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ieeecs";

$emailStatus = new stdClass();
$emailStatus-> valid = 'Yes';

$startConn = mysqli_connect($servername, $username, $password, $dbname); 
if (!$startConn) {
    $emailStatus-> startConn = 'fail';
} else {
    $emailStatus-> startConn = 'success';
}

$validEmail = $_POST['validEmail'];
$sql = "SELECT ID FROM members WHERE email = '$validEmail'";

$result = $startConn->query($sql);

if ($result->num_rows > 0) {
    $emailStatus-> valid = 'No';
} else{
    $emailStatus-> valid = 'Yes';
}
echo json_encode($emailStatus);
mysqli_close($startConn);

?>
