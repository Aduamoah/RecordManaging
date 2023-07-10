<?php 
require_once('includes/up.php');
require_once('includes/connection.php');

if(!isset($_SESSION))
{
    session_start();
    $query = "select * from  passengerdetails";
    $result = mysqli_query($con,$query);
}
else
{
    header("location:login.php");
}

?>

<div class="container">
<div class="row">
<div class="col">
<div class="card bg-dark text-white mt-5"> 
    <h3 class="text-center py-3">Admin Panel</h3>
</div>

</div>

</div>
<div>
<div class="row">
<div class="col">
 <div class="card">
 <div class="card-title">

 </div>
 <div class="card-body">
 
 <table class="table table-stripped">
 <tr>
 <a href="record.php" class="btn btn-primary mb-3">RECORD</a>

 <form action="search.php" method="POST">
 <div class="form-inline float-right">
 <input type="text" placeholder="Search Records" class="form-control" name="search">
 <button class="btn btn-success" name="find">Search</button>
 </div>
 </form>
 
 
 </tr>
   <tr>
   <td><b>ID</b></td>
   <td><b>Image</b></td>
   <td><b>FirstName</b></td>
   <td><b>LastName</b></td>
   <td><b>TicketNumber</b></td>
   <td><b>EmergencyContact</b></td>
   <td><b>Destination</b></td>

   </tr>
   <?php 
   while($row = mysqli_fetch_assoc($result))
   {
     $ID = $row['ID'];
     $Image = $row['image'];
     $FirstName = $row['F_Name'];
     $LastName = $row['L_Name'];
     $TicketNumber = $row['T_Number'];
     $EmergencyContact = $row['E_contact'];
     $destination =$row['Destination'];
 ?>
  <tr>
  <td><?php echo $ID ?></td>
  <td><img src="images/<?php echo $Image ?>" class="img-thumbnail" width="200" height="200"></td>
  <td><?php echo $FirstName ?></td>
  <td><?php echo $LastName ?></td>
  <td><?php echo $TicketNumber ?></td>
  <td><?php echo $EmergencyContact ?></td>
  <td><?php echo $destination ?></td>
  <td><a href="adminedit.php?edit=<?php echo $ID ?>" class="btn btn-primary btn-sm">Edit</a></td>
  <td><a href="delete.php?Del=<?php echo $ID ?>" class="btn btn-danger btn-sm">Delete</a></td>
  
  
  
  </tr>
  <?php
    }
  ?>
  </table>
 
 </div>
</div>
 
 </div>
</div>
</div>

</div>

<?php require_once('includes/foot.php');?>


