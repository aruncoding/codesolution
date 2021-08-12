//AJAX REQUEST FOR RETREIVING DATA
let user_data = document.getElementById("userdataa");
function showData(){
  const Ajax_reque = new XMLHttpRequest();
  Ajax_reque.open("GET", "rerieve.php", true);
  //beow code convert string into object which we get from server
  Ajax_reque.responseType = "json";
  Ajax_reque.onreadystatechange = function(){
    if(Ajax_reque.status === 200){
        
        console.log(Ajax_reque.response);
        if(Ajax_reque.response){
            x = Ajax_reque.response;
        }
        else{
            x = '';
        }
        for(i=0; i<x.length; i++){
            user_data.innerHTML += "<div class='threadlist_useranser'><div class='user_icon'><i class='fas fa-user'></i></div><div class='threadlist_ques'><h5>" + x[i].thread_user_id + "at" + x[i].timestamp + "</h5><a href='thread.php?threadid=" + x[i].thread_cat_id + "'>" + x[i].thread_title + "</a><p>" + x[i].thread_desc + "</p></div></div>";
            
            // "<div class='threadlist_useranser'><div class='user_icon'><i class='fas fa-user'></i></div><div class='threadlist_ques'><h5>" + x[i].thread_title + "</h5><p>" + x[i].thread_desc + "</p></div></div>";
            
            // '<div class="threadlist_useranser"> <div class="user_icon"><i class="fas fa-user"></i></div> <div class="threadlist_ques"> <h5>' + x[i].user_email + 'at' + x[i].timestamp + '</h5><a>' + x[i].thread_title + '</a> <p>' + x[i].thread_desc + '</p> </div></div>';
            // <a href="thread.php?threadid=' . $id . '">'. $title . '</a>
           
        }
    }
    else{
      console.log("problem occured");
    }
  }
  Ajax_reque.send();
}
showData();
console.log("hello");