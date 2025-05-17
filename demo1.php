<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
</head>
<body>
<form>
  <select id="categories" name="category" onchange="getSubcategories()">
    <option value="">Select Category</option>
  </select>
    <option value="">Select subcategory</option>
  </select>
</form>

</body>
<script>
    $.ajax({
                url: 'demo.php',
                type: 'POST',
                data:  {"AJAX_REQ":1},
                success: function(response){        
                  console.log(response);
                  var jobj=JSON.parse(response);
                  var opt=document.createElement("option");
                      opt.innerHTML="Select category";
                      categories.appendChild(opt);
                      for(var i=0; i<jobj.length; i++){
                      //console.log(jobj[i]);
                      var opt=document.createElement("option");
                      opt.innerHTML=jobj[i];
                      opt.value=jobj[i];
                      categories.appendChild(opt);
                  }

                  console.log(categories.value);
           }
          });

      function getSubcategories(){
        console.log("Function called");

        $.ajax({
                url: 'demo.php',
                type: 'POST',
                data:  {"AJAX_REQ":2,"CAT":categories.value},
                success: function(response){        
                  console.log(response);
                  $('#Subcategories').empty();
                  var jobj=JSON.parse(response);
                  var opt=document.createElement("option");
                      opt.innerHTML="Select subcategory";
                      Subcategories.appendChild(opt);
                      for(var i=0; i<jobj.length; i++){
                      //console.log(jobj[i]);
                      var opt=document.createElement("option");
                      opt.innerHTML=jobj[i];
                      opt.value=jobj[i];
                      Subcategories.appendChild(opt);
                  }

                  console.log(Subcategories.value);
           }
          });
        
      }

      $.ajax({
                url: 'demo.php',
                type: 'POST',
                data:  {"AJAX_REQ":3},
                success: function(response){        
                  console.log(response);
                  var jobj=JSON.parse(response);
                  var opt=document.createElement("option");
                      opt.innerHTML="Select category";
                      categories.appendChild(opt);
                      for(var i=0; i<jobj.length; i++){
                      //console.log(jobj[i]);
                      var opt=document.createElement("option");
                      opt.innerHTML=jobj[i];
                      opt.value=jobj[i];
                      categories.appendChild(opt);
                  }

                  console.log(categories.value);
           }
          });
</script>
</html>











