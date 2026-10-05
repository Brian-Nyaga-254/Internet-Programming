/*  */

const eyeIcon=document.getElementById('eye');/* eye icon from form */

const passwordField=document.getElementById('password');/* Password input field from form */

eyeIcon.addEventListener('click',()=>{
    if(passwordField.type === "password" && passwordField.value){
        passwordField.type="text";
        eyeIcon.classList.remove('fa-eye')
        eyeIcon.classList.add('fa-eye-slash')   
    }
    else{
        passwordField.type="password";
        eyeIcon.classList.remove('fa-eye-slash')
        eyeIcon.classList.add('fa-eye')
    }
})