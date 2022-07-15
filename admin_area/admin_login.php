<?php include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-eqiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial=scale=1.0">
    <title>Admin Login</title>
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body{
            overflow-x:hidden;
        }
    </style>
</head>

<body> 
<div class="box mt-5" ><!-- box Starts -->

<div class="box-header" ><!-- box-header Starts -->

<center>

<h1>Admin Login</h1>


</center>




</div><!-- box-header Ends -->

<form action="index.php" method="post" ><!--form Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label>Email</label>

<input type="text" class="form-control" name="c_email" required >

</div><!-- form-group Ends -->

<div class="form-group" ><!-- form-group Starts -->

<label>Password</label>

<input type="password" class="form-control" name="c_pass" required >


</div><!-- form-group Ends -->

<div class="text-center" ><!-- text-center Starts -->

<button name="login" value="Login" class="btn btn-primary" >

<i class="fa fa-sign-in" ></i> Log in


</button>

</div><!-- text-center Ends -->
</form><!--form Ends -->
</div><!-- box Ends -->

<?php

if(isset($_POST['login'])){
$admin_email = $_POST['c_email'];
$admin_pass = $_POST['c_pass'];

$select_admin = "select * from admin_table where admin_email='$admin_email' AND admin_password='$admin_pass'";
$run_admin = mysqli_query($con,$select_admin);
$check_admin = mysqli_num_rows($run_admin);

if($check_admin==0){
echo "<script>alert('email or password is incorrect!')</script>";
exit();
}

if($check_admin==1){
$_SESSION['admin_email']=$admin_email;
echo "<script>alert('You are Logged In')</script>";
echo "<script>window.open('index.php','_self')</script>";
}
}

?>