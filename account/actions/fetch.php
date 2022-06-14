<?php
include_once('ImageInfo.php');
session_start();

$username = "";
$errors = array();

$userPhotos = array(); //for user's photos

$db = mysqli_connect('localhost', 'root', '', 'proiect_tw');

//getting user photos
if(count($errors) == 0){
    $query = "SELECT * FROM images
                WHERE username='" . mysqli_real_escape_string($db, $_SESSION['username']) . "' order by created DESC";
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result) > 0){
        while($file = mysqli_fetch_assoc($result)){
            $photo = new ImageInfo($file['filename']);
            $photo->set_id($file['id']);
            $photo->set_created($file['created']);
            $photo->set_visibility($file['visibility']);
            $photo->set_tags($file['tags']);
            array_push($userPhotos, $photo);
        }
    }
    $_SESSION['photos'] = $userPhotos;
}

?>