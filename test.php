<?php

header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
$signInStatus = new stdClass(); // init json response

$signInStatus-> EmptyField = 'Hi IEEE Family';
echo json_encode($signInStatus);

?>
