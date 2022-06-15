function DisplayChanges()
{
    var blurSlider = document.getElementById("blur");
    var brSlider = document.getElementById("brightn");
    var conSlider = document.getElementById("contrast");
    var bwSlider = document.getElementById("bw");
    var hueSlider = document.getElementById("hue");
    var invSlider = document.getElementById("invert");
    var opSlider = document.getElementById("opacity");
    var satSlider = document.getElementById("sat");
    var sepSlider = document.getElementById("sepia");
    var photo = document.getElementById("photo");


    photo.style.filter = "blur(" + blurSlider.value + "px) brightness(" + brSlider.value +"%) " +
    "contrast(" + conSlider.value + "%) grayscale(" + bwSlider.value + "%) hue-rotate(" + hueSlider.value + "deg) " +
    "invert(" + invSlider.value + "%) " + "opacity(" + opSlider.value + "%) " + "saturate(" + satSlider.value + "%) " +
    "sepia(" + sepSlider.value + "%)";
}