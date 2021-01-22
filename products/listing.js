
console.log("LIST!");



var rateB = document.querySelector("#rateB");
var latestB = document.querySelector("#latestB");
var carbonB = document.querySelector("#carbonB");
var highB = document.querySelector("#highB");
var lowB = document.querySelector("#lowB");

var rate = document.querySelector("#rate");
var latest = document.querySelector("#latest");
var carbon = document.querySelector("#carbon");
var high = document.querySelector("#high");
var low = document.querySelector("#low");

show(rate);

rateB.addEventListener ("click", 
function event () {
    show(rate)}, 
false);

latestB.addEventListener ("click", 
function event () {
    show(latest)}, 
false);

carbonB.addEventListener ("click", 
function event () {
    show(carbon)}, 
false);

highB.addEventListener ("click", 
function event () {
    show(high)}, 
false);

lowB.addEventListener ("click", 
function event () {
    show(low)}, 
false);

function show (x) {
    hide();
    x.style.display='block';
}
function hide() {
    rate.style.display='none';
    latest.style.display='none';
    carbon.style.display='none';
    high.style.display='none';
    low.style.display='none';
}
     
