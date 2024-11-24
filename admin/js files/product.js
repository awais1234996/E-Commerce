
function catid() {
    var catname = document.getElementById("catname").value;
    document.getElementById("caterror").innerHTML = "";
    if (catname === "") {
        document.getElementById("caterror").innerHTML = "Please enter category name";
        return false

    }
    return true;

}
function proname() {
    var sname = document.getElementById("pname").value;
    document.getElementById("nameerror").innerHTML = "";
    if (sname === "") {
        document.getElementById("nameerror").innerHTML = "Please enter product name";
        return false

    }
    var productRegex = /^[A-Za-z\s'-]+$/;
    if (!productRegex.test(sname)) {
        document.getElementById("nameerror").innerHTML = "Please enter a valid product name";
        return false;
    }

    return true;

}
function prodes() {
    var sdes = document.getElementById("pdes").value;
    document.getElementById("deserror").innerHTML = "";
    if (sdes === "") {
        document.getElementById("deserror").innerHTML = "Please enter product Description";
        return false

    }
    var productRegex = /^[a-zA-Z\s]+$/;
    if (!productRegex.test(sdes)) {
        document.getElementById("deserror").innerHTML = "Please enter a valid product Description";
        return false;
    }

    return true;

}
function prosdes() {
    var sshort = document.getElementById("psdes").value;
    document.getElementById("shorterror").innerHTML = "";
    if (sshort === "") {
        document.getElementById("shorterror").innerHTML = "Please enter product short description";
        return false

    }
    var productRegex = /^[a-zA-Z\s]+$/;
    if (!productRegex.test(sshort)) {
        document.getElementById("shorterror").innerHTML = "Please enter a valid product short description";
        return false;
    }

    return true;

}
function procode() {
    var scode = document.getElementById("pcode").value;
    document.getElementById("codeerror").innerHTML = "";
    if (scode === "") {
        document.getElementById("codeerror").innerHTML = "Please enter product code";
        return false

    }
    var productRegex = /^[0-9]$/;
    if (!productRegex.test(scode)) {
        document.getElementById("codeerror").innerHTML = "Please enter a valid product code";
        return false;
    }

    return true;

}
function prostock() {
    var sstock = document.getElementById("pstock").value;
    document.getElementById("stockerror").innerHTML = "";
    if (sstock === "") {
        document.getElementById("stockerror").innerHTML = "Please enter product stock";
        return false

    }
    var productRegex = /^[0-9]*$/;
    if (!productRegex.test(sstock)) {
        document.getElementById("stockerror").innerHTML = "Please enter a valid product stock";
        return false;
    }

    return true;

}
function prounit() {
    var sunit = document.getElementById("punit").value;
    document.getElementById("uniterror").innerHTML = "";
    if (sunit === "") {
        document.getElementById("uniterror").innerHTML = "Please enter product unit price";
        return false

    }
    var productRegex = /^[0-9]*$/;
    if (!productRegex.test(sunit)) {
        document.getElementById("uniterror").innerHTML = "Please enter a valid product unit price";
        return false;
    }

    return true;

}
function prosale() {
    var ssale = document.getElementById("psale").value;
    document.getElementById("saleerror").innerHTML = "";
    if (ssale === "") {
        document.getElementById("saleerror").innerHTML = "Please enter product sale price";
        return false

    }
    var productRegex = /^\d{0,8}(\.\d{1,4})?$/;
    if (!productRegex.test(ssale)) {
        document.getElementById("saleerror").innerHTML = "Please enter a valid product sale price";
        return false;
    }

    return true;
}
function picture() {
    var spic = document.getElementById("img").value;
    document.getElementById("picerror").innerHTML = "";
    if (spic === "") {
        document.getElementById("picerror").innerHTML = "Please enter product picture";
        return false

    }
    var productRegex = /^[^\s]+\.(jpg|jpeg|png|gif|bmp)$/;
    if (!productRegex.test(spic)) {
        document.getElementById("picerror").innerHTML = "Please enter a valid product picture";
        return false;
    }

    return true;
}
function smt() {
    if (proname() && prodes() && prosdes && procode() && prostock() && prounit() && prosale() && picture()) {
        return true
    } else {
        return false
    }
}

