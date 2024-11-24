

function suppname() {
    var sname = document.getElementById("supname").value;
    document.getElementById("nameerror").innerHTML = "";
    if (sname === "") {
        document.getElementById("nameerror").innerHTML = "Please enter supplier name";
        return false

    }
    var supplierRegex = /^[A-Za-z\s'-]+$/;
    if (!supplierRegex.test(sname)) {
        document.getElementById("nameerror").innerHTML = "Please enter a valid supplier name";
        return false;
    }

    return true;

}

function suppemail() {
    var semail = document.getElementById("supemail").value;
    document.getElementById("emailerror").innerHTML = "";
    if (semail === "") {
        document.getElementById("emailerror").innerHTML = "Please enter supplier Email";
        return false

    }
    var regexemail=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!regexemail.test(semail)) {
        document.getElementById("emailerror").innerHTML = "Please enter a valid Supplier Email";
        return false;
    }
    return true;

}

function suppcnic() {
    var ccnic = document.getElementById("supcnic").value;
    document.getElementById("cnicerror").innerHTML = "";
    if (ccnic === "") {
        document.getElementById("cnicerror").innerHTML = "Please enter supplier CNIC";
        return false

    }


    return true;

}

function smt() {
    if (suppname() && suppemail() && suppcnic()) {
        return true;
    } else {
        return false; F
    }
}