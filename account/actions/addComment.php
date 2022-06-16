<?php
session_start();
include 'fetchPhoto.php';

$photo = initPhoto($_SESSION['filename']);
$to = $photo->get_username();
$filename = $photo->get_filename();
$status = "unaccepted";
$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'proiect_tw');
$from = mysqli_real_escape_string($db, $_SESSION['username']);

if(isset($_POST['add_comm'])){

    $text = mysqli_real_escape_string($db, $_POST['comm']);

    if($_SESSION['username'] == $to)
        $status = "accepted";

    if(empty($text)){
        array_push($errors, "Text is required");
    }

    if(count($errors) == 0){
        try{
        $query = "INSERT INTO 
        comments(`filename`, `from`, `to`, `status`, `text`) 
        VALUES (
            '$filename', 
            '$from', 
            '$to', 
            '$status', 
            '$text'
            );";
        mysqli_query($db, $query);
        header('location: ../photo.php?name='.$_SESSION['filename'].'&action=none&param=none');
        }catch (mysqli_sql_exception $e) { 
            print_r($e);
            exit; 
         } 
    }
}