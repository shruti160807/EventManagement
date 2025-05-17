<?php

$ajax_req= $_POST["AJAX_REQ"];

if($ajax_req==1){
$categories=array("Fruits","Car","Bike");
$jsonString=json_encode($categories);
print_r($jsonString);
}elseif(){

$cat=$_POST["CAT"];
if($cat=="Fruits"){
  $Subcategories=array("Mango","Apple");
  $jsonString=json_encode($Subcategories);
  print_r($jsonString);
}elseif($cat=="Car"){
  $Subcategories1=array("Waganor","Swift");
  $jsonString=json_encode($Subcategories1);
  print_r($jsonString);
}else{
  $Subcategories2=array("Activa","Hero");
  $jsonString=json_encode($Subcategories2);
  print_r($jsonString);
}
}


?>

