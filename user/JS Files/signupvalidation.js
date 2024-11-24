function firstname() {
    var sname = document.getElementById("fn").value;
    document.getElementById("ferror").innerHTML = "";
    if (sname === "") {
        document.getElementById("ferror").innerHTML = "Please enter Name";
        return false

    }
    var regexeml = /^[A-Za-z\s'-]+$/;
    if (!regexeml.test(sname)) {
        document.getElementById("ferror").innerHTML = "Please enter a valid Name";
        return false;
    }
    return true;

}
function lastname() {
    var sname = document.getElementById("last").value;
    document.getElementById("lerror").innerHTML = "";
    if (sname === "") {
        document.getElementById("lerror").innerHTML = "Please enter last Name";
        return false

    }
    var regexeml = /^[A-Za-z\s'-]+$/;
    if (!regexeml.test(sname)) {
        document.getElementById("lerror").innerHTML = "Please enter a valid Name";
        return false;
    }
    return true;

}
function eml() {
    var seml = document.getElementById("email").value;
    document.getElementById("emlerror").innerHTML = "";
    if (seml === "") {
        document.getElementById("emlerror").innerHTML = "Please enter email";
        return false

    }
    var regexeml = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!regexeml.test(seml)) {
        document.getElementById("emlerror").innerHTML = "Please enter a valid email";
        return false;
    }
    return true;

}
// function phonn() {
//     var seml = document.getElementById("Phone").value;
//     document.getElementById("phnerror").innerHTML = "";
//     if (seml === "") {
//         document.getElementById("phnerror").innerHTML = "Please enter Phone";
//         return false

//     }
//     var regexeml = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
//     if (!regexeml.test(seml)) {
//         document.getElementById("phnerror").innerHTML = "Please enter a valid Phone";
//         return false;
//     }
//     return true;

// }
function cnt() {
    var seml = document.getElementById("country").value;
    document.getElementById("cnterror").innerHTML = "";
    if (seml === "") {
        document.getElementById("cnterror").innerHTML = "Please enter country name";
        return false

    }
    var regexeml = /^[A-Za-z\s'-]+$/;
    if (!regexeml.test(seml)) {
        document.getElementById("cnterror").innerHTML = "Please enter a valid country";
        return false;
    }
    return true;

}
function stt() {
    var seml = document.getElementById("state").value;
    document.getElementById("stterror").innerHTML = "";
    if (seml === "") {
        document.getElementById("stterror").innerHTML = "Please enter State";
        return false

    }
    var regexeml = /^[A-Za-z\s'-]+$/;
    if (!regexeml.test(seml)) {
        document.getElementById("stterror").innerHTML = "Please enter a valid State";
        return false;
    }
    return true;

}
function ct() {
    var seml = document.getElementById("city").value;
    document.getElementById("cterror").innerHTML = "";
    if (seml === "") {
        document.getElementById("cterror").innerHTML = "Please enter city";
        return false

    }
    var regexeml = /^[A-Za-z\s'-]+$/;
    if (!regexeml.test(seml)) {
        document.getElementById("cterror").innerHTML = "Please enter a valid city";
        return false;
    }
    return true;

}
function pc() {
    var seml = document.getElementById("postal").value;
    document.getElementById("pcerror").innerHTML = "";
    if (seml === "") {
        document.getElementById("pcerror").innerHTML = "Please enter postal code";
        return false

    }
    var regexeml = /^[0-9]{5,9}$/;
    if (!regexeml.test(seml)) {
        document.getElementById("pcerror").innerHTML = "Please enter a valid postal code";
        return false;
    }
    return true;

}
function phonn() {
    var seml = document.getElementById("phone").value;
    document.getElementById("phnerror").innerHTML = "";
    if (seml === "") {
        document.getElementById("phnerror").innerHTML = "Please enter phone Number";
        return false

    }
    var regexeml = /^\(?(\d{3})\)?[- ]?(\d{3})[- ]?(\d{4})$/;
    if (!regexeml.test(seml)) {
        document.getElementById("phnerror").innerHTML = "Please enter a valid phone Number";
        return false;
    }
    return true;

}
function a1() {
    var seml = document.getElementById("address").value;
    document.getElementById("a1error").innerHTML = "";
    if (seml === "") {
        document.getElementById("a1error").innerHTML = "Please enter address";
        return false

    }
    var regexeml = /^[A-Za-z\s'-]+$/;
    if (!regexeml.test(seml)) {
        document.getElementById("a1error").innerHTML = "Please enter a valid address";
        return false;
    }
    return true;

}
function a2() {
    var seml = document.getElementById("address2").value;
    document.getElementById("a2error").innerHTML = "";
    if (seml === "") {
        document.getElementById("a2error").innerHTML = "Please enter second address";
        return false

    }
    var regexeml = /^[A-Za-z\s'-]+$/;
    if (!regexeml.test(seml)) {
        document.getElementById("a2error").innerHTML = "Please enter a valid second address";
        return false;
    }
    return true;

}
function pswrd() {
    var pswrd = document.getElementById("pass").value;
    document.getElementById("pswrderror").innerHTML = "";
    if (pswrd === "") {
        document.getElementById("pswrderror").innerHTML = "Please enter password";
        return false

    }
    var regexpswrd = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$/;
    if (!regexpswrd.test(pswrd)) {
        document.getElementById("pswrderror").innerHTML = "Enter minimum 8 characters,must be including '[one uppercase,one lowercase,one digit and one special character)]'";
        return false;
    }
    return true;

}
function cp() {
    var pswrd = document.getElementById("cpass").value;
    document.getElementById("cperror").innerHTML = "";
    if (pswrd === "") {
        document.getElementById("cperror").innerHTML = "Please re-enter the password";
        return false

    }
    var regexpswrd = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^\da-zA-Z]).{8,}$/;
    if (!regexpswrd.test(pswrd)) {
        document.getElementById("cperror").innerHTML = "Please enter a matching password";
        return false;
    }
    return true;

}
function smt() {
    if (firstname() && lastname() && eml() && phonn() && cnt() && stt() && ct() && pc() && a1() && a2() && pswrd() && pc()) {
        return true;
    } else {
        return false; F
    }
}

$(document).ready(function () {
    $(document).on("submit", "#logindata", function (e) {
        e.preventDefault();
        var mydata = new FormData(logindata)
        $.ajax({
            url: "./ajax/signupajax.php",
            method: "POST",
            data: mydata,
            processData: false,
            contentType: false,
            success: function (val) {
                if (val == 1) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 1000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "error",
                        title: "Please Fill All Required Fields"
                    });
                } else if (val == 2) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 1000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "warning",
                        title: "User E-mail Already Exist"
                    });
                } else if (val == 3) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 1000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "warning",
                        title: "User Password Already Exist"
                    });
                } else if (val == 4) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 1000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "success",
                        title: "Registered successfully"
                    });
                    $("#logindata").trigger("reset")
                } else if (val == 5) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 1000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "error",
                        title: "Registeration"
                    });
                } else {

                    alert(val);
                }
            }

        })
    })
})
