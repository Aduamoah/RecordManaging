<?php
require_once('includes/connection.php');
if(isset($_GET['Del']))
{
   $DelID =$_GET['Del'];
   $query = "select * from passengerdetails where ID='".$DelID."'";
   $result = mysqli_query($con,$query);

   while($row = mysqli_fetch_assoc($result))
   {
     $image = $row['image'];
   }
   $delquery = "delete from passengerdetails where ID ='".$DelID."'";
   $resultquery = mysqli_query($con,$delquery);

   if($resultquery)
   {
       unlink("images/$image");
       header("location:panel.php");
   }
   else
   {
       echo 'Something is Wrong';
   }
}

?>