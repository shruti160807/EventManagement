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
<body style="background-image:url(backg.jpg);" id="BodyLoad" >
  
    <div class="w3-top w3-hide-small">
      
    </div>
    <div class="container-fluid">
     <!--Nav Bar-->
     <?php
     require_once('layouts/navigation_bar.php');
     ?>      
</body>
<script>

$( document ).ready(function() {
    $.ajax({
                url: 'result.php',
                type: 'POST',
                data:  {"AJAX_REQ":"GET_CAFES"},
                success: function(response){        
                  console.log(response);
                  mainBody(response);
           }
          });
});

function mainBody(jsonString){ 
var jobj= JSON.parse(jsonString);
var imgArray =jobj.imgArray;
var descArray = jobj.descArray;
var idArray = jobj.id;

        var mainDiv=document.createElement("div");
        mainDiv.style.display="flex";
        mainDiv.style.flexWrap="wrap"; 
        for(var i=0;i<imgArray.length;i++){
            var mainImgDiv = document.createElement("div");
            mainImgDiv.style.margin="20px";
        var cafeImg=document.createElement("img");
        cafeImg.src=imgArray[i];
        cafeImg.style="width:300px; height: 250px";
        mainImgDiv.appendChild(cafeImg);
        BodyLoad.appendChild(mainImgDiv);


        var descDiv = document.createElement("div");
        descDiv.style.display="flex"
        var textaboutcafe = document.createElement("p");
        textaboutcafe.innerHTML=descArray[i];
        textaboutcafe.style=("color:white");
        var contactButton = document.createElement("button");
        contactButton.id=idArray[i];
        contactButton.style=("height:40px; width:120px ; margin-left: 80px; margin-top:15px;")
        contactButton.innerHTML=("contact now");
        contactButton.addEventListener("click",btnContactClicked);
        descDiv.appendChild(textaboutcafe);
        descDiv.appendChild(contactButton);
        mainImgDiv.appendChild(descDiv);
        mainDiv.appendChild(mainImgDiv);
        }
        BodyLoad.appendChild(mainDiv);

        }

function btnContactClicked(){
window.location.href="brewersdynamic.php?id="+this.id;
console.log(this.id);

}
</script>
</html>