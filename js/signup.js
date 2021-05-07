function checkPass(){
    if(document.getElementById('password').value!=document.getElementById('r_password').value){
        alert("password didn't match");
        return false;
    }
}