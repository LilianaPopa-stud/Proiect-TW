<?php
session_start();
$errors = array();
$db = mysqli_connect('localhost', 'root', '', 'proiect_tw');


$status = '';

if(isset($_POST["submit"])){
    $status = 'error';
    if(!empty($_FILES["image"]["name"])){
        $fileName = $_FILES["image"]["name"];
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        $allowTypes = array('jpg','png','jpeg','gif');
        if(in_array($fileType, $allowTypes)){
            $tempname = $_FILES["image"]["tmp_name"];
            $folder = "../images/".$fileName;

            $query = "INSERT INTO images(username, filename, created)
            VALUES ('" . mysqli_real_escape_string($db, $_SESSION['username']) . "',
            '$fileName', NOW())";
            mysqli_query($db, $query);

            if(move_uploaded_file($tempname, $folder)){
                $status = 'success';
            }
            else{
                array_push($errors, "Image upload failed");
            }

        }
        else{
            array_push($errors, "Only jpg, jpeg, png or gif");
        }
        
    }
    else{
        array_push($errors, "No image selected");
    }
    header('location: user.php');
}

echo $status;

?>