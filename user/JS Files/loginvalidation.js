function femail() {
    var semail = document.getElementById("email").value;
    document.getElementById("emailerror").innerHTML = "";
    if (semail === "") {
        document.getElementById("emailerror").innerHTML = "Please enter Email";
        return false

    }
    var regexemail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!regexemail.test(semail)) {
        document.getElementById("emailerror").innerHTML = "Please enter a valid Email";
        return false;
    }
    return true;

}
function pswrd() {
    var pswrd = document.getElementById("password").value;
    document.getElementById("passworderror").innerHTML = "";
    if (pswrd === "") {
        document.getElementById("passworderror").innerHTML = "Please enter password";
        return false

    }
    var regexpswrd = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$/;
    if (!regexpswrd.test(pswrd)) {
        document.getElementById("passworderror").innerHTML = "Enter minimum 8 characters,must be including '[one uppercase,one lowercase,one digit and one special character)]'";
        return false;
    }
    return true;

}
function smt() {
    if (femail() && pswrd()) {
        return true;
    } else {
        return false; F
    }
}