<?php
$hostname = "localhost";
$username = "community";
$password = "community";
$database = "community";

$conn = mysqli_connect($hostname,$username,$password,$database)
        or die ("Unable to connect");



function queryMysql($query){
    global $conn;
    $result = $conn->query($query);
    if (!$result) die ('Fatal error');
    return $result;
}


function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


 function formatDate($date){
	return date('j F',strtotime($date));
 }


?>
