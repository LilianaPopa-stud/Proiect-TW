
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

function submitEdit(filename)
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
    var edit = "blur(" + blurSlider.value + "px) brightness(" + brSlider.value +"%) " +
    "contrast(" + conSlider.value + "%) grayscale(" + bwSlider.value + "%) hue-rotate(" + hueSlider.value + "deg) " +
    "invert(" + invSlider.value + "%) " + "opacity(" + opSlider.value + "%) " + "saturate(" + satSlider.value + "%) " +
    "sepia(" + sepSlider.value + "%)";
    

    fetch("uploadEdit.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
        },
        body: `filename=${filename}&edit=${edit}`,
      })
      .then((response) => response.text())
      .then((res) => (document.getElementById("response").innerHTML = res));
}

function deleteEdit(filename){
    var edit = "unedited";
    fetch("uploadEdit.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
        },
        body: `filename=${filename}&edit=${edit}`,
      })
      .then(document.getElementById("response").innerHTML = "Edit deleted");

}
