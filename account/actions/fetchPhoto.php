<?php

include('ImageInfo.php');

function init($fileName, $username)
{
    $db = mysqli_connect('localhost', 'root', '', 'proiect_tw');
    $image = new ImageInfo($fileName);

    $query = "SELECT * FROM images
                    WHERE username='" . $username . "' and filename='".$fileName."'";
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result) == 1){
        $file = mysqli_fetch_assoc($result);
        $image->set_id($file['id']);
        $image->set_created($file['created']);
        $image->set_visibility($file['visibility']);
        $image->set_tags($file['tags']);
    }
    return $image;
}