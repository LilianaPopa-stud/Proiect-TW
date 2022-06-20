function init(filename)
{
    var sbtn = document.getElementById("showBtn");
    var hbtn = document.getElementById("hideBtn");
    var canvas = document.getElementById("myCanvas");
    var ctx = canvas.getContext("2d");
    var img = new Image(); 
    ctx.clearRect(0,0,canvas.width, canvas.height);
    img.onload = function(){
        var hRatio = canvas.width  / img.width    ;
        var vRatio =  canvas.height / img.height  ;
        var ratio  = Math.min ( hRatio, vRatio );
        var centerShift_x = ( canvas.width - img.width*ratio ) / 2;
        var centerShift_y = ( canvas.height - img.height*ratio ) / 2;
        ctx.drawImage(img, 0,0, img.width, img.height,
            centerShift_x,centerShift_y,img.width*ratio, img.height*ratio);
    };

    img.src = "../images/user-photos1/" + filename;
    canvas.addEventListener("mousedown", function(e)
        {
            getMousePosition(canvas, e, ctx, filename);
        });
    sbtn.onclick = 
    function(){
        getTags(canvas, ctx, filename);
    };
    hbtn.onclick = 
    function(){
        window.location = "inspect.php?name=" + filename;
    };
}

function getMousePosition(canvas, event, ctx, filename) {
    let rect = canvas.getBoundingClientRect();
    let x = event.clientX - rect.left;
    let y = event.clientY - rect.top;
    var text = document.createElement("h3");
    var coord = x + " " + y;
    text.innerHTML = "Add tag at: </br>" + coord;
    var textContainer = document.getElementById("textDiv");
    textContainer.innerHTML = "Add tag at: " + coord;
    var btn = document.getElementById("confirmBtn");
    btn.style.display = "inline-block";
    btn.onclick = 
    function(){
        coordConfirmed(x, y, canvas, ctx, filename);
    };
}

function coordConfirmed(x, y, canvas, ctx, filename)
{
    console.log("Coordinate x: " + x, 
                "Coordinate y: " + y);
    var inp = document.getElementById("tagInput");
    inp.style.display = "inline-block";
    var btn = document.getElementById("addTag");
    btn.style.display = "inline-block";
    btn.onclick = 
    function(){
        console.log(inp.value);
        window.location = "actions/inspectTags.php?name=" + filename + "&action=add&tag=" + inp.value + "&x=" + x + "&y=" + y;
    }
}

function getTags(canvas, ctx, filename)
{
    fetch("actions/getInspect.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
        },
        body: `filename=${filename}`,
      })
      .then((response) => response.text())
      .then((res) => ( showTags(canvas, ctx, filename, res)
      ));
      

}

function showTags(canvas, ctx, filename, res){
    const resTags = res.split(";");
    for(let i = 0; i < resTags.length; i++)
    {
        const tag = resTags[i].split(",");
        let tagName = tag[0];
        let x = tag[1];
        let y = tag[2];
        console.log("name:" + tagName + " x: " + x + " y: " + y);
        if(x != "undefined" && y != "undefined"){
            ctx.beginPath();
            let len = tagName.length;
            ctx.fillStyle = "rgba(201, 217, 223, 0.47)";
            ctx.fillRect(x-10, y-20, len * 15, 30);
            ctx.font = "20pt Calibri";
            ctx.fillStyle = "black";
            ctx.fillText(tagName, x, y);
            displayTags(tagName, filename);
        }
    }

}

function displayTags(tagname, filename)
{
    var dd = document.createElement("ul");
    dd.className = "dropdown";
    dd.id = "dd";

    var el = document.createElement("li");
    el.id = "el";
    dd.appendChild(el);


    var btn = document.createElement('button');
    btn.type = "button";
    btn.className = "buttons";
    btn.id = "btn";
    var sp = document.createElement("span");
    sp.class = "button_text";
    sp.id = "tag_name";
    var a = document.createElement('a');
    var linkText = document.createTextNode( "#" + tagname + " ");
    a.appendChild(linkText);
    a.title = tagname;
    a.href = "../social/tags/filterPage.php?name=" + tagname;
    sp.appendChild(a);
    btn.appendChild(sp);
    el.appendChild(btn);

    var dd_el = document.createElement("ul");
    dd_el.className = "elemente_dropdown";
    dd_el.id="dd_el";

    var del = document.createElement('li');
    var dt = document.createElement('a');
    var linkText = document.createTextNode("Delete");
    dt.appendChild(linkText);
    dt.title = "del";
    dt.href = "actions/addTagsInspect.php?delete=true&tag=" + tagname + "&file=" + filename;
    del.appendChild(dt);

    var add = document.createElement('li');
    var ad = document.createElement('a');
    var linkText = document.createTextNode("Add to tags");
    ad.appendChild(linkText);
    ad.title = "add";
    ad.href = "actions/addTagsInspect.php?tag=" + tagname + "&file=" + filename;
    del.appendChild(ad);

    dd_el.appendChild(del);
    dd_el.appendChild(add);
    
    el.appendChild(dd_el);
    
    document.getElementById("tag-list").appendChild(dd);

}