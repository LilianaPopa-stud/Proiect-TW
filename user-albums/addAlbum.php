<?php
session_start();

$username = "";
$album_name = "";
$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'proiect_tw');

if(isset($_POST['add_album'])){

    $album_name = mysqli_real_escape_string($db, $_POST['album_name']);

    if(empty($album_name)){
        array_push($errors, "Album name is required");
    }

    if(count($errors) == 0){
        $query = "INSERT INTO albums (username, album_name)
                    VALUES ('" . mysqli_real_escape_string($db, $_SESSION['username']) . "', '$album_name')";
        mysqli_query($db, $query);
        header('location: albums.php');
    }
}