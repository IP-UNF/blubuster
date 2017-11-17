<?php
	$radio = $_GET['MovieID'];
	require 'db.class.php';

// sql to delete a record
$sql ="DELETE FROM movie where MovieID = " . $radio;
$conn=DB::get()->exec($sql);
$conn = null;
header('Location: index.php');
?>
