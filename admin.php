<?php 
session_start(); // must go right at the top of the page - to track login
?>



<html>
<head>
<title>Alumni Management System</title> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
  <div class="container">
   <div class="col-lg-6 m-auto">
    <br><br>
    <form name="adminform" class="form-group" method="post" onsubmit="return validate_form( );">
      <br><br>
        <div class="card">
        <div class="card-header bg-dark">
          <h1 class="text-white text-center">Admin Login</h1>
        </div>
  <div class="form-group">
    <label for="username"><h3>Username</h3></label>
    <input type="text" class="form-control" id="username" name="user"  placeholder="Enter username" autocomplete="off" id="uname">
   
  </div>
  <div class="form-group">
    <label for="password"><h3>Password</h3></label>
    <input type="password" class="form-control" name="pass" id="password" placeholder="Enter Password" id="pass">
  </div>
 
<input type="submit" name="Submit" value="Submit" class="btn btn-primary" />
<br>
  <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onClick="location.href='index.php'">
       
       <div class="form-group">
   
          <label>Not an Admin?</label> <a href="login.php">Click here to User Login</a>
       </div>
 </div>
 </div>
</form>
</div>
</body>


<?php 

//session_start(); // must go right at the top of the page - to track login

$logins = array('admin' => 'admin@123'); // your username and password

if(isset($_POST['Submit'])) { // check for form submit
    $user = $_POST['user']; 
    $pass = $_POST['pass']; 
    if (isset($logins[$user]) && ($logins[$user] == $pass)) { // check login and compare credentials
        $_SESSION['username'] = $user; // set the session
        $_SESSION['password'] = $pass;
        header("Location: admindisplay.php"); // redirect to protected page
        }
      


    }


?>

<script type="text/javascript">
<!--

function validate_form ( )
{
    valid = true;

    if ( document.adminform.user.value == "" || document.adminform.pass.value=="")
    {
        alert ( "Please fill out all fields to Login" );
        valid = false;
    }

    

    return valid;
}

//-->
</script>