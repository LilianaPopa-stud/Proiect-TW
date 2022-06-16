<?php
$filename = $_POST['filename'];
$edit = $_POST['edit'];

$errors = array();
$db = mysqli_connect('localhost', 'root', '', 'proiect_tw');

if(count($errors) == 0){
    $query = "UPDATE images SET edits='$edit' where filename='$filename'";
    mysqli_query($db, $query);
    echo "Edit uploaded!";
    
}


    
?>