function Redirect(){
    let input = document.getElementById('searchbar').value;
    //input = input.lowerCase;
    window.location = "social/tags/filterPage.php?name=".concat(input);
}