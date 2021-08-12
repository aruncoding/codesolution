function lognino(){
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


var login_containers = document.querySelector(".login_container");
var btn_logins = document.querySelector(".btn_login");
var closesss = document.querySelector(".close"); 

btn_logins.addEventListener("click", function(){
    login_containers.classList.add("active");

})

closesss.addEventListener('click', function(){
    login_containers.classList.remove("active");
})


