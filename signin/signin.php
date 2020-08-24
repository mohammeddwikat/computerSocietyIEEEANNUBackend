<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "projectswe";

$signInStatus = new stdClass(); // init json response

$startConn = mysqli_connect($servername, $username, $password, $dbname); //start connection to database
if (!$startConn) {
    $signInStatus-> startConn = 'fail';
} else {
    $signInStatus-> startConn = 'success';
}


    if(empty($_POST['EMAIL']) || empty($_POST['PASSWORD'])) {
        $signInStatus-> EmptyField = 'Yes';
    } else {
        $signInStatus-> EmptyField = 'No';
        $pass = $_POST['PASSWORD'];
        $query = "SELECT * FROM rented WHERE email ='".$_POST['EMAIL']."' AND pass = SHA1('$pass')";
        $result = $startConn->query($query);
        if($row = $result-> fetch_assoc()) {
                $signInStatus-> ID = $row['IDrented'];
                $signInStatus-> TYPE = $row['TYPE'];
        } else {
            $query = "SELECT * FROM users WHERE email ='".$_POST['EMAIL']."' AND pass = SHA1('$pass')";
            $result = $startConn->query($query);
            if($row = $result-> fetch_assoc()) {
                $signInStatus-> ID = $row['IDuser'];
                $signInStatus-> TYPE = $row['TYPE'];
            } else {
                $signInStatus-> error = 'incorrect pass';
            }
        }

    }

echo json_encode($signInStatus);

mysqli_close($startConn);

