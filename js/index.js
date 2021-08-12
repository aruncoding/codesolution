/* ==========================================slider javascript================================================= */

//slider javascript-manual control
var slideIndex = 1;
showslide(slideIndex);

function plus(n) {
  showslide(slideIndex += n);
}

function showslide(n) {
  var i;
  var sliders = document.getElementsByClassName('slider');
  if (n > sliders.length) { slideIndex = 1 }
  if (n < 1) { slideIndex = sliders.length }

  for (i = 0; i < sliders.length; i++) {
    sliders[i].style.display = 'none';
  }
  sliders[slideIndex - 1].style.display = 'block';
}

// slider using automatic
var slideIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("slider");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > x.length) { slideIndex = 1 }
  x[slideIndex - 1].style.display = "block";
  setTimeout(carousel, 2000); // Change image every 2 seconds
}


/* ==================================================email exit js================================================== */
function removed() {
  var emailextis = document.querySelector(".emailexti");
  emailextis.style.display = 'none';
}

/* ======================================Password and confirm js=======================================================*/
function removedd() {
  var passerrors = document.querySelector(".passerror");
  passerrors.style.display = 'none';
}

/* ======================================Singup success===============================================================*/
function remov() {
  var singsuccs = document.querySelector(".singsucc");
  singsuccs.style.display = 'none';

}


/* =======================================threadlist ajax call for form=============================================== */
function save_data() {
  var form_element = document.getElementsByClassName("form_data");
  var form_data = new FormData();

  for (var count = 0; count < form_element.length; count++) {
    form_data.append(form_element[count].name, form_element[count].value)
  }
  document.getElementById("submit").disabled = true;

  var Ajax_Request = new XMLHttpRequest;

  Ajax_Request.open('Post', 'threadform.php');

  Ajax_Request.send(form_data);

  Ajax_Request.onreadystatechange = function () {
    if (Ajax_Request.readyState == 4 && Ajax_Request.status == 200) {
     
      document.getElementById("submit").disabled = false;
      alert('Data Added successfully');
      // var querys = document.getElementsByClassName("threadlist_query");
      location.reload();
      
     
      let respon = JSON.parse(Ajax_Request.responseText);

      if (respon.success != '') {
       
        document.getElementById("sample_form").reset();

        // var querys = document.querySelector(".threadlist_query");
        
        // function 

        document.getElementById("message").innerHTML = "Your Threads have been added";

        setTimeout(function () {
          document.getElementById("message").innerHTML = ''
        }, 5000);
        document.getElementById("fname_error").innerHTML = '';
        document.getElementById("message_error").innerHTML = '';
       
      }

      else {
        document.getElementById("fname_error").innerHTML = respon.fname_error;
        document.getElementById("message_error").innerHTML = respon.message_error;
        
      }
    }
  }
}

/* ===================================to remove validation on keyup=================================== */
function thre_inp(){
  if(document.getElementById("title").value == ''){
    document.getElementById("fname_error").innerHTML = 'title field is empty';
  }
  else{
    document.getElementById("fname_error").innerHTML = '';
  }
}

function messa(){
  if(document.getElementById("comment").value ==''){
    document.getElementById("message_error").innerHTML = 'Message field is empty';
  }
  else{
    document.getElementById("message_error").innerHTML = '';
  }
}


/* active class toggle in header */
var navbars = document.querySelector("#whole");
var menu = document.querySelector("#menu");

document.onclick = function(e){
  if(e.target.id !== 'menu' && e.target.id !== 'whole'){
    navbars.classList.remove("active");
    menu.classList.remove("active");
  }
}

menu.addEventListener("click", function(){
  navbars.classList.toggle("active");
  menu.classList.toggle("active");
})





