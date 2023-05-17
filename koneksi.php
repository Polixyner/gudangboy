<?php 

$host='localhost';
$username='root';
$password='';
$namaDB='dbgudang';
$mysqli = new mysqli($host,$username,$password,$namaDB);
if ($mysqli -> connect_errno) {
    echo('Failed to connect mysqli'.$mysqli->connect_error);
    exit();
}

?>