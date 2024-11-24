

function catid() {
    var catname = document.getElementById("catname").value;
    document.getElementById("caterror").innerHTML = "";
    if (catname == "") {
        document.getElementById("caterror").innerHTML = "Please enter category name";
        return false

    }


    return true;

}
function scname() {
    var cname = document.getElementById("scatname").value;
    document.getElementById("scerror").innerHTML = "";
    if (cname == "") {
        document.getElementById("scerror").innerHTML = "Please enter subcategory name";
        return false

    }
    var categoryRegex = /^[A-Za-z\s'-][a-zA-Z0-9_-]{4,16}$/;
    if (!categoryRegex.test(cname)) {
        document.getElementById("scerror").innerHTML = "Please enter a valid Sub-Category";
        return false;
    }

    return true;

}
function scdes() {
    var cdes = document.getElementById("scatdes").value;
    document.getElementById("deserror").innerHTML = "";
    if (cdes === "") {
        document.getElementById("deserror").innerHTML = "Please enter Description";
        return false;
    }
    return true;
}
function smt() {
    if (scname() && scdes()) {
        return true;
    } else {
        return false; F
    }
}
// $(document).ready(function () {
//     $(document).on("click", "#smt", function (e) {
//         e.preventDefault()

//         var form = $(this).closest("#scatdata");
//         var cname = form.find("#catname").val();
//         // var svgh = form.find("#scatname").val();
//         var cdes = form.find("#scatdes").val()
//         $.ajax({
//             url: "./ajax/subcategoryajax.php",
//             method: "POST",

//             data: {
//                 "subcategoryname": cname,
//                 "subcategorydescription": cdes
//             },
//             success: function (res) {
//                 if (res == 1) {
//                     const Toast = Swal.mixin({
//                         toast: true,
//                         position: "top-end",
//                         showConfirmButton: false,
//                         timer: 2000,
//                         timerProgressBar: true,
//                         didOpen: (toast) => {
//                             toast.onmouseenter = Swal.stopTimer;
//                             toast.onmouseleave = Swal.resumeTimer;
//                         }
//                     });
//                     Toast.fire({
//                         icon: "warning",
//                         title: "plz fill all fields"
//                     });
//                 } else if (res == 2) {
//                     const Toast = Swal.mixin({
//                         toast: true,
//                         position: "top-end",
//                         showConfirmButton: false,
//                         timer: 2000,
//                         timerProgressBar: true,
//                         didOpen: (toast) => {
//                             toast.onmouseenter = Swal.stopTimer;
//                             toast.onmouseleave = Swal.resumeTimer;
//                         }
//                     });
//                     Toast.fire({
//                         icon: "warning",
//                         title: "Sub-Category already exist"
//                     });
//                     setTimeout(function () {
//                         window.location.href = "./index.php";
//                     }, 500)
//                 } else if (res == 3) {
//                     const Toast = Swal.mixin({
//                         toast: true,
//                         position: "top-end",
//                         showConfirmButton: false,
//                         timer: 2000,
//                         timerProgressBar: true,
//                         didOpen: (toast) => {
//                             toast.onmouseenter = Swal.stopTimer;
//                             toast.onmouseleave = Swal.resumeTimer;
//                         }
//                     });
//                     Toast.fire({
//                         icon: "success",
//                         title: "Sub-category has been inserted"
//                     });
//                 } else if (res == 4) {
//                     const Toast = Swal.mixin({
//                         toast: true,
//                         position: "top-end",
//                         showConfirmButton: false,
//                         timer: 2000,
//                         timerProgressBar: true,
//                         didOpen: (toast) => {
//                             toast.onmouseenter = Swal.stopTimer;
//                             toast.onmouseleave = Swal.resumeTimer;
//                         }
//                     });
//                     Toast.fire({
//                         icon: "error",
//                         title: "Sub-category has not been inserted"
//                     });
//                 } else {
//                     alert(res)
//                 }
//             }
//         })
//     })
// })