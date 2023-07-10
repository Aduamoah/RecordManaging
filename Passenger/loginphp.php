<?php
session_start();
require_once('includes/connection.php');
//when login button is clicked check to see if the fields are empty or not and execute the following commands
if(isset($_POST['login']))
{
  if(empty($_POST['email']) || empty($_POST['password']))
  {
      // if fields are empty the get variable empty will display message
      header("location:login.php?Empty");
  }
  else
  {
      // get data from text field
      $Email = mysqli_real_escape_string($con,$_POST['email']);
      $Password = mysqli_real_escape_string($con,$_POST['password']);
      $query = "select * from adminlogin where AdminEmail = '".$Email."' and AdminPassword = MD5('".$Password."')";
      $result = mysqli_query($con,$query);
      // if adminemail and password entered are in the database execute the if condition below
      if($row = mysqli_fetch_assoc($result))
      {  $_SESSION['admin'] =$row['AdminPassword'];
          header("location:panel.php");
      }
      // if not found in database execute the else condition
      else
      {
          header("location:login.php?login_invalid");
      }
  }
}
else
{
    header("location:login.php");
}

?>