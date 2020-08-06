<?php
include 'conn.php'; 

$id=$_GET['id'];
$q="DELETE FROM `alumni2` WHERE id = $id ";

mysqli_query($conn,$q);

header('location:admindisplay.php');

?>