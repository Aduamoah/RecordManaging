<?php
require_once('includes/connection.php');
if(isset($_POST['update']))
{
  $Image = $_FILES['image']['name'];
  $Type = $_FILES['image']['type'];
  $Temp = $_FILES['image']['tmp_name'];
  $size = $_FILES['image']['size'];

  

//function for converting strings into array 
  $Ext = explode('.',$Image);
  $TrueExt = (strtolower(end($Ext)));
  $AllowImg = array('jpg','jpeg','png');
  $Target = "images/".$Image;
  
  $FirstName = mysqli_real_escape_string($con,$_POST['F_Name']);
  $LastName = mysqli_real_escape_string($con,$_POST['L_Name']);
  $Gender = mysqli_real_escape_string($con,$_POST['gender']);
  $Date = mysqli_real_escape_string($con,$_POST['date']);
  $TicketNumber = mysqli_real_escape_string($con,$_POST['T_Number']);
  $EmergencyContact = mysqli_real_escape_string($con,$_POST['E_contact']);
  $Station = mysqli_real_escape_string($con,$_POST['Stations']);
  $CarNumber = mysqli_real_escape_string($con,$_POST['C_Number']);
  $destination = mysqli_real_escape_string($con,$_POST['Destination']);
  $ArrivalTime = mysqli_real_escape_string($con,$_POST['A_Time']);
  $DepartureTime = mysqli_real_escape_string($con,$_POST['D_Time']);

  $GetID = $_GET['ID'];
  $queryimage = "select * from passengerdetails where ID='".$GetID."'";
  $resultimage = mysqli_query($con,$queryimage);

  if(empty($FirstName) || empty($LastName) || empty($Gender) || empty($Date) || empty($TicketNumber) || empty($EmergencyContact) || empty($Station) || empty($CarNumber) || empty($destination) || empty($ArrivalTime) || empty($DepartureTime))
  {
     echo 'Please fill in the blanks';
  }
  else
  {
    if(!preg_match("/^[a-z,A-Z]*$/",$FirstName) || !preg_match("/^[a-z,A-Z]*$/",$LastName))
    {
      echo 'Please enter valid characters';
      
    }
    else
    {
      while($row = mysqli_fetch_assoc($resultimage))
      {
         $OldImage = $row['image']; 
      }
        if(in_array( $TrueExt,$AllowImg))
        {
            if($size<2000000)
            {
              unlink("images/$OldImage");
              $query = "update passengerdetails set image='".$Image."', F_Name='".$FirstName."', L_Name='".$LastName."', gender='".$Gender."', date='".$Date."', T_Number='".$TicketNumber."', E_contact='".$EmergencyContact."', Station='".$Station."',C_Number='".$CarNumber."', Destination='".$destination."', A_Time='".$ArrivalTime."', D_Time='".$DepartureTime."' where ID='".$GetID."'";
              mysqli_query($con,$query);
              move_uploaded_file($Temp,$Target);
              header("location:panel.php");
              exit();
             }
             else
             {
               echo 'Image size too Large';
             }
         }
        
    }
  }
  
}
else
{
   header("location:panel.php");
}

?>