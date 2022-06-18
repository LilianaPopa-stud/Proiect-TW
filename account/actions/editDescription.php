<?php
//session_start();
include_once 'fetch.php';
$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'proiect_tw');

if(isset($_POST['edit_bio'])){

    if(count($errors) == 0){

        $text = mysqli_real_escape_string($db, $_POST['description']);

        $username = $_SESSION['username'];
        $query = "UPDATE users SET description='$text' where username='$username'";
        mysqli_query($db, $query);
        
    }
    header('location: user.php');
}