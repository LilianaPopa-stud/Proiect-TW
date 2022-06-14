<?php

include_once '../user-albums/addAlbum.php';

$errors = array();

$db = mysqli_connect('localhost', 'root', '', 'proiect_tw');

$image = init($_SESSION['filename'], $_SESSION['username']);

if(isset($_POST['add_tag'])){

    $tag_name = mysqli_real_escape_string($db, $_POST['tag_name']);

    if(empty($tag_name)){
        array_push($errors, "Tag name is required");
    }

    $tagList = $image->get_splitTags();

    if($tagList !== "")
    {
        $found = false;
        foreach($tagList as $tag)
        {
            if($tag_name == $tag)
                $found = true;
        }

        if($found)
            array_push($errors, "Tag already exists");
    }

    if(count($errors) == 0){
        $update = $image->get_tags();
        if($update == "none")
            $update = $tag_name;
        else{
            $update .= ','.$tag_name;
        }
        $filename = $image->get_filename();
        $query = "UPDATE images SET tags='$update' where filename='$filename'";
        mysqli_query($db, $query);
        header('location: photo.php?name='.$_SESSION['filename'].'&action=none&param=none');
    }
}