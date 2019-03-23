<?php
include("DbConfig.php");
if ( isset( $_POST['submit'] ) ) {

     $packageId=$_POST["package"];
     $checkAccompany=$_POST["checkAccompany"];

     //echo $packageId;
     //echo $checkAccompany;
}
else{

//echo "error sending  data";
}

date_default_timezone_set('Asia/Kolkata');
$DOfReg=date("Y-m-d H:i:s");     // 2019-04-23 23:50:11
//echo "presebt day".$DOfReg;
//$query="SELECT price FROM `price_tbl` WHERE (package_id='$package' AND date='$date')";
//SELECT `price` FROM `price` WHERE `package _id`=1 AND `start_date`< '2019-03-24 00:40:21' AND `end_date`> '2019-03-24 00:40:21'
$query = " SELECT `price` FROM `price` WHERE `package _id`= $packageId  AND  `start_date`<'$DOfReg'  AND `end_date`> '$DOfReg' " ;
          
          $result = $conn->query($query);
         
 
           if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) 
                  {
                       $price=$row["price"] ; 
                       
                  } 
                  //echo "my total price".$price;
                  echo "<script type='text/javascript'>window.location.href = 'http://localhost?price=$price;</script>";
           }
          

          else {
                //echo "Error: " . $query . "<br>" . $conn->error;
              }
         

?>