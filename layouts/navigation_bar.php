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
            <div class="col" style="margin-top: 10px;margin-left:280px;">

            <script>

            function contactNowClicked(){
            window.location.href="ContactPage.php?id="+this.id;
            }
              </script>
            <?php 
                session_start(); 
              if(isset($_SESSION['login']) && $_SESSION['login']==true){
               $username=$_SESSION['user']['username'];
               $icon=$_SESSION['user']['icon'];
                echo " <img src='$icon' style='width:20px;height:20px;margin-left:300px'> Welcome  $username <button style='margin-left:10px; ' class='btn btn-outline-danger' onclick='logout();'>Logout </button>" ;
      }else{
                echo "<button class='btn btn-outline-danger' style='margin-left: 10%;margin-left:470px'  data-toggle='modal' data-target='#loginModal' onclick='openModal();'>Login</button>";
      }

?>
            </div>
        </div>



        <div class="modal" tabindex="-1" role="dialog" id="loginModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row"><div class="col">
            Username
          </div>
        <div class="col">
          <input type="text" class="form-control" id="username" oninput="console.log('Username input: ' + this.value)">
        </div>
      </div>
      <div class="row mt-4"><div class="col">
            Password
          </div>
        <div class="col">
          <input type="password" class="form-control" id="password" oninput="console.log('Password input: ' + this.value)">
        </div>
      </div>
      </div>
      </div>
      <div class=" text-center mb-4">
        <button type="button" class="btn btn-primary"  onclick="login(); console.log('Login button clicked')">Login</button> <br>
        <span > Don't have Account? <a href="singUp.php"> Sign Up</a> </span>
      </div>
    </div>
  </div>
</div>


  <!--Toastr (Notification Library) -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"
  />






  