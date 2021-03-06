<?php 
include_once('ImageInfo.php');
include_once('actions/fetch.php');
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
        <div class="logo">BPIC</div>
        <div class="menu">
            <a href="../registration/index.php"><i class="fa fa-home"> Home </i></a>
            <a href="../user-albums/albums.php"><i class="fa fa-folder"> Albums </i> </a>
            <a href="user.php" class="active"><i class="fa fa-user"> User </i></a>
        </div>
    </nav>
    
    <section class="main">
        <div class="wrapper">


            <div class="butoane-top">
                <ul class="dropdown">
                    <li><button type="button" class="buttons">
                    <span class="button_icon"><ion-icon name="funnel-outline"></ion-icon></ion-icon></span>
                    <span class="button_text">Filter</span>
                    </button>
                <ul class="elemente_dropdown">
                    <li><a href="#">after date</a></li>
                    <li><a href="#">after tag</a></li>
                </ul>
                </li>
                </ul>
            </div>
                 

<div class="butoane-top">
            <ul class="dropdown">
                <li><button type="button" class="buttons">
                <span class="button_icon"><ion-icon name="download-outline"></ion-icon></span>
                <span class="button_text">Stats</span></button>
                </li>
            </ul>    
               
          </div>
          
            <div class="butoane-top">
                <ul class="dropdown">
                    <li><button type="button" class="buttons">
                    <span class="button_icon"><ion-icon name="eye-outline"></ion-icon></span>
                    <span class="button_text">Public</span></button>
                    </li>
                </ul>    
                   
              </div>

        <div class="btn3">
            <a href="uploadPage.php"><label for="file"> <i class="fa fa-plus"></i> Upload </label></a>     
        </div>
        </div>



    

    </section>
   
    <section class="content">
        <div>
            <img src="./pics/avatar3.png" alt="profile-pic" class="profile-pic">
        </div>
        <div>
            <?php
                echo $_SESSION["username"];
            ?>
        </div>
    </section>


    <section class="main">
    <main class="gallery">

            
            <?php
                if(isset($_SESSION['photos'])){
                    foreach($_SESSION['photos'] as $photo){
                        echo
                        '
                        <section id="app">
                            <div class="butoane-top">
                                <ul class="dropdown">
                                    <li><button type="button" class="buttons">
                                            <span class="button_icon"><ion-icon name="people-outline"></ion-icon></span>
                                            <span class="button_text">Tagged</span>
                                        </button>
                                        <ul class="elemente_dropdown">
                                            <li><a href="#">@user1</a></li>
                                            <li><a href="#">@user2</a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="dropdown">
                                    <li><button type="button" class="buttons">
                                            <span class="button_icon"><ion-icon name="ellipsis-horizontal-outline"></ion-icon></span>
                                        </button>
                                        <ul class="elemente_dropdown">
                                            <li><a href="#">Edit</a></li>
                                            <li><a href="#">Delete</a></li>
                                            <li><a href="#">Add to folder</a></li>
                                            <li><a href="#">Tag</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div> 
                            <div>
                            <a href = "photo.php?name='.$photo->get_filename().'&action=none&param=none"><img src="../images/'.$photo->get_filename().'" id="photo" class="photo" alt="post"></a>
                            </div>
                            <div class="caption-box"> <b>'.$_SESSION['username'] .': </b> '.$photo->get_filename().'</div>
                            <div class="tags-box"> <b> #bpic #project #group</b> </div>
                            <div class="date">'.$photo->get_created().'</time></div>
                            <div class="container-comm">
                            <div class="row-gallery">
                                <div class="col-6">
                                    <div class="comment">
                          
                                    </div>
                                    <!--End comment-->
                                </div>
                                 <!--End Col-->
                            </div>
                            <!--End row-->
                            <div class="row-gallery">
                                <div class="col-6">
                                    <textarea class="input" placeholder="Write a comment..."></textarea>
                                    <button class="primaryContained float-right" type="submit">Add comment</button>
                                </div>
                                 <!--end col-->
                            </div>
                            <!--End row-->
                        </div>
                        <!--End Container-->
                    </section>
                    <!--end app-->';

                    }
                }
                ?>
    </main>
</section>
        <!--librarie icons-->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>