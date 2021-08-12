function save_data(){
    var messages = document.getElementsByClassName("form_data");
    var comments = new FormData();
    for(count=0; count<messages.length; count++){
        comments.append(messages[count].name, messages[count].value);
    }
    document.getElementById("subm").disabled = true;

    var xhr = new XMLHttpRequest();
    xhr.open('Post', 'comment.php');
    xhr.send(comments);

    xhr.onreadystatechange = function(){
if(xhr.readyState == 4 && xhr.status == 200){
    document.getElementById("subm").disabled = false;
    let comeback = JSON.parse(xhr.responseText);

    if(comeback.done != ''){
        document.getElementById("comme_for").reset();
        document.getElementById("mess").innerHTML = "Your Comment  is Added";
        setTimeout(() => {
            document.getElementById("mess").innerHTML = '';
        }, 5000);
        document.getElementById("comment_error").innerHTML = '';
    }
    else{
        document.getElementById("comment_error").innerHTML = comeback.comment_error;
    }
}
    }

}

/* comment keyup javascript */
function commen(){
    if(document.getElementById("comments").value == ''){
        document.getElementById("comment_error").innerHTML = 'Comment field is empty';
    }
    else{
        document.getElementById("comment_error").innerHTML = '';
    }
}