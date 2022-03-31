<?php
session_start();
include_once ($_SERVER[ 'DOCUMENT_ROOT']."/Pondit_Practice/OOP/guest-book/config.php");

use App\Utility\Sanitizer;
use App\Utility\Validator;
use App\Utility\Utility;


$guests = [];
if(array_key_exists('guest_book_data', $_SESSION)){
  $guests = unserialize($_SESSION['guest_book_data']);
}


if(Utility::is_posted()){
    $sanitizeData = Sanitizer::sanitize($_POST);
    $validateData = Validator::validate($sanitizeData);

  if($validateData){
    $guests [] = $validateData;
    $_SESSION['guest_book_data'] = serialize($guests);
  }
  else{
    header('guest_book_from.php');
  }

  header("location:guest_book_index.php");
}

?>