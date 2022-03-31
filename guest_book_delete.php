<?php
session_start();
$guest_position=$_GET['guest_position'];
$guests = unserialize($_SESSION['guest_book_data']);


unset($guests[$guest_position]);

$_SESSION['guest_book_data'] = serialize($guests);


header("location:guest_book_index.php");
?>