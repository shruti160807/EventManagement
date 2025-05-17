<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
    <script src="layouts/jsfunctions.js"></script>
</head>
<body>
<div class="row " 
        style="background-color:hsl(0,0%,80%); height: 50px; 
        position: sticky;
        top: 0;
        z-index: 1;">
            <div class="col-1" style="margin-top: 10px;">
              <h4 style="font-family:Amatic SC ;" id="home" onclick="contactNowClicked(this.id);">HOME</h4>
            </div>
            <div class="col-1" style="margin-top: 10px;">
              <h4 style="font-family:Amatic SC ;" id="about"onclick="contactNowClicked(this.id);">ABOUT</h4>
            </div>
            <div class="col-3" style="margin-top: 10px;">
              <h4 style="font-family:Amatic SC ;" id="contact"onclick="contactNowClicked(this.id);">CONTACT US</h4>
            </div>
</div>

<div class="container text-center mt-4"style="width:50%; border:1px solid black ; border-radius:5px">
        <div class="row">
            <div class="col text-center font-weight-bold" >
                Sign Up Form
            </div>
        </div>
<div class="row"><div class="col">
            Username
        </div>
        <div class="col"><input type="text" class="form-control" id="username"></div>
    </div>
    
    <div class="row"><div class="col">
            Password
        </div>
        <div class="col"><input type="password" class="form-control" id="password"></div>
    </div>
    
    <div class="row"><div class="col">
            Phone No
        </div>
        <div class="col"><input type="text" class="form-control" id="phone"></div>
    </div>

    
    <div class="row mb-4"><div class="col">
            <button class="btn btn-outline-success" onclick="singUp();">Sign Up</button>
        </div>
    </div>

    </div>
</body>

<script>
    function singUp(){
        if(username.value!="" && password.value!="" && phone.value!=""){

            $.ajax({
        url: 'result.php',
        type: 'POST',
        data:  {"AJAX_REQ":"SIGN_UP","USERNAME":username.value,"PASSWORD":password.value,"PHONE":phone.value},
        success: function(response){  
          console.log(response);
          if(response==1){
          toastr.success("User Registration Successful, Please Login");
          }
          else{
          toastr.error("Something went wrong");
          }
          
         username.value="";
         password.value="";
         phone.value="";
         }
        });

        }else{

            toastr.error("Please Fill All Fields");
        }
    }
</script>


  <!--Toastr (Notification Library) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"
  />

</html>