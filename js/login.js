function logn(){
    var y = document.querySelector(".login_body");
    
    
    if(y.style.display === 'block'){
     
        y.style.display = "none";
        
    }
    else{
       
        y.style.display = "block";
        
    }
    
}

function remove(){
    var y = document.querySelector(".login_body");
    y.style.display = "none";
    
}

function closes(){
    var y = document.querySelector(".login_body");
    y.style.display = "none";

}

var p = document.querySelector(".signup_body");
var t = document.querySelector(".btn_login");

t.addEventListener("click", function(){
p.style.display = 'none';
});