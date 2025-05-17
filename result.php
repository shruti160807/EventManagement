<?php

require_once('FUNCTIONS.php'); 


$REQUEST_TYPE=$_POST['AJAX_REQ'];
switch($REQUEST_TYPE){
    case"GET_CAFES":
        $cafe= getCafe();
        $jsonString=json_encode($cafe);
        print_r($jsonString);  
    break;
    case "GET_CAFE_DESC":
        $hallid=$_POST['HALL_ID'];
        $hallDesc=getHallDesc($hallid);
        $jsonString=json_encode($hallDesc);
        print_r($jsonString);

    break;
    case "GET_CAFE_BOOKING_STATUS":
        $hallid=$_POST['HALL_ID'];
        $hallBookingStatus=getHallBookingStatus($hallid);
        $jsonString=json_encode($hallBookingStatus);
        print_r($jsonString);
    break;
    case "SIGN_UP":
        $username= $_POST['USERNAME'];
        $password= $_POST['PASSWORD'];
        $phone=$_POST['PHONE'];
        $result=singUp($username,$password,$phone);
        print_r($result);
    break;
    
    case "SIGN_IN":
        $username= $_POST['USERNAME'];
        $password= $_POST['PASSWORD'];
        $result=signIn($username,$password);
        print_r($result);
    break;
    
}

?>