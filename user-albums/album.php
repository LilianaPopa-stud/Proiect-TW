<?php
require_once 'actions/fetchAlbumPhotos.php';
    $url = $_SERVER['REQUEST_URI'];         
    $url_components = parse_url($url);

    parse_str($url_components['query'], $params);
    $_SESSION['album'] = $params['name'];
    //if(isset($_SESSION['albumPhotos']))
        
    /*if($params['action'] == "addToAlbum")
    {
        $_SESSION['albumToAdd'] = $params['param'];
        require_once('actions/addToAlbum.php');
    }*/
?>

<!DOCTYPE html5>
<html lang="en">
    <head>
        <title><?php echo $_SESSION['album'] ?></title>
        <meta charset="UTF-8" />
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <link rel="stylesheet" href="../styles/mediaStyle.css">
        <link rel="stylesheet" href="styles/album.css">
        <link rel="stylesheet" href="../styles/style.css">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
        <link href="http://fonts.cdnfonts.com/css/cooper-black" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <nav class="navbar">
            <div class="logo">BPIC</div>
            <div class="menu">
                    <a href="../registration/index.php"><i class="fa fa-home" > Home </i></a>
                    <a href="albums.php"><i class="fa fa-folder"> Albums </i> </a>
                    <a href="../account/user.php"><i class="fa fa-user"> User </i></a>
            </div>
        </nav>
        <div class="wrapper">
            <div class="album-title">
                <p><?php echo  $_SESSION['album']; ?></p>
            </div>
            <div class="photo-gallery">
                <!--<div class="card new-photo">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z"/></svg>
                    Add photo
                </div>-->
                <?php 
                $x = get_albumPhotos();
                foreach($x as $photo)
                {
                    $cardType = "";
                    $imgsize_arr = getimagesize('../images/'.$photo->get_filename());
                    $img_width = $imgsize_arr[0];
                    $img_height = $imgsize_arr[1];
                    if($img_width > 5000)
                        $cardType = "card-wide";
                    else if($img_height > 3500)
                    {
                        $cardType = "card-tall";
                    }
                    //echo "Image width: ".$img_width."<br/>Image height:".$img_height;
                    echo '<div class="card '.$cardType.'" >';
                    echo '<a href = "../account/photo.php?name='.$photo->get_filename().'&action=none&param=none">
                            <img src="../images/'.$photo->get_filename().'" alt="'.$photo->get_filename().'"></a>';
                    echo '</div>';
                }?>
            </div>
        </div>
    </body>

</html>