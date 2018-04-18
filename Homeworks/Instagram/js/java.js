// JavaScript

//alert("Hello there.");

//document.write("hello world");

function button()
{
    var btn = document.createElement("Button");
    var t = document.createTextNode("Text");
    
    btn.appendChild(t);
    document.body.appendChild(btn);
}