<?php 
/* 
$a=200;
$b=500;

if($a>$b){
    echo "$a is greater than $b";
}else{
    echo "$b is greater than $a";
}
*//*
$age=112;
switch($age){
case ($age<18):
    echo "You are not eligible to vote";
    break;
 
    case ($age>18):
    echo "You are eligible to vote";
        break;     
}
for($i=0; $i<10; $i++){
    //echo "<h3 style='color:red'>$i</h3>";
echo "<input type='text'>";
}
*/
//associative array
/*
$uname=$_POST['UNAME'];
$pass=$_POST['PASS'];
if($uname=='admin' && $pass=='123'){
    echo "1";
}else{
    echo "0";
}
*/
/*
if($_POST['AJAX_REQ']==1){
echo "Heloo Ajax 1";
}else{
    echo "Heloo Ajax 2";
}*/

//Static Arrays
//Index array
$citiies=array("Amravati","Mumbai","Pune","Nagpur","Yavatmal","Washim");
//Associative Array
$subjects=array("physics"=>55,"english"=>75,"computer"=>80);
//Multi Dimentional  Array (Array contains another array)
$subjects=array("physics"=>55,"english"=>75,"computer"=>80,"cities"=>$citiies);

//Dynamic Arrays
$newcities=array();
array_push($newcities,"Akola"); //creates index array by default
array_push($newcities,"Buldhana");

$dynamicCitiesArray=array(); 
$dynamicCitiesArray['city0']="Nagpur";
$cityKeys=array("city1","city2","city3","city4");
$cityValues=array("Amravati","Mumbai","Pune","Nagpur");

for($i=0; $i<sizeof($cityKeys); $i++){
    $dynamicCitiesArray[$cityKeys[$i]]=$cityValues[$i];
}
$jsonString=json_encode($citiies);

print_r($jsonString);
?>
