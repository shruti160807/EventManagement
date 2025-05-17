<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://code.jquery.com/jquery-3.6.4.js"></script>
</head>
<body style="background-image:url(backg1.jpg);"id="BodyLoad">
  <div class="w3-top w3-hide-small">
    </div>
    <div class="container-fluid ">
         <!--Nav Bar-->
     <?php
     require_once('layouts/navigation_bar.php');
     ?>      
        </div>

</body>
<script>
var hallid="";
$( document ).ready(function() {
   hallid=getHallId();
  console.log(hallid);

  $.ajax({
        url: 'result.php',
        type: 'POST',
        data:  {"AJAX_REQ":"GET_CAFE_DESC","HALL_ID":hallid},
        success: function(response){   
        var jobj=JSON.parse(response);
        
        console.log(jobj);
        createDynamicUI(jobj.amiIconsArr,jobj.amiDescArr,jobj.subImgArr,jobj.ratingStarsArr,jobj.usernameArr,jobj.reviewArr,jobj.hallDName, jobj.hallDAddress,jobj.CafeMainImage);
   }
  });
});
    //var hallid; 
    function changeImage() {
      mainImage.src = this.src;
    }
    function bookNow() {
      window.location.href = "bookingdynamic.php?hallid=" + hallid;
    }

    function mainBody(){
      
      createDynamicUI();
    }
    function getHallId(){
      const queryString = window.location.search; 
      const urlParams = new URLSearchParams(queryString); 
      var hallid = urlParams.get("id"); 
      return hallid;
    }

    function createDynamicUI(amiIconsArr,amiDescArr,subImgArr,ratingArr,usernameArr,reviewArr, hallDName, hallDAddress,CafeMainImage) {
    console.log(reviewArr);
   var containerDiv = document.createElement("div");
      containerDiv.classList.add("container-fluid");
      var rowDiv = document.createElement("div");
      rowDiv.classList.add("row");
      //Image Coloumn
      var imgCol = document.createElement("div");
      imgCol.classList.add("col-7");
      imgCol.style.textAlign = "center";
      var mainImage = document.createElement("img");
      mainImage.src =CafeMainImage;
      mainImage.style.width = "500px";
      mainImage.style.height = "400px";
      mainImage.style.marginTop = "20px";
      mainImage.id = "mainImage";
      imgCol.appendChild(mainImage);


      //small image
      var smallImageDiv = document.createElement("div");
      smallImageDiv.style=" margin-top:20px;margin-right:50px;margin-left:50px;"
      smallImageDiv.classList.add("flex-container");
      for (var i = 0; i < subImgArr.length; i++) {
        var smallImage = document.createElement("div");
        smallImage.classList.add("flex-items");
        smallImage.style.marginLeft = "10px";
        var smallImage1 = document.createElement("img");
        smallImage1.src =  subImgArr[i];
        smallImage1.classList.add("img-small-image");
        smallImage1.style="margin-bottom:30px;"
        smallImage1.addEventListener("click", changeImage);
        smallImage.appendChild(smallImage1);
        smallImageDiv.appendChild(smallImage);
      }

      imgCol.appendChild(smallImageDiv);
      rowDiv.appendChild(imgCol);

      //Description column

      var descCol = document.createElement("div");
       descCol.style="border: 2px solid red; border-radius: 20px; background-color:hsl(0,0%,80%); margin-top:20px; margin-left:-10px;"
      descCol.classList.add("col-5");
      var headingFlex = document.createElement("div");
      headingFlex.classList.add("flex-container");
      var head1 = document.createElement("div");
      head1.classList.add("flex-items");
      var hallName = document.createElement("h2");
      hallName.innerHTML =hallDName;
      hallName.style=("color:black; font-weight: bold;");
      var hallAddress = document.createElement("p");
      hallAddress.style="text-align:left; font-size:15px; color:black; font-weight: bold;";
      hallAddress.innerHTML =hallDAddress;
      head1.appendChild(hallName);
      head1.appendChild(hallAddress);
      headingFlex.appendChild(head1);

      var head2 = document.createElement("div");
      head2.classList.add("flex-items");
      var bookNowButton = document.createElement("button");
      bookNowButton.innerHTML = "Book Now";
      bookNowButton.classList.add("btn");
      bookNowButton.classList.add("btn-success");
      bookNowButton.addEventListener("click", bookNow);
      head2.style.marginLeft = "280px";
      head2.style.marginTop = "35px";
      head2.appendChild(bookNowButton);
      headingFlex.appendChild(head2);
      descCol.appendChild(headingFlex);


      //Aminities Div
      var aminityDiv = document.createElement("div");
      var aminityPara = document.createElement("p");
      aminityPara.style =
        "font-weight: bold; color:black; font-size: 15px; margin-top:5px";
      aminityPara.innerHTML = "Aminities";
      aminityDiv.appendChild(aminityPara);
      descCol.appendChild(aminityDiv);
      var aminityIconDiv = document.createElement("div");
      aminityIconDiv.style="margin-top:5px;"
      aminityIconDiv.classList.add("flex-container");
      aminityIconDiv.style.flexWrap = "wrap";
      for (var i = 0; i <amiIconsArr.length; i++) {
        aminityIconDiv.id = "amiIcons";
        var aminityIconItem = document.createElement("div");
        aminityIconItem.classList.add("flex-items");
        aminityIconItem.style="margin-top:-50px ";
        var amiIcon = document.createElement("img");
        amiIcon.src =  amiIconsArr[i];
        amiIcon.classList.add("img-icon");
        var amiDesc = document.createElement("p");
        amiDesc.classList.add("aminities");
        amiDesc.innerHTML = amiDescArr[i];
        amiDesc.style="color:black; font-weight: bold; margin-top:-45px;"
        aminityIconItem.appendChild(amiIcon);
        aminityIconItem.appendChild(amiDesc);
        aminityIconDiv.appendChild(aminityIconItem);
      }
       descCol.appendChild(aminityIconDiv);

       var ratingMaindiv=document.createElement("div");
       ratingMaindiv.classList.add("flex-container");
       var ratingdiv=document.createElement("p");
      ratingdiv.innerHTML="Ratings:";
      ratingdiv.classList.add("flex-items");
      ratingdiv.style="color:black; font-weight: bold; font-size: 20px; margin-top:10px;";
      var ratingstar=document.createElement("div");
      ratingstar.classList.add("flex-items");
      ratingstar.style.flexWrap = "wrap";
      ratingstar.innerHTML=ratingArr;
      ratingstar.style=" margin-top:10px;"
      ratingMaindiv.appendChild(ratingdiv);
      ratingMaindiv.appendChild(ratingstar);
      descCol.appendChild(ratingMaindiv);
      
      var userMainDiv=document.createElement("div");
      var userReview=document.createElement("p");
      userReview.style="color:black; font-weight: bold; font-size: 20px";
      userReview.innerHTML="User's Review : ";
      userMainDiv.appendChild(userReview);
      descCol.appendChild(userMainDiv);


      var mainReviewDiv=document.createElement("div");
      mainReviewDiv.classList.add("flex-container");
      for (var i = 0; i<reviewArr.length; i++){
      var imgDiv=document.createElement("div");
      imgDiv.style="margin-top:35px; margin-right:20px;"
      imgDiv.classList.add("flex-items");
      var usericon=document.createElement("img");
      usericon.style="margin-top:-50px";
      usericon.src="user.png";
      usericon.classList.add("img-icon");
      var textdiv=document.createElement("div");
      textdiv.style.width = "80%";
      textdiv.classList.add("flex-items");
      var mainuserdiv=document.createElement("p");
      mainuserdiv.style=" margin-top:-120px; margin-left:-100px;";
      var username="<span class='reviewClass'>" + usernameArr[i] + "</span> <br>";
      var review=reviewArr[i];
      
      mainuserdiv.innerHTML=username + review;
      imgDiv.appendChild(usericon);
      mainReviewDiv.appendChild(imgDiv);
      textdiv.appendChild(mainuserdiv);
      mainReviewDiv.appendChild(textdiv);

    }
      descCol.appendChild(mainReviewDiv);
      rowDiv.appendChild(descCol);
      containerDiv.appendChild(rowDiv);
      BodyLoad.appendChild(containerDiv);
    }
</script>
</html>