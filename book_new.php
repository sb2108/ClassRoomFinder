<?php

//avoid error notices, display only warnings:
error_reporting(0);

//check if user submitted form:
 if($_SERVER['REQUEST_METHOD'] == 'POST'){

 
	//connect to database:
	include('connect.php');

	echo 'welcome';
 	$day  = $_GET['day'];
    $time = $_GET['time'];
    $room_no = $_GET['room_no'];

	$r = mysqli_query($dbc, "UPDATE ".$day." SET `".$time."`='booked' WHERE room_no=".$room_no);
	$p = mysqli_query($dbc, $r);
	echo "Thanks! You have successuly booked the room no".$room_no."on ".$day;
	//echo $row['f_name'];
	//UPDATE `monday` SET `five`="book3" WHERE `room_no`=19
	
	

mysqli_close($dbc);}


?>