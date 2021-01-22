var Cat = document.querySelector("select");
var subCat = document.querySelector("#subCat");
// var fCat = document.querySelector(".Furniture");
// var gCat = document.querySelector(".Groceries");

var blank = document.querySelector("#blank");

var Electronics = document.querySelectorAll(".Electronics");

var Furniture = document.querySelectorAll(".Furniture");

var Groceries = document.querySelectorAll(".Groceries");

hide();

function hide () {
    subCat.style.display='none';
    // for (i=0; i<Electronics.length; i++) {
    //     Electronics[i].style.display='none';}
    // for (i=0; i<Furniture.length; i++) {
    // Furniture[i].style.display='none';}
    // for (i=0; i<Groceries.length; i++) {
    // Groceries[i].style.display='none';}
}

Cat.addEventListener ("input", function (event) {
    show (event.target)}
    , false);
  
Cat.addEventListener ("click", function (event) {
    show (event.target)}
    , false);
      

function show (x) {
    // location.reload();
    var xhr = new XMLHttpRequest();  
    if (x.value==1) {
        blank.style.display='block';
        for (i=0; i<Electronics.length; i++) {
            Electronics[i].style.display='block';}
        for (i=0; i<Furniture.length; i++) {
        Furniture[i].style.display='none';}
        for (i=0; i<Groceries.length; i++) {
        Groceries[i].style.display='none';}
    } else if (x.value==2) {
        for (i=0; i<Electronics.length; i++) {
            Electronics[i].style.display='none';}
        for (i=0; i<Furniture.length; i++) {
        Furniture[i].style.display='block';}
        for (i=0; i<Groceries.length; i++) {
        Groceries[i].style.display='none';}
    } else {
        for (i=0; i<Electronics.length; i++) {
            Electronics[i].style.display='none';}
        for (i=0; i<Furniture.length; i++) {
        Furniture[i].style.display='none';}
        for (i=0; i<Groceries.length; i++) {
        Groceries[i].style.display='block';}
    }
    subCat.style.display='block';
    
}


