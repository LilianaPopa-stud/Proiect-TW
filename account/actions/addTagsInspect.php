<?php
$url = $_SERVER['REQUEST_URI'];         
$url_components = parse_url($url);
$errors = array();
$tag_name="";
$filename="";
$tags_l = "";

if(array_key_exists('query', $url_components)){
        parse_str($url_components['query'], $params);
        if(array_key_exists('delete', $params))
        {
            $tag_name  = $params['tag'];
            $filename = $params['file'];
            $db = mysqli_connect('localhost', 'root', '', 'proiect_tw');
            $query = "DELETE FROM tags where filename='$filename' AND tag='$tag_name'";
            mysqli_query($db, $query);
            header('location: inspect.php?name='.$filename);

        }
        else if(array_key_exists('tag', $params)){
            $tag_name  = $params['tag'];
            $filename = $params['file'];
            $db = mysqli_connect('localhost', 'root', '', 'proiect_tw');
            $query = "SELECT tags FROM images where filename='$filename'";
            $result = mysqli_query($db, $query);
            if(mysqli_num_rows($result) > 0){
                while($file = mysqli_fetch_assoc($result)){
                    $tags_l = $file['tags'];
                    $tags = explode(",", $file['tags']);
                }
            }

            if(empty($tag_name)){
                array_push($errors, "Tag name is required");
            }
        
            $tagList = $tags;
        
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
                $update = $tags_l;
                if($update == "none")
                    $update = $tag_name;
                else{
                    $update .= ','.$tag_name;
                }
                $query = "UPDATE images SET tags='$update' where filename='$filename'";
                mysqli_query($db, $query);
                header('location: ../photo.php?name='.$filename.'&action=none&param=none');
            }
        }
        
}
header('location: ../inspect.php?name='.$filename);
?>