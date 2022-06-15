<?php
class ImageInfo{
    public $id;
    public $filename;
    public $owner;
    public $created;
    public $visibility;
    public $albums;
    public $tags;
    public $edits;

    function __construct($name)
    {
        $this->filename = $name;
    }

    function set_id($id)
    {
        $this->id = $id;
    }

    function set_created($created)
    {
        $this->created = $created;
    }

    function set_visibility($visibility)
    {
        $this->visibility = $visibility;
    }
    
    function set_albums($albums)
    {
        $this->albums = $albums;
    }

    function get_albums()
    {
        return $this->albums;
    }

    function get_id()
    {
        return $this->id;
    }

    function get_filename()
    {
        return $this->filename;
    }

    function get_created()
    {
        return $this->created;
    }

    function get_visibility()
    {
        return $this->visibility;
    }

    function set_tags($tags){
        $this->tags = $tags;
    }

    function get_tags(){
        return $this->tags;
    }

    function set_edits($edits){
        $this->edits = $edits;
    }

    function get_edits(){
        return $this->edits;
    }


    function get_splitTags()
    {
        $str = $this->tags;
        if($str !== "none"){
            $str = explode(',', $this->tags);
        }
        else $str = "";
        return $str;
    }
}
?>