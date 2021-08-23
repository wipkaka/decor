function myFunction() {
    var x = document.getElementById("main-menu");
    if(x.className === "main-menu")
{
    x.className += " reponsive";
} 
else{
    x.className = "main-menu";
}
}