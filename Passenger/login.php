<?php require_once('includes/head.php') ?>
<div class="container">
<div class="row">
<div class="col-lg-6 m-auto" >
<div class="mt-5">
<img src="images/17408.jpg" width="200" height="200" class="d-flex m-auto" style="border-radius: 50%;" class="img-thumbnail">
<!--flexible and extensible container -->
<div class="card">
<div class="card-title bg-white rounded top">
<h3 style="text-align: center; margin-top: 10px;"><b>Admin login Dashboard</b></h3>
</div>
<?php 
$Message = "";
if(isset($_GET['Empty']))
{
    $Message = "Please fill all fields";
    echo '<div class="alert alert-danger text-center">'.$Message.'</div>';

}

if(isset($_GET['login_invalid']))
{
    $Message = "Please enter correct Email and Password";
    echo '<div class="alert alert-danger text-center">'.$Message.'</div>';

}

?>
<div class= "card-body">
<form action="loginphp.php" method="POST">
 <input type="email" placeholder="Email" name="email" class="form-control mb-2">
 <input type="password" placeholder="Password" name="password" class="form-control mb-3">
 <button class="btn btn-success" name="login">Login</button>

</form>

</div>
<?php require_once('includes/footer.php') ?>