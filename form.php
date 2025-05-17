
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  </head>
  <body>
      Username:
      <input type="text" id="uname" />
      Password:
      <input type="password" id="pass" />
      <input type="button" value="Sign In" onclick="signIn();"/>
  <select id="cities"><option value="">Select City</option></select>

    </body>

  <script>
      

    function signIn(){
    
      $.ajax({
                url: 'test.php',
                type: 'POST',
                data:  {"UNAME":uname.value,"PASS":pass.value,"AJAX_REQ2":2},
                success: function(response){        
                  console.log(response);
                  $('#cities').empty();
                  var jobj=JSON.parse(response);
                  var opt=document.createElement("option");
                      opt.innerHTML="Select Category";
                      cities.appendChild(opt);
                  for(var i=0; i<jobj.length; i++){
                      //console.log(jobj[i]);
                      var opt=document.createElement("option");
                      opt.innerHTML=jobj[i];
                      opt.value=jobj[i];
                      cities.appendChild(opt);
                  }

           }
          });

          console.log(cities.value);
    }

  </script>
</html>
