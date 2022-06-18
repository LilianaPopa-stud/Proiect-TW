<?php
    include_once ('actions/fetchPhoto.php');
    include_once ('actions/addTags.php');
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
    if($params['action'] == "updateVisibility")
    {
        $_SESSION['crtVisibility'] = $params['param'];
        updateTag($_SESSION['filename'], $_SESSION['username']);//in fetchPhoto.php
    }
    if($params['action'] == "delete")
    {
        deletePhoto($_SESSION['filename'], $_SESSION['username']);
    }
    if($params['action'] == "comment")
    {
        if($params['param'] == "accept")
            acceptComm($_SESSION['filename']);
        else if($params['param'] == "reject")
        {
            rejectComm($_SESSION['filename']);
        }   
    }
?>
<!DOCTYPE html>
<html lang="en">
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
        <link rel="stylesheet" href="styles/photoPage.css" />
        <link rel="stylesheet" href="../user-albums/styles/albums.css" />
        <link href="http://fonts.cdnfonts.com/css/cooper-black" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    </head>
    <body>
        <nav class="navbar">
            <div class="logo">BPIC</div>
            <div class="menu">
                <a href="../index.php"><i class="fa fa-home"> Home </i></a>
                <a href="../user-albums/albums.php"><i class="fa fa-folder"> Albums </i> </a>
                <a href="user.php" class="active"><i class="fa fa-user"> User </i></a>
            </div>
        </nav>

        <div class="photoPageWrapper">

            <div class="imageSide">
                <?php
                    $photo = initPhoto($_SESSION['filename']);
                    $_SESSION['photo'] = $photo; 
                    $edits = $photo->get_edits(); 
                    if($edits == "unedited")
                        $edits = "";
                    echo '<img src="../images/user-photos1/'.$_SESSION['filename'].'" id="photo" class="photo" alt="post"
                     style="filter:'.$edits.'">';
                ?>
            </div>

            <div class="actionSide">
                <?php if($_SESSION['username'] == $photo->get_username()){
                echo '<div class="photoActions">';
                    echo' <button><a href="photo edit/editPage.php?photo='.$_SESSION['filename'].'" >Edit</a></button>
                    <button type="button" onclick="openForm()">Add to folder</button>
                    <button><a href="photo.php?name='.$_SESSION['filename'].'&action=delete&param=">
                                Delete
                            </a>
                    </button>
                    <button type="button" onclick="openAddTags()">Add tags</button>
                    <button>Tag someone</button>
                    <button>
                        <a href="photo.php?name='.$_SESSION['filename'].'&action=updateVisibility&param='.$photo->get_visibility().'">
                            Make '; 
                            if($photo->get_visibility() == "private")
                                echo "public";
                            else echo "private"; 
                        echo '</a>
                    </button>
                 </div>'; 
                }?>
                 <div class="photo-info">
                    <h1>
                    <?php 
                    if($photo->get_username() == $_SESSION['username'])
                        echo "You own this photo";
                    else echo '<a href="user.php?guest='.$photo->get_username().'">'.$photo->get_username().'</a> owns this photo';?>
                    </h1>
                    <ul>
                        <li><h3>Date added: </h3><p><?php echo $photo->get_created();?></p></li>
                        <li><h3>Visibility: </h3><p><?php echo $photo->get_visibility();?></p></li>
                        <li><h3>Tags: </h3><p><?php echo $photo->get_tags();?></p></li>
                    </ul>
                </div>
                <div class="container-comm">
                    <h2>Comments</h2>
                    <?php $comments = getPhotoComments($_SESSION['filename']);
                        foreach($comments as $comment){
                            echo '<div class="row-gallery">
                                    <div class="col-6">';
                                            if($comment->get_status()=="unaccepted" && $_SESSION['username'] == $photo->get_username())
                                            {
                                                echo '<div class="uncomment">';
                                                echo '<p class="unacceptedComm"><b>'.$comment->get_from().':</b> '.$comment->get_text().'</p>';
                                                echo '<a href="photo.php?name='.$_SESSION['filename'].'&action=comment&param=accept"><button class="uncommBtn commAcc">Accept</button></a>';
                                                echo '<a href="photo.php?name='.$_SESSION['filename'].'&action=comment&param=reject"><button class="uncommBtn commRej">Reject</button></a>';
                                            }
                                            else if($comment->get_status()=="accepted")
                                            {
                                                echo '<div class="comment">';
                                                echo '<p><a href="user.php?guest='.$comment->get_from().'"><b>'.$comment->get_from().':</b></a> '.$comment->get_text().'</p>';
                                            }
                                    echo '</div>
                                    </div>
                                </div>';
                        }?>
                            <!--End row-->
                            <div class="row-gallery">
                                <div class="col-6">
                                    <form method="post" action="actions/addComment.php">
                                        <input type="text" class="input" placeholder="Write a comment..." name="comm" require></input>
                                        <button class="primaryContained float-right" type="submit" name="add_comm">Add comment</button>
                                
                                    </form>
                                </div>
                            </div>
                        </div>
            </div>

        </div>


        <div class="form-popup" id="pickAlbum">
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
            
        </div>
        <div class="form-popup" id="addTag">
            <form method="post" <?php echo 'action="photo.php?name='.$_SESSION['filename'].'&action=none&param=none"';?> class="form-container">
                <h1>Add tag</h1>
                <?php include('../registration/errors.php'); ?>
                <label for="tag_name">Tag name: </label>
                <input type="text" placeholder="Enter tag name" name="tag_name" required>
                <button type="submit" class="btn" name="add_tag">Add tag</button>
                <button type="button" class="btn" onclick="closeAddTags()">Close</button>
            </form>
        </div>

        <script src="scripts/pickAlbum.js"></script>
        <script src="scripts/addTag.js"></script>
    </body>
</html>
