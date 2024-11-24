

function catename() {
    var cname = document.getElementById("catname").value;
    document.getElementById("caterror").innerHTML = "";
    if (cname == "") {
        document.getElementById("caterror").innerHTML = "Plz enter category name";
        return false

    }
    var categoryRegex = /^[A-Za-z\s'-]+$/;
    if (!categoryRegex.test(cname)) {
        document.getElementById("caterror").innerHTML = "Please enter a valid Category";
        return false;
    }

    return true;

}
function catedes() {
    var cdes = document.getElementById("catdes").value;
    document.getElementById("deserror").innerHTML = "";
    if (cdes === "") {
        document.getElementById("deserror").innerHTML = "Plz enter Description";
        return false;
    }
    return true;
}
function smt() {
    if (catename() && catedes()) {
        return true;
    } else {
        return false;
    }
}

$(document).ready(function () {
    $(document).on("click", "#smt", function (e) {
        e.preventDefault()

        var form = $(this).closest("#catdata")
        var cname = form.find("#catname").val();
        var cdes = form.find("#catdes").val()
        $.ajax({
            url: "../ajax/categoryajax.php",
            method: "POST",

            data: {
                "categoryname": cname,
                "categorydescription": cdes
            },
            success: function (res) {
                if (res == 1) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "warning",
                        title: "plz fill all fields"
                    });
                } else if (res == 2) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "warning",
                        title: "Category already exist"
                    });
                    setTimeout(function () {
                        window.location.href = "./index.php";
                    }, 500)
                } else if (res == 3) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "success",
                        title: "category has been inserted"
                    });
                } else if (res == 4) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 2000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    });
                    Toast.fire({
                        icon: "error",
                        title: "category has not been inserted"
                    });
                } else {
                    alert(res)
                }
            }
        })
    })
})
