<!--The require once keyword embeds php code from another file -->
<?php 
require_once('includes/heads.php');
?>

<div class="container">
<div class="row">
<div class="col-lg-6 m-auto" >
<div class="mt-5">
<img src="images/17408.jpg" width="150" height="150" class="d-flex m-auto" style="border-radius:50%;">
<!--flexible and extensible container -->
<div class="card">
<div class="card-title bg-white rounded top">
<h3 style="text-align: center; margin-top: 10px;">Passenger Record Dashboard</h3>
</div>
<?php
$Message = "";
   if(isset($_GET['empty']))
   {
    $Message = "Please fill in the blanks";
    echo '<div class="alert alert-danger text-center">'.$Message.'</div>';
   }

   if(isset($_GET['words']))
   {
    $Message = "Please enter valid characters";
    echo '<div class="alert alert-danger text-center">'.$Message.'</div>';
   }

   if(isset($_GET['tickettaken']))
   {
    $Message = "Sorry Ticket already taken";
    echo '<div class="alert alert-danger text-center">'.$Message.'</div>';
   }

   if(isset($_GET['contacttaken']))
   {
    $Message = "Sorry Contact already taken";
    echo '<div class="alert alert-danger text-center">'.$Message.'</div>';
   }

   if(isset($_GET['Invalid_Format']))
   {
    $Message = "Invalid Format";
    echo '<div class="alert alert-danger text-center">'.$Message.'</div>';
   }
   
   if(isset($_GET['toolarge']))
   {
    $Message = "Image size too large";
    echo '<div class="alert alert-danger text-center">'.$Message.'</div>';
   }

   if(isset($_GET['success']))
   {
    $Message = "Recording successful";
    echo '<div class="alert alert-success text-center">'.$Message.'</div>';
   }

?>
<div class="card-body">
<!--form section allows to enter data to be sent to server -->
<!--enctype specifies an encoding type -->
<form action="recordphp.php" method="POST" enctype="multipart/form-data">
<!--Button to upload profile -->
<label class="btn btn-primary">
Upload Image<input type="file" style="display:none" name="image"> 
</label>
<br>
<br>
<input type="text" placeholder="First Name" name="F_Name" class="form-control mb-2">

<input type="text" placeholder="Last Name" name="L_Name" class="form-control mb-2">

<select name="gender" class="form-control">
<option value="null"></option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
<br>
<input type="date" placeholder="DD/MM/YYYY" name="date" class="form-control mb-2">

<input type="text" placeholder="Ticket Number" name="T_Number" class="form-control mb-2">

<input type="tel" placeholder="Emergency Contact" name="E_contact" class="form-control mb-2">

 <b>Station :</b>  <input list="Stations" name="Stations" style="width: 500px;"> 
<datalist id="Stations">
<option value="Tarkwa - Takoradi"></option>
<option value="Tarkwa - Kumasi"></option>
<option value="Tarkwa - Mankessim"></option>
<option value="Tarkwa - Accra"></option>
<option value="Tarkwa - Bogoso"></option>
<option value="Tarkwa - Tamale"></option>
<option value="Tarkwa - Koforidua"></option>
</datalist>
<br>
<br>
<input type="text" placeholder="Car Number" name="C_Number" class="form-control mb-2">

<input type="text" placeholder="Destination" name="Destination" class="form-control mb-2">

<input type="time" placeholder="Arrival Time" name="A_Time" class="form-control mb-2">

<input type="time" placeholder="Departure Time" name="D_Time" class="form-control mb-2">
<br>
<button class="btn btn-success" name="record">RECORD</button>
</form>
</div>

</div>
</div>


</div>

</div>

</div>
<?php require_once('includes/foot.php');?>