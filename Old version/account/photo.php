<?php
    include_once '../user-albums/addAlbum.php';
    $url = $_SERVER['REQUEST_URI'];         
    $url_components = parse_url($url);

    parse_str($url_components['query'], $params);
    $_SESSION['filename'] = $params['name'];
    if($params['action'] == "addToAlbum")
    {
        $_SESSION['albumToAdd'] = $params['param'];
        require_once('actions/addToAlbum.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $_SESSION['filename']; ?></title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../styles/style.css" />
        <link rel="stylesheet" href="../styles/styleUser.css" />
        <link rel="stylesheet" href="../styles/comment.css" />
        <link rel="stylesheet" href="../styles/photoUtilities.css" />
        <link rel="stylesheet" href="../styles/mediaStyle.css" />
        <link rel="stylesheet" href="../user-albums/styles/albums.css" />
        <link href="http://fonts.cdnfonts.com/css/cooper-black" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    </head>
    <body>
        <?php
            echo '<img src="../images/'.$_SESSION['filename'].'" id="photo" class="photo" alt="post">';
        ?>
        <div class="photoActions">
            <button>Edit</button>
            <button type="button" onclick="openForm()">Add to folder</button>
            <button>Delete</button>
            <button>Tag</button>
        </div>

        <div class="form-popup" id="pickAlbum">
            <!--<form method="post" action="albums.php" class="form-container">-->
                <h1>Pick album</h1>
                <div class="album-gallery">
                    <?php
                if(isset($_SESSION['albums'])){
                    foreach($_SESSION['albums'] as $albumName){
                        echo
                        '
                        <a href="photo.php?name='.$_SESSION['filename'].'&action=addToAlbum&param='.$albumName.'"><button type="button" class="album">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path d="M528 32H144c-26.51 0-48 21.49-48 48v256c0 26.51 21.49 48 48 48H528c26.51 0 48-21.49 48-48v-256C576 53.49 554.5 32 528 32zM223.1 96c17.68 0 32 14.33 32 32S241.7 160 223.1 160c-17.67 0-32-14.33-32-32S206.3 96 223.1 96zM494.1 311.6C491.3 316.8 485.9 320 480 320H192c-6.023 0-11.53-3.379-14.26-8.75c-2.73-5.367-2.215-11.81 1.332-16.68l70-96C252.1 194.4 256.9 192 262 192c5.111 0 9.916 2.441 12.93 6.574l22.35 30.66l62.74-94.11C362.1 130.7 367.1 128 373.3 128c5.348 0 10.34 2.672 13.31 7.125l106.7 160C496.6 300 496.9 306.3 494.1 311.6zM456 432H120c-39.7 0-72-32.3-72-72v-240C48 106.8 37.25 96 24 96S0 106.8 0 120v240C0 426.2 53.83 480 120 480h336c13.25 0 24-10.75 24-24S469.3 432 456 432z"/></svg>
                        <div class="name">', $albumName, '</div>
                        </button></a>'
                        ;

                    }
                }?>
    
                </div>
                <button type="button" class="btn" onclick="closeForm()">Close</button>
            </form>
        </div>

        <script src="scripts/pickAlbum.js"></script>
    </body>
</html>
