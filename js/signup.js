function sign(){
    
    var q = document.querySelector(".signup_body");
    
    if(q.style.display === 'block'){
     
        q.style.display = "none";
        
    }
    else{
       
        q.style.display = "block";
        
    }
    
}

function remov(){
    var q = document.querySelector(".signup_body");
    q.style.display = "none";
    
}

function clos(){
    var q = document.querySelector(".signup_body");
    q.style.display = "none";

}

var r = document.querySelector(".btn_signup");
var s = document.querySelector(".login_body");

r.addEventListener('click', function(){
s.style.display = "none";
});

