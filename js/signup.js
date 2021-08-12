function sign(){
    
    var q = document.querySelector(".signup_body");
    
    if(q.style.display === 'block'){
     
        q.style.display = "none";
        
    }
    else{
       
        q.style.display = "block";
        
    }
    
}

function removeddd(){
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
// console.log('hello');
//AJAX CALL FOR SIGNUP FORM

function sign_data(){
    var sing_datas = document.getElementsByClassName("sing_data");
    
    var form_data = new FormData();

    for (let count=0; count<sing_datas.length; count++){
        form_data.append(sing_datas[count].name, sing_datas[count].value);
    }
    document.getElementsByName("login_submit").disabled = true;

    var shr = new XMLHttpRequest;

    shr.open('Post', 'handlesignup.php');

    shr.send(form_data);

    shr.onreadystatechange = function (){
       if(shr.readyState == 4 && shr.status == 200){
          
        document.getElementsByName("login_submit").disabled = false;

        var recieve = JSON.parse(shr.responseText);

        if(recieve.success != ''){
            document.getElementById("sign_user").reset();
            document.getElementById("email_error").innerHTML = '';
            document.getElementById("pass_error").innerHTML = '';
            document.getElementById("cpass_error").innerHTML = '';
        }
        else{
            document.getElementById("email_error").innerHTML = recieve.email_error;
            document.getElementById("pass_error").innerHTML = recieve.pass_error;
            document.getElementById("cpass_error").innerHTML = recieve.cpass_error;
        }

       }
    }
}


//singup added active fir animation
var signup_conta = document.querySelector(".signup_container");
var btn_signups = document.querySelector(".btn_signup");

btn_signups.addEventListener("click", function(){
    signup_conta.classList.add("active");
    
})

var closesess = document.querySelector(".addjoin");

closesess.addEventListener('click', function(){
    signup_conta.classList.remove("active");
})

if(signup_conta.classList.contains('active')){
    signup_conta.addEventListener('click', function(){
        signup_conta.classList.remove('active');
    })
}