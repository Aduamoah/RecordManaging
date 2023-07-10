<?php
require_once('includes/connection.php'); 
//setting properties of image
if(isset($_POST['record']))
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
  // echo $FirstName." ".$LastName." ".$Gender." ".$Date." ".$TicketNumber." ".$EmergencyContact." ".$Station." ".$CarNumber." ".$destination." ".$ArrivalTime."".$DepartureTime." ";

  if(empty($FirstName) || empty($LastName) || empty($Gender) || empty($Date) || empty($TicketNumber) || empty($EmergencyContact) || empty($Station) || empty($CarNumber) || empty($destination) || empty($ArrivalTime) || empty($DepartureTime))
  {
    header("location:record.php?empty");
  }
  else
  {
    if(!preg_match("/^[a-z,A-Z]*$/",$FirstName) || !preg_match("/^[a-z,A-Z]*$/",$LastName))
    {
      header("location:record.php?words");
      exit();
    }
    else
    {
      $query = "select * from passengerdetails where T_Number='".$TicketNumber."'";
      $result = mysqli_query($con,$query);

      if(mysqli_fetch_assoc($result))
      {
        header("location:record.php?tickettaken");
        exit();
      }
      else
      {
        $query = "select * from passengerdetails where E_contact='".$EmergencyContact."'";
        $result = mysqli_query($con,$query);
       
        if(mysqli_fetch_assoc($result))
        {
          header("location:record.php?contacttaken");
          exit();
        }
        else
        {
          $Date = date("Y/m/d");
          
          //code for checking image size
          if(in_array( $TrueExt,$AllowImg))
          {
              if($size<2000000)
              {
                $query = "insert into passengerdetails(image,F_Name,L_Name,gender,date,T_Number,E_contact,Station,C_Number,Destination,A_Time,D_Time) values ('$Image','$FirstName','$LastName','$Gender','$Date','$TicketNumber','$EmergencyContact','$Station','$CarNumber','$destination','$ArrivalTime','$DepartureTime')";
                mysqli_query($con,$query);
                move_uploaded_file($Temp,$Target);
                header("location:record.php?success");
                exit();
               }
               else
               {
                header("location:record.php?toolarge");
                exit();
               }
              }
           else
              {
                 header("location:record.php?Invalid_Format");
                 exit();
              }
          
        }
        }


      }
    }
  }
else
{
    header("location:record.php");
}

?>