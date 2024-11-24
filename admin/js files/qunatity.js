function qtyname(){
    var qtname=document.getElementById("qname").value;
    document.getElementById("nameerror").innerHTML="";
    if(qtname===""){
        document.getElementById("nameerror").innerHTML="Please Enter Quantity"
        return false
    }
    var regexquantity=/^0$|^[1-9][0-9][A-Za-z\s'-]*$/;
    if(!regexquantity.test(qtname)){
        document.getElementById("nameerror").innerHTML="Please Enter Valid Quantity"
        return false
    }
    return true
}
function qtydes(){
    var qtdes=document.getElementById("qdes").value;
    document.getElementById("deserror").innerHTML="";
    if(qtdes===""){
        document.getElementById("deserror").innerHTML="Please Enter Description"
        return false
    }
    var regexdescription=/^[a-zA-Z][a-zA-Z0-9_-]{20,}$/;
    if(!regexdescription.test(qtdes)){
        document.getElementById("deserror").innerHTML="Please Enter Valid Description"
        return false
    }
    return true
}
function smt(){
    if(qtyname()&&qtydes()){
        return true
    }else{
        return false
    }
}