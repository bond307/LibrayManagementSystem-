<?php
// $servername='localhost';
// $username='root';
// $password='';
// $dbname = "lms";
//  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//   /* set the PDO error mode to exception */
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $conn=mysqli_connect("localhost","root","","lms");


mysqli_query($conn,'SET CHARACTER SET utf8');
mysqli_query($conn,"SET SESSION collation_connection ='utf8_general_ci'");

  
?>