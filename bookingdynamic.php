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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>
<body  style="background-image:url(backg1.jpg);" id="BodyLoad">
    <div class="w3-top w3-hide-small">
</div>
        <div class="container-fluid ">
        <!--Nav Bar-->
     <?php
     require_once('layouts/navigation_bar.php');
     ?>      </div>
</body>

<script>
var jobj="";
var hallid="";
$( document ).ready(function() {
 hallid=getHallId();
  console.log(hallid);
$.ajax({
        url: 'result.php',
        type: 'POST',
        data:  {"AJAX_REQ":"GET_CAFE_BOOKING_STATUS","HALL_ID":hallid},
        success: function(response){ 
          console.log(response); 
        jobj=JSON.parse(response);
        mainBody(jobj);
   }
  });
});

function getHallId(){
      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString); 
      var hallid = urlParams.get("hallid"); 
      return hallid;
    }

    function mainBody(jobj) {
    console.log(jobj);
        //heading
        var head = document.createElement("h2");
        head.innerHTML = "Confirm Booking";
        head.style = "text-align: center; color: white; margin-top:30px; font-size:35px; font-weight: bold;";
        BodyLoad.appendChild(head);
  
        //mainContainer
        var mainContainer = document.createElement("div");
        mainContainer.classList.add("container");
        mainContainer.style =
          "margin-top:20px; border: 2px solid rgb(250, 155, 230);border-radius: 15px;background-color:hsl(0, 0%, 80%);";
  
        //row
        var mainRow = document.createElement("div");
        mainRow.classList.add("row");
        //image
        var imgCol = document.createElement("div");
        imgCol.classList.add("col-3");
        var mainImg = document.createElement("img");
        mainImg.src =jobj.hallimage;
        console.log(jobj.hallimage);
        mainImg.style = "width:400px; height:300px; padding: 25px";
        imgCol.appendChild(mainImg);
        mainRow.appendChild(imgCol);
  
        //desc
        var emptyCol = document.createElement("div");
        emptyCol.classList.add("col-1");
        mainRow.appendChild(emptyCol);
  
        var descDiv = document.createElement("div");
        descDiv.classList.add("col-8");
  
        var titleDiv = document.createElement("div");
        titleDiv.classList.add("mt-4");
  
        var hallTitle = document.createElement("h2");
        hallTitle.style = "font-weight: bold";
        hallTitle.innerHTML =jobj.hallName;
        hallTitle.style=("color:black; font-weight: bold;");
        var hallAdd = document.createElement("p");
        hallAdd.innerHTML =jobj.hallAddress;
        hallAdd.style=("color:black; font-weight: bold; font-size: 20px;");
        var hallPrice = document.createElement("h4");
        hallPrice.innerHTML = "Rs"+jobj.price +"/-";
        hallPrice.style = "color: black; font-size: 20px; font-weight: bold";
  
        titleDiv.appendChild(hallTitle);
        titleDiv.appendChild(hallAdd);
        titleDiv.appendChild(hallPrice);
        descDiv.appendChild(titleDiv);
  
        var dateDiv = document.createElement("div");
        dateDiv.classList.add("flex-container");
        var dateItemDiv = document.createElement("div");
        dateItemDiv.classList.add("flex-items");
        var dateParaDiv = document.createElement("p");
        dateParaDiv.innerHTML = "Select Event Date";
        var eventDate = document.createElement("input");
        eventDate.type = "date";
        eventDate.id = "eventDate";
  
        dateItemDiv.appendChild(dateParaDiv);
        dateItemDiv.appendChild(eventDate);
        dateDiv.appendChild(dateItemDiv);
        descDiv.appendChild(dateDiv);
  
        var buttonItemDiv = document.createElement("div");
        buttonItemDiv.classList.add("flex-items");
        buttonItemDiv.style="margin-left:20px";
        var statusButton = document.createElement("button");
        statusButton.classList.add("btn");
        statusButton.classList.add("btn-primary");
        statusButton.style = "margin-top:30px; ";
        statusButton.innerHTML = "Check Availability";
        statusButton.addEventListener("click", checkAvailiblity);
        var messagePara = document.createElement("p");
        messagePara.id = "message";
        messagePara.classList.add("text-left");
        messagePara.classList.add("font-weight-bold");
  
        buttonItemDiv.appendChild(statusButton);
        buttonItemDiv.appendChild(messagePara);
        dateDiv.appendChild(buttonItemDiv);
        descDiv.appendChild(dateDiv);
        mainRow.appendChild(descDiv);
        mainContainer.appendChild(mainRow);
  
        var secondRow = document.createElement("div");
        secondRow.classList.add("row");
        secondRow.classList.add("mb-4");
  
        var secondButtonDiv = document.createElement("div");
        secondButtonDiv.classList.add("col");
        secondButtonDiv.classList.add("text-center");
  
        var confirmButton = document.createElement("button");
        confirmButton.classList.add("btn");
        confirmButton.classList.add("btn-success");
        confirmButton.disabled = true;
        confirmButton.id = "btnConfirm";
        confirmButton.dataTarget = "confirmationModal";
        confirmButton.innerHTML = "Confirm Booking";
        confirmButton.addEventListener("click", makePayment);
  
        secondButtonDiv.appendChild(confirmButton);
        secondRow.appendChild(secondButtonDiv);
        mainContainer.appendChild(secondRow);
  
        BodyLoad.appendChild(mainContainer);
    }
  
      function checkAvailiblity() {
        console.log(eventDate.value);
      if (eventDate.value == "") {
        //invalid date
        message.style.color = "red";
        message.innerHTML = "Please select valid event date";
      } else {
        //valid date
        if (eventDate.value == "2023-03-28" && "2023-03-29") {
          //check available date
          message.style.color = "red";
          message.innerHTML = "Booking Already Full";
          btnConfirm.disabled = true;
        } else {
          message.style.color = "green";
          message.innerHTML = "Booking  Available";
          btnConfirm.disabled = false;
        }
      }
      }
      function makePayment() {
        window.location.replace("jsdyanamic.php");
      }
</script>
</html>