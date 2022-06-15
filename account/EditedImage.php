<?php
require_once 'ImageInfo.php'

class EditedImage extends ImageInfo{
    
    public $blur;
    public $brightness;
    public $contrast;
    public $grayscale;
    public $hue;
    public $invert;
    public $opacity;
    public $saturate;
    public $sepia;

    function __construct($blur, $brightness, $contrast,
    $grayscale, $hue, $invert, $opacity, $saturate, $sepia)
    {
       $this->blur = $blur;
       $this->brightness = $brightness;
       $this->contrast = $contrast;
       $this->grayscale = $grayscale;
       $this->hue = $hue;
       $this->invert = $invert;
       $this->opacity = $opacity;
       $this->saturate = $saturate;
       $this->sepia = $saturate;
    }
}

?>