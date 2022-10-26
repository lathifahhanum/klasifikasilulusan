var eye = document.querySelector('.input-group-text');
var password = document.querySelector('.password');
var toggler = document.getElementById("toggle");
eye.addEventListener('click',function(){
    if(password.type === "password"){
        password.type = "text";
        toggler.classList.add("hide");
    }else{
        password.type = "password";
        toggler.classList.remove("hide");
    }
});