console.log("CLOSE!");
var aForm = document.querySelectorAll(".aForm");

console.log(aForm);

for(i=0; i<aForm.length; i++) {
    aForm[i].addEventListener("submit",function (event) {
        event.preventDefault();
        // console.log(event.target);
        addToCart(event.target)}, 
        false); }
    

    function addToCart(i) {

        var xhr = new XMLHttpRequest();  
        console.log(i.productId.value, i.quantity.value);
        console.log(i.quantity.value);
        xhr.onreadystatechange = function(e){     
        
            if(xhr.readyState === 4){       
                // console.log(xhr.responseText);  
            } 
        };
        xhr.open("POST","process-addtocart.php",true); 
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
        xhr.send("productId=" + i.productId.value +  "&quantity=" + i.quantity.value);
    }




