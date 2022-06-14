<?php


$db = mysqli_connect('localhost', 'root', '', 'proiect_tw');

$fileName = $_SESSION['filename'];

$query = "SELECT albums FROM images where filename='$fileName'";

$results = mysqli_query($db, $query);
$albums = mysqli_fetch_assoc($results);
$update = $albums['albums'];

if($update == "none")
{
    $update = $_SESSION['albumToAdd'];
    $query = "UPDATE images SET albums='$update' where filename='$fileName'";
    mysqli_query($db, $query);
}
else{
    $found = false;
    $inAlbums = explode(',',$update);
    foreach($inAlbums as $album)
    {
        if($album == $_SESSION['albumToAdd']){
            echo 'photo already in album';
            $found = true;
        }
    }
    if(!$found){
        $update .= ','.$_SESSION['albumToAdd'];
        $query = "UPDATE images SET albums='$update' where filename='$fileName'";
        mysqli_query($db, $query);
    }

}
header('location: photo.php?name='.$_SESSION['filename'].'&action=none&param=none');
print_r($update);
