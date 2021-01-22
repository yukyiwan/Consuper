console.log("OPEN!");
var eForm = document.querySelectorAll(".eForm");

console.log(eForm);

for(i=0; i<eForm.length; i++) {
    eForm[i].addEventListener("submit",function (event) {
        event.preventDefault();
        // console.log(event.target);
        editCart(event.target)}, 
        false); }
    

    function editCart(i) {

        var xhr = new XMLHttpRequest();  
        // console.log(i.productId.value);
        // console.log(i.orderId.value);
        xhr.onreadystatechange = function(e){     
        
            if(xhr.readyState === 4){       
                location.reload(true);
            } 
        };
        xhr.open("POST","process-edit-order.php",true); 
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
        xhr.send("productId=" + i.productId.value +  "&orderId=" + i.orderId.value +  "&quantity=" + i.quantity.value);
    }




