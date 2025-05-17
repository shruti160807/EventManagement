function logout() {
    window.location.replace('logout.php');
}

function openModal(){
    $('#loginModal').modal('show');
}


function login() {
    if (username.value != "" && password.value != "") {

        $.ajax({
            url: 'result.php',
            type: 'POST',
            data: { "AJAX_REQ": "SIGN_IN", "USERNAME": username.value, "PASSWORD": password.value },
            success: function (response) {
                console.log(response);
                if (response == 1) {
                    toastr.success("User Registration Successful, Please Login");
                    setTimeout(() => {
                        location.reload();
                    }, 800);
                } else if (response == 2) {
                    toastr.error("Invalid Username or Password");

                }
                else {
                    toastr.error("Something went wrong");
                }

                username.value = "";
                password.value = "";
            }
        });


    } else {
        toastr.error("Please fill all fields");
    }
}