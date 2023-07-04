function validateForm(){
    var username=document.getElementById("username").value;
    var password=document.getElementById("password").value;
    var emailRegex=/^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})+$/;
    var passwordRegex=/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

    if(!username || !password){
        alert("Please enter a username and password");
        return false;
    }
    if(!emailRegex.test(username)){
        alert("Please enter a valid email");
        return false;
    }
    if(!passwordRegex.test(password)){
        alert("Password must be at least 8 characters long and contain at least one letter and one number.");
        return false;
    }
    return true;
}
