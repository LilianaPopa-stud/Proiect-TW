<?php
session_start();

$username = "";
$errors = array();

$userPhotos = array(); //for user's albums

$db = mysqli_connect('localhost', 'root', '', 'proiect_tw');

//getting user photos
if(count($errors) == 0){
    $query = "SELECT filename FROM images
                WHERE username='" . mysqli_real_escape_string($db, $_SESSION['username']) . "'";
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result) > 0){
        while($file = mysqli_fetch_assoc($result)){
            array_push($userPhotos, $file['filename']);
        }
    }
    $_SESSION['photos'] = $userPhotos;  
}

?>