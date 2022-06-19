<?php 
include_once('actions/ImageInfo.php');
include_once('actions/editDescription.php');
include_once('actions/UserInfo.php');
include_once('actions/fetch.php');
    $url = $_SERVER['REQUEST_URI'];         
    $url_components = parse_url($url);

    if(array_key_exists('query', $url_components)){
        parse_str($url_components['query'], $params);
        if(array_key_exists('visibility', $params))
            $_SESSION['status'] = $params['visibility'];
        if(array_key_exists('guest', $params)){
            $_SESSION['view'] = "guest";
            $_SESSION['page_user'] = $params['guest'];
            $user = new UserInfo( $params['guest']);
            $_SESSION['status'] = "public";
        }
        else  $user = new UserInfo($_SESSION['username']);

    }
    else {
        $_SESSION['status'] = "seeAll";
        $user = new UserInfo($_SESSION['username']);
    }

 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../styles/style.css" />
    <link rel="stylesheet" href="../styles/styleUser.css" />
    <link rel="stylesheet" href="../styles/comment.css" />
    <link rel="stylesheet" href="../styles/photoUtilities.css" />
    <link rel="stylesheet" href="../styles/mediaStyle.css" />
    <link href="http://fonts.cdnfonts.com/css/cooper-black" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
    <title>BPIC</title>
</head>

<body>
    <nav class="navbar">
        <div class="logo"><a href="../index.php">BPIC</a></div>
        <div class="menu">
            <a href="../index.php"><i class="fa fa-home"> Home </i></a>
            <a href="../user-albums/albums.php"><i class="fa fa-folder"> Albums </i> </a>
            <a href="user.php" class="active"><i class="fa fa-user"> User </i></a>
        </div>
    </nav>
    
    <section class="main">
        <div class="wrapper">

        <div class="butoane-top">
            <ul class="dropdown">
                <li><button type="button" class="buttons">
                <span class="button_icon"><ion-icon name="download-outline"></ion-icon></span>
                <span class="button_text"><a href="actions/stats.php">Stats</a></span></button>
                </li>
            </ul>    
               
          </div>
          
            <?php if($user->get_username() == $_SESSION['username']){
            echo
            '<div class="butoane-top">
                <ul class="dropdown">
                    <li>
                        <button type="button" class="buttons">
                            <span class="button_icon"><ion-icon name="eye-outline"></ion-icon></span>
                            <span class="button_text">Visibility</span>
                        </button>
                        <ul class="elemente_dropdown">
                            <li><a href="user.php">All</a></li>
                            <li><a href="user.php?visibility=private">Private</a></li>
                            <li><a href="user.php?visibility=public">Public</a></li>
                         </ul>
                    </li>
                </ul>           
            </div>
            <div class="btn3">
                <a href="uploadPage.php" class="uploadBtn"><label for="file"> <i class="fa fa-plus"></i> Upload </label></a>     
            </div>';
       
            }
            ?>
            </div>
    </section>
   
    <section class="content">
        <div>
            <img src="./pics/avatar3.png" alt="profile-pic" class="profile-pic">
        </div>
        <div class="user_info">
            <div class="username_display">
                <h1>
                <?php
                    echo $user->get_username();
                ?>
                </h1>
            </div>
            <div class="description_display">
                <p><?php if($user->get_description() != "none")
                            echo $user->get_description();
                         else echo "No description";?></p>
                <?php if($user->get_username() == $_SESSION['username']){
                echo '<button onclick="openEdit()" class="edit_description">Edit description</button>';
                }?>
            </div>
        </div>
    </section>


    <section class="main">
    <main class="gallery">

            
            <?php
                //if(isset($_SESSION['photos'])){
                    $photos = $user->get_photos();
                    foreach($photos as $photo){
                        $tags = $photo->get_splitTags();
                        $edits = $photo->get_edits();
                        if($edits == "unedited")
                            $edits = "";
                        if($_SESSION['status'] == $photo->get_visibility() || $_SESSION['status'] == "seeAll"){
                        echo
                        '
                        <section id="app">
                            <div>
                            <a href = "photo.php?name='.$photo->get_filename().'&action=none&param=none">
                                <img src="../images/user-photos1/'.$photo->get_filename().'" id="photo" class="photo" alt="post"
                                 style="filter:'.$edits.';">
                            </a>
                            </div>';
                            echo '<div class="caption-box"> <b>'.$_SESSION['username'] .'</b></div>';
                            echo '<div class="date"><time>'.$photo->get_created().'</time></div>';
                            echo '<div class="tags-box">';
                            if($tags !== ""){
                                foreach($tags as $tag)
                                {
                                    echo '<a href="../social/tags/filterPage.php?name='.$tag.'"><b> #'.$tag.'</b></a>';
                                }
                            }
                            echo '</div>';
                        echo '</section>';
                        }

                    }
                //}
                ?>
    </main>
</section>
        <div class="form-popup" id="changeDescription">
            <form method="post" <?php echo 'action="user.php"';?> class="form-container">
                <h1>Edit description</h1>
                <?php include('../registration/errors.php'); ?>
                <input type="text" placeholder="Enter description" name="description" required>
                <button type="submit" class="btn" name="edit_bio">Save</button>
                <button type="button" class="btn" onclick="closeEdit()">Close</button>
            </form>
        </div>
        <!--librarie icons-->
        <script src="scripts/user.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>