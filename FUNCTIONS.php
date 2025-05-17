<?php

require_once('dbconnection.php');
session_start();
//test();

function getCafe(){
    global $conn;
    $cafeImg=array();
    $cafeid=array();
    $cafeDesc=array();
    $stmt=$conn->prepare("SELECT * FROM `cafes`");
    if($stmt){
      if($stmt->execute()){
      $result=$stmt->get_result();
      while( $row=$result->fetch_assoc()){
        array_push($cafeImg,$row['image']);
        array_push($cafeid,$row['id']);
      $cafedescription=$row['name']. "<br>". $row['rating']." stars <br>".$row['contact'];
      array_push($cafeDesc,$cafedescription);
       }
       $finalArray=array("imgArray"=>$cafeImg,"descArray"=>$cafeDesc,"id"=>$cafeid);
       return $finalArray;
      }
   }
}

function getHallDesc($hallid){
  
    $cafes=getcafes($hallid);
    $cafeName=$cafes['name'];
    $cafeAddress=$cafes['address'];
    $amiIconsArr=getAminities($hallid)['image'];
    $amiDescArr=getAminities($hallid)['desc'];
    $subImgArr=getsmallimg($hallid);
    $ratingavg=getRatings($hallid);
    $ratingText="";
    for($i=0;$i<$ratingavg;$i++){
     $ratingText=$ratingText."⭐";
    }
    $ratingArr=$ratingText."($ratingavg)";
    $usernameArr=getReviews($hallid)['usernameArr'];
    $reviewArr=getReviews($hallid)['reviewsArr'];


    $finalArray=array("hallPrice"=> $cafes['price'],"CafeMainImage"=>$cafes['image'], "amiIconsArr"=>$amiIconsArr,"amiDescArr"=>$amiDescArr,"subImgArr"=>$subImgArr,"ratingStarsArr"=>$ratingArr,"usernameArr"=>$usernameArr,"reviewArr"=>$reviewArr,"hallDName"=>$cafeName,"hallDAddress"=>$cafeAddress);
    return $finalArray;

  }


  function getHallBookingStatus($hallid){
    
    $cafes=getcafes($hallid);
    $hallName=$cafes['name'];
    $hallAddress=$cafes['address'];
    $price=$cafes['price'];
    $hallimage=$cafes['image'];
    $bookingdates=getBookDate($hallid);

   $finalArray=array("hallName"=>$hallName,"hallAddress"=>$hallAddress,"price"=>$price,"bookingdates"=>$bookingdates,"hallimage"=>$hallimage);
   return $finalArray;
  }

function getsmallimg($hallid){
  
  global $conn;
  $subImgArr=array();  
    $stmt=$conn->prepare("SELECT simage FROM `smallimages` where hallid=?");
    if($stmt){
      $stmt->bind_param('i',$hallid);
      if($stmt->execute()){
      $result=$stmt->get_result();
      while( $row=$result->fetch_assoc()){
        array_push($subImgArr,$row['simage']);
      }
      return $subImgArr;
      }
   }
}

function getcafes($hallid){
    global $conn;
      $stmt=$conn->prepare("SELECT * FROM `cafes`where id=?");
      if($stmt){
        $stmt->bind_param('i',$hallid);
        if($stmt->execute()){
        $result=$stmt->get_result();
        $row=$result->fetch_assoc();
        return $row;
        }          
        }
     }
  
     function getAminities($hallid){
      global $conn;
      $aminityIcons=array();
      $aminityDesc=array();
     $stmt=$conn->prepare("SELECT aminities.* FROM `cafeaminities` INNER JOIN cafes ON cafeaminities.hallid=cafes.id INNER JOIN aminities ON cafeaminities.aminitiesid=aminities.id where cafes.id=?");
    if($stmt){
      $stmt->bind_param('i',$hallid);
      if($stmt->execute()){
        $result= $stmt->get_result();
        while($row= $result->fetch_assoc()){
          array_push($aminityIcons,$row['image']);
          array_push($aminityDesc,$row['desc']);
        }
        $finalArray=array("image"=>$aminityIcons,"desc"=>$aminityDesc);
        return $finalArray;
      }
    }
  }

  function getReviews($hallid){
    global $conn;
    $usernameArr = array();
    $reviewsArr = array();      
   $stmt=$conn->prepare("SELECT * FROM `reviews` INNER JOIN login ON reviews.userid=login.id WHERE reviews.hallid=?");
  if($stmt){
    $stmt->bind_param('i',$hallid);
    if($stmt->execute()){
      $result= $stmt->get_result();
      while($row= $result->fetch_assoc()){
        array_push($usernameArr,$row['username']);
        array_push($reviewsArr,$row['review']);
      }
      $finalArray=array("usernameArr"=>$usernameArr,"reviewsArr"=>$reviewsArr);
      return $finalArray;
}
  }
}

function getRatings($hallid){
  global $conn;     
 $stmt=$conn->prepare("SELECT AVG(rating) AS ratingavg FROM `reviews` WHERE hallid=?");
if($stmt){
  $stmt->bind_param('i',$hallid);
  if($stmt->execute()){
    $result= $stmt->get_result();
    $row= $result->fetch_assoc();
    
    return $row['ratingavg'];
  }
}
}

function getBookDate($hallid){
  global $conn;  
  $bookingDates=array();   
 $stmt=$conn->prepare("SELECT bookdate FROM `bookingdate` WHERE hallid=?");
if($stmt){
  $stmt->bind_param('i',$hallid);
  if($stmt->execute()){
    $result= $stmt->get_result();

    while($row= $result->fetch_assoc()){
      array_push($bookingDates,$row['bookdate']);
    }
    
    return $bookingDates;
  }else{
    echo "Execute Error";
  }
}else{
  echo "Prepare Error";
}
}


function getUser($username){
  global $conn;    
 $stmt=$conn->prepare("SELECT * FROM `login` WHERE username=?");
if($stmt){
  $stmt->bind_param('s',$username);
  if($stmt->execute()){
    $result= $stmt->get_result();
    $row= $result->fetch_assoc(); 
    
    return $row;
  }else{
    echo "Execute Error";
  }
}else{
  echo "Prepare Error";
}
}

function singUp($username,$password,$phone){
  global $conn;  
  $password=md5($password);

 $stmt=$conn->prepare("INSERT INTO login(username,password,phoneno) VALUES(?,?,?)");
if($stmt){
  $stmt->bind_param('sss',$username,$password,$phone);
  if($stmt->execute()){
   

    return 1;
  }else{
    return 0;
  }
}else{
  return 0;
}

}

function signIn($username,$password){
  global $conn;  
  $password=md5($password);
 $stmt=$conn->prepare("SELECT COUNT(*) as usercount FROM `login` WHERE username=? AND password=?");
if($stmt){
  $stmt->bind_param('ss',$username,$password);
  if($stmt->execute()){
    $result= $stmt->get_result();
    $row= $result->fetch_assoc();
    $usercount=$row['usercount'];
 if($usercount==1){
  $user=getUser($username);
  $_SESSION['user']= $user;
  $_SESSION['login']=true;
      return 1;
 }else{
  return 2;
 }
  }else{
    return 0;
  }
}else{
  return 0;
}
}

?>