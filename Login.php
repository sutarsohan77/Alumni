<?php
session_start();
?>
<html>
<head>
<title>Alumni Management System</title> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  

</head>
<body>
  <div class="container"> 
   <div class="col-lg-6 m-auto" >
    <form name="loginform" class="form-group" method="post" enctype="multipart/form-data" onsubmit="return valid_form();">
      <br><br>
        <div class="card border ">
        <div class="card-header bg-dark">
          <h1 class="text-white text-center">Login Here!</h1>
        </div><br>
  <div class="form-group">
    <label for="email"><h3>Email address</h3></label>
    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Enter email" autocomplete="off" id="email">
    <!--<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>-->
    <span class="text-danger font-weight=bold" id="uemail"></span>
  </div>
  <div class="form-group">
    <label for="password"><h3>Password</h3></label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="off">
    <span class="text-danger font-weight=bold" id="upassword"></span>
  </div>
 
  <button type="submit" class="btn btn-primary" name="submit">Submit</button>
  <br>
  <input type="button" name="cancel" value="Cancel" class="btn btn-danger" onClick="location.href='index.php'">
       
       <div class="form-group">
   
           <label>New user?</label> <a href="signup.php">Sign up here</a>
       </div>
 </div>
</form>
</div>
</div>
  <script type="text/javascript">
    function valid_form(){
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var isValid=true;
   document.getElementById('uemail').innerHTML="";
    document.getElementById('upassword').innerHTML="";
    if(email==""){
        document.getElementById('uemail').innerHTML="**Please fill this field";
        isValid=false;
      }
    if(password==""){
      document.getElementById('upassword').innerHTML="**Please fill this field";
      isValid=false;
    }
    return isValid;
  }
  </script>
</body>
    
    
<?php

    if(isset($_POST["submit"])){
        
    //$conn=mysqli_connect("localhost","root","","dkte");
    include 'conn.php';
    if($conn){
       // echo "Success";
        $email=$_POST["email"];
        $password=$_POST["password"];
        
        $query="select * from alumni2 where email='$email' and password='$password'";
        $res=mysqli_query($conn,$query);
        
        if(mysqli_num_rows($res)>0){
            $row=mysqli_fetch_assoc($res);
            
            echo $row["name"];
            echo $row["password"];
            // Set session variables
           $_SESSION['name']=$row['name'];
           $_SESSION['branch']=$row['branch'];
           $_SESSION['yop']=$row['yop'];
           $_SESSION['contact']=$row['contact'];
           $_SESSION['dob']=$row['dob'];
           $_SESSION['address']=$row['address'];
           $_SESSION['email']=$row['email'];
           $_SESSION['password']=$row['password'];
           $_SESSION['file']=$row['image'];
           $_SESSION['id']=$row['id'];


             header("Location: landing.php");
        }
        else{
           // echo "No data found";
           echo "<script>alert('No data found')</script>";
        }
        
        }
        else{
            echo "<script>alert('Failed to connect database')</script>";
        }
    }
    else
        //echo "EHUEUE";
?>
</html>

