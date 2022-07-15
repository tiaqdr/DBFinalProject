<?php
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-eqiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial=scale=1.0">
    <title>User Registration</title>
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- font awsome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>


<div id="content" ><!-- content Starts -->
<div class="container" ><!-- container Starts -->
<div class="col-md-12" ><!-- col-md-12 Starts -->
<div class="box" ><!-- box Starts -->
<div class="box-header" ><!-- box-header Starts -->
<center><!-- center Starts -->
<h2> Register A New Account </h2>
</center><!-- center Ends -->
</div><!-- box-header Ends -->

<form action="user-registration.php" method="post" enctype="multipart/form-data" ><!-- form Starts -->
<div class="form-group mb-4" ><!-- form-group Starts -->
<label>Username</label>
<input type="text" class="form-control" name="c_name" required
placeholder="Enter your username." autocomplete="off">
</div><!-- form-group Ends -->

<div class="form-group mb-4"><!-- form-group Starts -->
<label> Email</label>
<input type="text" class="form-control" name="c_email" required
placeholder="Enter your email." autocomplete="off">
</div><!-- form-group Ends -->

<div class="form-outline mb-4">
<label> Password </label>
<div class="input-group">
<input type="password" class="form-control" id="user_password" required
placeholder="Enter your password." autocomplete="off" name="user_password"/>
</div>
</div>


<div class="form-group mb-4">
<label> Confirm Password </label>
<div class="input-group">
<input type="password" class="form-control confirm" id="conf_user_password" required
placeholder="Confirm your password." autocomplete="off" name="conf_user_password"/>
</div>
</div>

<div class="form-group mb-4"><!-- form-group Starts -->
<label> Contact </label>
<input type="text" class="form-control" name="c_contact" required
placeholder="Enter your phone number." autocomplete="off">
</div><!-- form-group Ends -->

<div class="form-group mb-4"><!-- form-group Starts -->
<label> Address </label>
<input type="text" class="form-control" name="c_address" required
placeholder="Enter your Address." autocomplete="off">
</div><!-- form-group Ends -->

<div class="form-group mb-4"><!-- form-group Starts -->
<label> Image </label>
<input type="file" class="form-control" name="c_image" required>
</div><!-- form-group Ends -->


<div class="text-center"><!-- text-center Starts -->
<button type="submit" name="user_register" class="btn btn-primary">
<i class="fa fa-user-md"></i> Register</button>
<p class="small fw-bold mt-2 pt-1 text-center">Already have an account? <a href="user_login.php" 
                 class="text-danger"> Login</a></p>

</div><!-- text-center Ends -->
</form><!-- form Ends -->
</div><!-- box Ends -->
</div><!-- col-md-12 Ends -->
</div><!-- container Ends -->
</div><!-- content Ends -->



<script>
$(document).ready(function(){
$("#pass").keyup(function(){
check_pass();
});
});

function check_pass() {
 var val=document.getElementById("pass").value;
 var meter=document.getElementById("meter");
 var no=0;
 if(val!="")
 {
// If the password length is less than or equal to 6
if(val.length<=6)no=1;

 // If the password length is greater than 6 and contain any lowercase alphabet or any number or any special character
  if(val.length>6 && (val.match(/[a-z]/) || val.match(/\d+/) || val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)))no=2;

  // If the password length is greater than 6 and contain alphabet,number,special character respectively
  if(val.length>6 && ((val.match(/[a-z]/) && val.match(/\d+/)) || (val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) || (val.match(/[a-z]/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))))no=3;

  // If the password length is greater than 6 and must contain alphabets,numbers and special characters
  if(val.length>6 && val.match(/[a-z]/) && val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))no=4;

  if(no==1)
  {
   $("#meter").animate({width:'50px'},300);
   meter.style.backgroundColor="red";
   document.getElementById("pass_type").innerHTML="Very Weak";
  }

  if(no==2)
  {
   $("#meter").animate({width:'100px'},300);
   meter.style.backgroundColor="#F5BCA9";
   document.getElementById("pass_type").innerHTML="Weak";
  }

  if(no==3)
  {
   $("#meter").animate({width:'150px'},300);
   meter.style.backgroundColor="#FF8000";
   document.getElementById("pass_type").innerHTML="Good";
  }

  if(no==4)
  {
   $("#meter").animate({width:'200px'},300);
   meter.style.backgroundColor="#00FF40";
   document.getElementById("pass_type").innerHTML="Strong";
  }
 }
 else
 {
  meter.style.backgroundColor="";
  document.getElementById("pass_type").innerHTML="";
 }
}
</script>
</body>
</html>

<?php

if(isset($_POST['user_register'])){
$remoteip = $_SERVER['REMOTE_ADDR'];
if(1>0){
$c_name = $_POST['c_name'];
$c_email = $_POST['c_email'];
$c_pass = $_POST['user_password'];
$c_contact = $_POST['c_contact'];
$c_address = $_POST['c_address'];
$c_image = $_FILES['c_image']['name'];
$c_image_tmp = $_FILES['c_image']['tmp_name'];
$c_ip = getIPAddress();
move_uploaded_file($c_image_tmp,"./user_images/$c_image");

//checking email
$get_email = "select * from user_table where user_email='$c_email'";
$run_email = mysqli_query($con,$get_email);
$check_email = mysqli_num_rows($run_email);
if($check_email == 1){
echo "<script>alert('This email is already registered, try another one')</script>";
exit();
}

$insert_customer = "insert into user_table (username,user_email,user_password,user_mobile,user_address,user_image,user_ip) 
values ('$c_name','$c_email','$c_pass','$c_contact','$c_address','$c_image','$c_ip')";
$sql_execute=mysqli_query($con,$insert_customer);

//$run_customer = mysqli_query($con,$insert_customer);

$sel_cart = "select * from cart_details where ip_address='$c_ip'";
$run_cart = mysqli_query($con,$sel_cart);
$check_cart = mysqli_num_rows($run_cart);
if($check_cart>0){
$_SESSION['username']=$c_name;
echo "<script>alert('You have been Registered Successfully')</script>";
echo "<script>window.open('checkout.php','_self')</script>";
}else{
$_SESSION['username']=$c_name;
echo "<script>alert('You have been Registered Successfully')</script>";
echo "<script>window.open('../index.php','_self')</script>";
}
}
else{
echo "<script>alert('Try Again')</script>";
}
}
?>
