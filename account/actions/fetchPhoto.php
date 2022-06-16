<?php

include('ImageInfo.php');
include_once('CommentsInfo.php');

function initPhoto($fileName)
{
    $db = mysqli_connect('localhost', 'root', '', 'proiect_tw');
    $image = new ImageInfo($fileName);

    $query = "SELECT * FROM images
                    WHERE filename='".$fileName."'";
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result) == 1){
        $file = mysqli_fetch_assoc($result);
        $image->set_id($file['id']);
        $image->set_username($file['username']);
        $image->set_created($file['created']);
        $image->set_visibility($file['visibility']);
        $image->set_tags($file['tags']);
        $image->set_edits($file['edits']);
    }
    return $image;
}

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
        $image->set_edits($file['edits']);
    }
    return $image;
}

function getPhotoComments($filename)
{
    $db = mysqli_connect('localhost', 'root', '', 'proiect_tw');
    $comments = array();
    $query = "SELECT * FROM comments
                    WHERE filename='".$filename."'";

    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result) > 0){
        while($file = mysqli_fetch_assoc($result)){
            $comment = new CommentsInfo($filename);
            $comment->set_from($file['from']);
            $comment->set_to($file['to']);
            $comment->set_status($file['status']);
            $comment->set_text($file['text']);
            array_push($comments, $comment);
        }
    }
    return $comments;
    
}

function updateTag($fileName, $username)
{
    $db = mysqli_connect('localhost', 'root', '', 'proiect_tw');
    $current = $_SESSION['crtVisibility'];

    $update = "";
    if($current == "private")
        $update = "public";
    else $update = "private";

    $query = "UPDATE images SET visibility='$update' where filename='$fileName' and username='$username'";
    mysqli_query($db, $query);
    header('location: photo.php?name='.$_SESSION['filename'].'&action=none&param=none');

}

function deletePhoto($fileName, $username)
{
    $db = mysqli_connect('localhost', 'root', '', 'proiect_tw');
    $query = "DELETE FROM images where filename='$fileName' and username='$username'";
    mysqli_query($db, $query);
    unlink('../images/user-photos1/'.$fileName);
    header('location: user.php');

}

function acceptComm($filename)
{
    $db = mysqli_connect('localhost', 'root', '', 'proiect_tw');
    $query = "UPDATE comments SET status='accepted' where filename='$filename'";
    mysqli_query($db, $query);
    header('location: photo.php?name='.$_SESSION['filename'].'&action=none&param=none');

}

function rejectComm($filename)
{
    $db = mysqli_connect('localhost', 'root', '', 'proiect_tw');
    $query = "DELETE FROM comments where filename='$filename'";
    mysqli_query($db, $query);
    header('location: photo.php?name='.$_SESSION['filename'].'&action=none&param=none');

}
