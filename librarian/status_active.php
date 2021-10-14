<?php
require_once '../dbcon.php';

$id=base64_decode($_GET['id']);
$query="UPDATE `students` SET `status`='1' WHERE `id`='$id'";
$result=mysqli_query($conn,$query);
header("location:students.php");

?>