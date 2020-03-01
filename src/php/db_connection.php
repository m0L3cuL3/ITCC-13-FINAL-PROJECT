<?php

$server = '';
$db_user = '';
$db_pass = '';


// create connection
$conn = new mysqli($server, $db_user, $db_pass);

// check connection
if($conn -> connect_error){
    echo 'connection failed!';
} else {
    echo 'connected successfully';
}


?>