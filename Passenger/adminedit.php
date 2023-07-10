<?php 
require_once('includes/up.php');
require_once('includes/connection.php');

if(isset($_GET['edit']))
{
    $GetID = $_GET['edit'];
    $query = "select * from passengerdetails where ID = '".$GetID."'";
    $result = mysqli_query($con,$query);

    while($row = mysqli_fetch_assoc($result))
    {
        $ID = $row['ID'];
        $Image = $row['image'];
        $Firstname = $row['F_Name'];
        $Lastname = $row['L_Name'];
        $Gender = $row['gender'];
        $Date = $row['date'];
        $Ticketnumber = $row['T_Number'];
        $Emergencycontact = $row['E_contact'];
        $station = $row['Station'];
        $Carnumber = $row['C_Number'];
        $destination = $row['Destination'];
        $Arrivaltime = $row['A_Time'];
        $Departuretime = $row['D_Time'];
    }
}

?>

<div class="container">
<div class="row">
<div class="col-lg-6 m-auto" >
<div class="mt-5">
<img src="images/17408.jpg" width="200" height="200"  class="d-flex m-auto" style="border-radius:50%;"class="img-thumbnail">
<!--flexible and extensible container -->
<div class="card">
<div class="card-title bg-white rounded top">
<h3 style="text-align: center; margin-top: 10px;">Update Passenger Records</h3>
</div>
<div class="card-body">
<!--form section allows to enter data to be sent to server -->
<!--enctype specifies an encoding type -->
<form action="update.php?ID=<?php echo $ID  ?>" method="POST" enctype="multipart/form-data">
<!--Button to upload profile -->

<label class="btn btn-primary">
Upload Image<input type="file" style="display:none" name="image"> 
</label>
<!-- this shows the image of the passenger already recorded -->
<img src="images/<?php echo $Image ?>" width="200" height="200" class="img-thumbnail mb-3" >
<br>
<!--the value keyword implemented will display the alredy entered data that you wish to update -->
<input type="text" placeholder="First Name" name="F_Name" class="form-control mb-2" value="<?php echo $Firstname ?>">

<input type="text" placeholder="Last Name" name="L_Name" class="form-control mb-2" value="<?php echo $Lastname ?>">

<select name="gender" class="form-control" value="<?php echo $Gender ?>" >
<?php
if($Gender=="Male")
{
    echo '<option value="Male">Male</option>
          <option value="Female">Female</option>';
}
else
{
    echo '<option value="Female">Female</option>
          <option value="Male">Male</option>';
}
?>
</select>
<br>
<input type="date" placeholder="DD/MM/YYYY" name="date" class="form-control mb-2" value="<?php echo $Date ?>">

<input type="text" placeholder="Ticket Number" name="T_Number" class="form-control mb-2" value="<?php echo $Ticketnumber ?>">

<input type="tel" placeholder="Emergency Contact" name="E_contact" class="form-control mb-2" value="<?php echo $Emergencycontact ?>">

 <b>Station :</b>  <input list="Stations" name="Stations" style="width: 500px;" value="<?php echo $station ?>"> 
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
<input type="text" placeholder="Car Number" name="C_Number" class="form-control mb-2" value="<?php echo $Carnumber ?>">

<input type="text" placeholder="Destination" name="Destination" class="form-control mb-2" value="<?php echo $destination ?>">

<input type="time" placeholder="Arrival Time" name="A_Time" class="form-control mb-2" value="<?php echo $Arrivaltime ?>">

<input type="time" placeholder="Departure Time" name="D_Time" class="form-control mb-2" value="<?php echo $Departuretime ?>">
<br>
<button class="btn btn-success" name="update">UPDATE</button>
</form>
</div>

</div>
</div>


</div>

</div>

</div>



<?php require_once('includes/foot.php'); ?>