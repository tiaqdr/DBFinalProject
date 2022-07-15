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
    <title>User Login</title>
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

<h1>Login</h1>


</center>




</div><!-- box-header Ends -->

<form action="checkout.php" method="post" ><!--form Starts -->

<div class="form-group" ><!-- form-group Starts -->

<label>Username</label>

<input type="text" class="form-control" name="c_name" required >

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

<center><!-- center Starts -->
<p class="small fw-bold mt-2 pt-1">Don't have an account? <a href="user-registration.php" 
 class="text-danger"> Register</a></p>
 <p class="small fw-bold mt-2 pt-1"> <a href="../admin_area/admin_login.php" 
 class="text-danger"> Admin Login</a></p>
</center><!-- center Ends -->
</div><!-- box Ends -->

<?php

if(isset($_POST['login'])){
$customer_username = $_POST['c_name'];
$customer_pass = $_POST['c_pass'];

$select_customer = "select * from user_table where username='$customer_username' AND user_password='$customer_pass'";
$run_customer = mysqli_query($con,$select_customer);
$get_ip = getIPAddress();
$check_customer = mysqli_num_rows($run_customer);

$select_cart = "select * from cart_details where ip_address='$get_ip'";
$run_cart = mysqli_query($con,$select_cart);
$check_cart = mysqli_num_rows($run_cart);
if($check_customer==0){
echo "<script>alert('username or password is incorrect!')</script>";
exit();
}

if($check_customer==1 AND $check_cart==0){
$_SESSION['username']=$customer_username;
echo "<script>alert('You are Logged In')</script>";
echo "<script>window.open('../index.php','_self')</script>";
}
else {
$_SESSION['username']=$customer_username;
echo "<script>alert('You are Logged In')</script>";
echo "<script>window.open('checkout.php','_self')</script>";
} 
}

?>