﻿<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Credentials: true");
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token , Authorization');
include 'DBConfig.php';
 
$con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

$json = file_get_contents('php://input');

$obj = json_decode($json,true);
 
$S_ID = $obj['student_id'];
 
$Sql_Query = "DELETE FROM StudentDetailsTable WHERE student_id = '$S_ID'" ;

if(mysqli_query($con,$Sql_Query)){
 
$MSG = 'Estudiante eliminado correctamente...' ;
 
$json = json_encode($MSG);
 
 echo $json ;
 
 }
 else{
 
 echo 'Inténtelo de nuevo';
 
 }
 mysqli_close($con);
?>