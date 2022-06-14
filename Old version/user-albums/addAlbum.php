<?php
session_start();

$username = "";
$album_name = "";
$errors = array();

$userAlbums = array(); //for user's albums

$db = mysqli_connect('localhost', 'root', '', 'proiect_tw');

//getting user albums
if(count($errors) == 0){
    $query = "SELECT album_name FROM albums
                WHERE username='" . mysqli_real_escape_string($db, $_SESSION['username']) . "'";
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result) > 0){
        while($album = mysqli_fetch_assoc($result)){
            array_push($userAlbums, $album['album_name']);
        }
    }
    $_SESSION['albums'] = $userAlbums;  
}

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