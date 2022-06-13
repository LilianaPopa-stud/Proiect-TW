<?php
class ImageInfo{
    public $id;
    public $filename;
    public $owner;
    public $created;
    public $visibility;

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
}
?>