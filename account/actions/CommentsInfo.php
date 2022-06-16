<?php

class CommentsInfo{
    public $filename;
    public $from;
    public $to;
    public $status;
    public $text;

    function __construct($filename)
    {
        $this->filename = $filename;
    }

    function set_from($from)
    {
        $this->from = $from;
    }

    function get_from()
    {
        return $this->from;
    }

    function set_to($to)
    {
        $this->to = $to;
    }

    function get_to()
    {
        return $this->to;
    }

    function set_status($status)
    {
        $this->status = $status;
    }

    function get_status()
    {
        return $this->status;
    }

    function set_text($text)
    {
        $this->text = $text;
    }

    function get_text()
    {
        return $this->text;
    }
}