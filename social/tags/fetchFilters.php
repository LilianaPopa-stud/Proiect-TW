<?php
include_once('../../account/ImageInfo.php');
session_start();
function get_tagPhotos($filters){
$username = "";
$errors = array();
$publicp = array();
$tagPhotos = array();

$db = mysqli_connect('localhost', 'root', '', 'proiect_tw');

if(count($errors) == 0){
    $query = "SELECT * FROM images
                WHERE visibility='public' order by created DESC";
    $result = mysqli_query($db, $query);
    if(mysqli_num_rows($result) > 0){
        while($file = mysqli_fetch_assoc($result)){
            $photo = new ImageInfo($file['filename']);
            $photo->set_created($file['created']);
            $photo->set_tags($file['tags']);
            $photo->set_edits($file['edits']);
            array_push($publicp, $photo);
        }
    }

    
    foreach($publicp as $photo)
    {
        $str = $photo->get_splitTags();
        $foundAll = true;
        foreach($filters as $flt)
        {
            $found = false;
            foreach($str as $ptag){
                if($ptag == $flt){
                    $found = true;
                }
            }
            if(!$found)
                $foundAll = false;
        }
        if($foundAll)
            array_push($tagPhotos, $photo);

    }
}
return $tagPhotos;
}


?>
