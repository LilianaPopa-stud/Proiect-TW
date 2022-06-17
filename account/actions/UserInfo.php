<?php
include_once('ImageInfo.php');

class UserInfo{
    public $id;
    public $username;
    public $email;
    public $description;

    public function __construct($username)
    {
        $this->username = $username;
        $errors = array();
        $db = mysqli_connect('localhost', 'root', '', 'proiect_tw');
        if(count($errors) == 0){
            $query = "SELECT * FROM users
                WHERE username='" . $this->username . "'";
            $result = mysqli_query($db, $query);
            if(mysqli_num_rows($result) > 0){
                $file = mysqli_fetch_assoc($result);
                $this->email = $file['email'];
                $this->description = $file['description'];
            }
        }
    }

    public function set_username($username)
    {
        $this->username = $username;
    }

    public function get_username()
    {
        return $this->username;
    }

    public function set_email($email)
    {
        $this->email = $email;
    }

    public function get_email()
    {
        return $this->email;
    }

    public function set_description($description)
    {
        $this->description = $description;
    }

    public function get_description()
    {
        return $this->description;
    }

    public function get_photos()
    {
        $errors = array();

        $userPhotos = array(); //for user's photos

        $db = mysqli_connect('localhost', 'root', '', 'proiect_tw');

        //getting user photos
        if(count($errors) == 0){
            $query = "SELECT * FROM images
                WHERE username='" . $this->username . "' order by created DESC";
            $result = mysqli_query($db, $query);
            if(mysqli_num_rows($result) > 0){
                while($file = mysqli_fetch_assoc($result)){
                    $photo = new ImageInfo($file['filename']);
                    $photo->set_id($file['id']);
                    $photo->set_created($file['created']);
                    $photo->set_visibility($file['visibility']);
                    $photo->set_tags($file['tags']);
                    $photo->set_edits($file['edits']);
                    array_push($userPhotos, $photo);
                }
            }
        
        }
        return $userPhotos;

    }
}