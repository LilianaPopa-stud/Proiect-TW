function openForm(){
    document.getElementById("pickAlbum").style.display = "block";
}

function closeForm(){
    document.getElementById("pickAlbum").style.display = "none";
}

function getMessage()
{
    var e = document.createElement("p");
    e.innerHTML = "test";
    document.getElementById("message").appendChild(e);
}