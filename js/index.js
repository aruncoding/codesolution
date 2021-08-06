/* ==========================================slider javascript================================================= */

//slider javascript-manual control
var slideIndex = 1;
showslide(slideIndex);

function plus(n){
    showslide(slideIndex += n);
}

function showslide(n){
var i;
var sliders = document.getElementsByClassName('slider');
if (n>sliders.length){slideIndex = 1}
if (n<1){slideIndex = sliders.length}

for(i=0; i<sliders.length; i++){
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
  if (slideIndex > x.length) {slideIndex = 1}
  x[slideIndex-1].style.display = "block";
  setTimeout(carousel, 2000); // Change image every 2 seconds
}


/* ==================================================email exit js================================================== */
function removed()
{
  var emailextis = document.querySelector(".emailexti");
  emailextis.style.display = 'none';
}

/* ======================================Password and confirm js=======================================================*/
function removedd(){
  var passerrors = document.querySelector(".passerror");
  passerrors.style.display = 'none';
}

/* ======================================Singup success===============================================================*/
function remov(){
  var singsuccs = document.querySelector(".singsucc");
  singsuccs.style.display = 'none';

}






// how to hide the content after 5 second code
// document.querySelector(".emailexti").innerHTML = "Email idalready exit";
// setTimeout(function () {
// document.querySelector(".emailexti").innerHTML = '';
// }, 5000);





