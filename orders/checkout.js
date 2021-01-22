console.log("OPEN!");
var checkout = document.querySelectorAll("#checkout")[0];

console.log(checkout);


checkout.addEventListener("submit", function (event) {
    event.preventDefault();
    check (event.target)}, 
    false);

    

    function check(x) {
       event.preventDefault();
        var xhr =
        new XMLHttpRequest();  
        console.log(x.personId.value);
        console.log(x.address.value);
        console.log(x.phone.value);
        console.log(x.cCNum.value);
        xhr.onreadystatechange = function(e){     
        
            if(xhr.readyState === 4){       
                location.href = "success-order.php";
            } 
        };
        xhr.open("POST","process-checkout.php",true); 
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded"); 
        xhr.send("personId=" + x.personId.value + "&orderId=" + x.orderId.value + "&address=" + x.address.value + "&phone=" + x.phone.value + "&cCName=" + x.cCName.value + "&cCNum=" + x.cCNum.value + "&expMM=" + x.expMM.value + "&expYY=" + x.expYY.value);
    }


