<?php
//session_start();
include("DbConfig.php");
date_default_timezone_set('Asia/Kolkata');

      
//echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
  if ( isset( $_POST['submit'] ) ) {
    $name=$_POST["name"];
    $surname=$_POST["surname"];
    $email=$_POST["email"];
    $phonenumber=$_POST["phonenumber"];
    $office=$_POST["office"];
    $Reg_no=$_POST["kmcR-no"];
    $Membership_no=$_POST["koaMembership-no"];
    $Aname=$_POST["acompany-per-name"];
    $relationship=$_POST["relationship"];
    $Aemail=$_POST["acompany-per-email"];
    $Aphone=$_POST["acompany-per-phone"];
    $address=$_POST["address"];
    $city=$_POST["city"];
    $zip=$_POST["zip-code"];
    $state=$_POST["state"];
    $country=$_POST["country"];
    $packageCode=$_POST["package"];
    $totalPrice=$_POST["price"];
                    
   }else{
    echo "error sending data";
   }
           
           
 $x=$_SESSION["package"];
 $query2= "SELECT  `package_name` FROM `packages_tbl` WHERE `package_id`='$x'";
 $result = $conn->query($query2);
   if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) 
          {
               $packagename=$row["package_name"] ; 
          } 
   }
   else {
        echo  $query . "<br>" . $conn->error;
      }
unset($_SESSION["package"]);
unset($_SESSION["ticket_id"]);
        
$_SESSION["package"]=$packagename;
// $ticketId=uniqid(KOA);
$ticketId=generateOid();
$_SESSION["ticket_id"]=$ticketId;
$y=$_SESSION["package"];
$z= $_SESSION["workshopName"];
$m= $_SESSION["firstAcPerson"];
$n=$_SESSION["secondAcPerson"];
// echo "after ".($_SESSION["ticket_id"]);
        
//echo $ticketId;
$tprice= $_SESSION["ticket_price"] ;
//$date=date("Y-m-d H:i:s");
//$purchasedate=$_SESSION["date"];
$purchasedate=date("Y-m-d H:i:s");

  $query="insert into tickets_tbl(ticket_id,name,surname,email,phonenumber,office,kmcR_no,koaMembership_no,address,city,zip_code,state,country,packagename,workshopname,acperson1,acperson2,ticket_price,purchase_date) values ('$ticketId','$name','$surname','$email','$phonenumber','$office','$kmcR_no','$koaMembership_no','$address','$city','$zip','$state','$country','$y','$z','$m','$n','$tprice','$purchasedate')"; 
 //$query="insert into tickets_tbl(ticket_id,acompany_per_name,relationship,acompany_per_email,acompany_per_phone,name,surname,email,phonenumber,office,kmcR_no,koaMembership_no,address,city,zip_code,state,country,packagename,workshopname,acperson1,acperson2) values ('$ticketId','$Aname','$relationship','$Aemail','$Aphone','$name','$surname','$email','$phonenumber','$office','$kmcR_no','$koaMembership_no','$address','$city','$zip','$state','$country','$y','$z','$m','$n')";
     
if ($conn->query($query) === TRUE) {
 // echo "New record created successfully";
  // echo $_SESSION["ticket_id"];
   
  // addtocart();

  
} else {
   echo "Error: " . $query . "<br>" . $conn->error;
}
//echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
           
          
          
         

  /*function addtocart(){
      
          //echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';  
         header("Location:http://koacon2019.com/onlineregistration/ccavenue/dataFrom.php");
         exit();
         return;

  }*/
  
  function generateOid($digits = 4){
    $i = 0; //counter
    $id = ""; //our default pin is blank.
    while($i < $digits){
        //generate a random number between 0 and 9.
        $id .= mt_rand(0, 9);
        $i++;
    }
     $id="KOA201900".$id;
     return $id;
}

  if(isset($_SESSION["ticket_price"])){
          header("Location:ccavenue/dataFrom.php");
        }


         

          
          $conn->close();
          



?>