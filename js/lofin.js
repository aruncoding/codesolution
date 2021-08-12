console.log("arun");
//AJAX FOR LOGIN
function safe_sign() {
    var vals = document.getElementsByClassName("logn_val");
    var dataas = new FormData();
    for(cntr = 0; cntr < vals.length; cntr++){
        dataas.append(vals[cntr].name, vals[cntr].value);
    }
    document.querySelector(".logon").disabled = true;

    var lgnio = new XMLHttpRequest;

    lgnio.open('Post', 'handlelogin.php');

    lgnio.send(dataas);

    lgnio.onreadystatechange = function(){
        if(lgnio.readyState == 4 && lgnio.status == 200){
            document.querySelector(".logon").disabled = false;

            new comeback = JSON.parse(lgnio.responseText);

            if(comeback.soccess != ''){
                document.getElementById("lgner").reset();
                document.getElementById("email_err").innerHTML = '';
                document.getElementById("passw_err").innerHTML = '';
            }
            else{
                document.getElementById("email_err").innerHTML = comeback.email_err;
                document.getElementById("passw_err").innerHTML = comeback.passw_err;
            }
        }
    }
}
