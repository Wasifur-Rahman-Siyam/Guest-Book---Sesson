<?php
session_start();
include_once ($_SERVER[ 'DOCUMENT_ROOT']."/Pondit_Practice/OOP/guest-book/config.php");

use App\Utility\Sanitizer;
use App\Utility\Validator;
use App\Utility\Utility;

$guest_position=$_GET['guest_position'];
$guests = [];
if(array_key_exists('guest_book_data', $_SERVER)){
  $guests = unserialize($_SESSION['guest_book_data']);
}

if(Utility::is_posted()){
    $sanitizeData = Sanitizer::sanitize($_POST);
    $validateData = Validator::validate($sanitizeData);

  if($validateData){
    $guests [$guest_position] = $validateData;
    //$result= setcookie('guest_book_data', serialize($guests) ,time()+(3600),"/");
    $_SESSION['guest_book_data'] = serialize($guests);
  }
  else{
    header('guest_book_from.php');
  }
  // if($result){
  //   echo "Data has been update successfully <a href='guest_book_index.php'> Go to index</a>";
  // }
  // else{
  //   echo "Data has not stored";
  // }
  header("location:guest_book_index.php");
}

?>