<?php 
session_start();
 ?>

 <?php
       
        
  
  				
			

					$conn=mysqli_connect('localhost','root');
					mysqli_select_db($conn,'dkte');

					if(isset($_POST['submit'])){

						$dob=$_POST['dob'];
						$name=$_POST['name'];
						$contact=$_POST['contact'];
						$email=$_POST['email'];
						$password=$_POST['password'];
						$files=$_FILES['file'];
						$branch=$_POST['branch'];
						$yop=$_POST['yop'];
						$address=$_POST['address'];

						
						
						//echo "<script>alert('Hello')</script>";
						//echo "<script>document.getElementById('uname').innerHTML='';</script>";
						
						
						
						
						//print_r($username);
						//echo "<br>";
						//print_r($files);

						$filename=$files['name'];
						$filerror=$files['error'];
						$filetmp=$files['tmp_name'];

						$fileext=explode('.', $filename);
						$filecheck=strtolower(end($fileext));
						$fileextstored=array('png','jpg','jpeg');

						if(in_array($filecheck,$fileextstored)){
							$destinationfile='upload/'.$filename;
							move_uploaded_file($filetmp, $destinationfile);

						$q="INSERT INTO `alumni2`(`name`, `branch`, `yop`, `contact`, `dob`, `email`, `password`, `image` , `address`) VALUES (upper('$name'),'$branch','$yop','$contact','$dob','$email','$password','$destinationfile',upper('$address') )";
						$query=mysqli_query($conn,$q);

						if($query)
						{

							//echo "data inserted";
							//echo "<script>alert('Login to view your profile');</script>";
							header("Location: Login.php");
							
						

						}else{
							
							echo "<script>alert('Email or Contact already present');</script>";
							
							

						
						}


					}
				}else{
					//echo "All Fields are required";
				}
				?>
<!DOCTYPE html>
<html>
<head>
	<title>Alumni Management System</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
	<div class="col-lg-7 m-auto">
		<form name="signupform" class="form-group" method="post" enctype="multipart/form-data" onsubmit="return validate_form();">
			<br><br><div class="card">
				<div class="card-header bg-dark">
					<h1 class="text-white text-center">Signup Here!</h1>
				</div><br>
		<!--<form class="form-group" method="post" enctype="multipart/form-data">-->
			<label for="name"><h3>Name</h3></label>
				<input type="text" name="name" class="form-control" autocomplete="on" id="name">
				<span id="uname" class="text-danger font-weight=bold"></span>

			
			<label for="branch"><h3>Branch</h3></label>
			<input list="branch" name="branch" class="form-control" autocomplete="off">
  				<datalist id="branch">
   				 	    <option value="COMPUTER SCIENCE AND ENGINEERING">
					    <option value="INFORMATION TECHNOLOGY">
					    <option value="MECHANICAL ENGINEERING">
					    <option value="CIVIL ENGINEERING">
					    <option value="ELECTRONICS">
  				</datalist>	
  				<span id="ubranch" class="text-danger font-weight=bold"></span>

			<label for="yop"><h3>Passing Year</h3></label>
				<input type="text" name="yop" class="form-control" autocomplete="off" id="yop">
				<span id="uyop" class="text-danger font-weight=bold"></span>

			<label for="contact"><h3>Contact</h3></label>
				<input type="text" name="contact" class="form-control" autocomplete="off" id="contact">
				<span id="ucontact" class="text-danger font-weight=bold"></span>

			<label for="dob"><h3>Birth Date</h3></label>
				<input type="date" name="dob" class="form-control" autocomplete="off" id="dob">
				<span id="udob" class="text-danger font-weight=bold"></span>

			<label for="address"><h3>City</h3></label>
				<input type="text" name="address" class="form-control" autocomplete="off" id="address">
				<span id="uaddress" class="text-danger font-weight=bold"></span>


			<label for="email"><h3>Email</h3></label>
				<input type="email" name="email" class="form-control" autocomplete="off" id="email">
				<span id="uemail" class="text-danger font-weight=bold"></span>

			<label for="password"><h3>Password</h3></label>
				<input type="password" name="password" class="form-control" autocomplete="off" id="p1">
				<span id="up1" class="text-danger font-weight=bold"></span>

			<label for="password2"><h3>Confirm Password</h3></label>
				<input type="password" name="password2" class="form-control" autocomplete="off" id="p2">
				<span id="up2" class="text-danger font-weight=bold"></span>
			
			
			<label for="file"><h3>Profile</h3></label>
			<input type="file" name="file" class="form-control" id="file">	
			<span id="ufile" class="text-danger font-weight=bold"></span>

			<br>
			<input type="submit" name="submit" class="btn btn-primary">
			<br>
		<input type="button" name="cancel" value="Cancel" class="btn btn-danger" onClick="location.href='index.php'"><br>

		<div class="form-group">
   
          <label>Already have an account?</label> <a href="login.php">Click here to Login</a>
       </div>
			
			

		</div>	
			
		</form>
	</div>
	</div>

	<script type="text/javascript">
		function validate_form(){
			var name = document.getElementById('name').value;
			var branch = document.getElementById('branch').value;
			var yop = document.getElementById('yop').value;
			var contact = document.getElementById('contact').value;
			var dob = document.getElementById('dob').value;
			var address = document.getElementById('address').value;
			var email = document.getElementById('email').value;
			var p1 = document.getElementById('p1').value;
			var p2 = document.getElementById('p2').value;
			var file = document.getElementById('file').value;


			var isValid=true;
			document.getElementById('uname').innerHTML="";
			document.getElementById('ubranch').innerHTML="";
			document.getElementById('uyop').innerHTML="";
			document.getElementById('ucontact').innerHTML="";
			document.getElementById('udob').innerHTML="";
			document.getElementById('uaddress').innerHTML="";
			document.getElementById('uemail').innerHTML="";
			document.getElementById('up1').innerHTML="";
			document.getElementById('up2').innerHTML="";
			document.getElementById('ufile').innerHTML="";

			if(!p1.match(/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])([a-zA-Z0-9]{8,})$/)){
				document.getElementById('up1').innerHTML="Password must be minimum 8 characters with number, small and capital alphabets";
				isValid=false;
			}


			
			if(name.length<=2 || name.length>50){
				document.getElementById('uname').innerHTML="**Name length must be between 2 and 50";
				isValid=false;
			}
			
			if(!isNaN(name)){
				document.getElementById('uname').innerHTML="**Only characters are allowed";
				isValid=false;
			}
			
			if(name==""){
				document.getElementById('uname').innerHTML="**Please fill this field";
				isValid=false;
			}
			
			if(branch==""){
				document.getElementById('ubranch').innerHTML="**Please fill this field";
				isValid=false;
			}

			if(yop.length!=4){
				document.getElementById('uyop').innerHTML="**Year of Passing must be 4 digit";
				isValid=false;
			}

			if(isNaN(yop)){
				document.getElementById('uyop').innerHTML="**Characters are not allowed";
				isValid=false;
			}

			

			if(yop==""){
				document.getElementById('uyop').innerHTML="**Please fill this field";
				isValid=false;
			}

			if(contact.length!=10){
				document.getElementById('ucontact').innerHTML="**Contact must be 10 digits";
				isValid=false;
			}

			if(isNaN(contact)){
				document.getElementById('ucontact').innerHTML="**Characters are not allowed";
				isValid=false;
			}

			

			if(contact==""){
				document.getElementById('ucontact').innerHTML="**Please fill this field";
				isValid=false;
			}

			if(dob==""){
				document.getElementById('udob').innerHTML="**Please fill this field";
				isValid=false;
			}

			

			if(!isNaN(address)){
				document.getElementById('uaddress').innerHTML="**Only characters are allowed";
				isValid=false;
			}

			if(address==""){
				document.getElementById('uaddress').innerHTML="**Please fill this field";
				isValid=false;
			}


			

			if(email.indexOf('@')<=0){
				document.getElementById('uemail').innerHTML="**Invalid Email";
				isValid=false;
			}

			if((email.charAt(email.length-4)!='.') && (email.charAt(email.length-3)!='.')){
				document.getElementById('uemail').innerHTML="**Invalid Email";
				isValid=false;
			}

			if(email==""){
				document.getElementById('uemail').innerHTML="**Please fill this field";
				isValid=false;
			}

			if(p1!=p2){
				document.getElementById('up2').innerHTML="**Both password should match";
				isValid=false;
			}

			if(p1.length<4 || p1.length>20){
				document.getElementById('up1').innerHTML="**Password length must be between 5 and 20";
				isValid=false;
			}

			

			if(p1==""){
				document.getElementById('up1').innerHTML="**Please fill this field";
				isValid=false;
			}

			if(p2==""){
				document.getElementById('up2').innerHTML="**Please fill this field";
				isValid=false;
			}

			if(file==""){
				document.getElementById('ufile').innerHTML="**Please fill this field";
				return false;
			}

			return isValid;
		}
	</script>
</body>
</html>


    
        

<!--    

<script type="text/javascript">
	function validate_form(){
		valid=true;
		if(document.signupform.name.value=="" || document.signupform.branch.value=="" || document.signupform.yop.value=="" || document.signupform.contact.value=="" || document.signupform.dob.value=="" || document.signupform.address.value=="" || document.signupform.email.value=="" || document.signupform.password.value=="" || document.signupform.file.value==""){
			alert("Please fill out all details");


			valid=false
			}
			if(document.signupform.password.value!=document.signupform.password2.value)
			{
				alert("Both password should match");
				valid=false
			}
		

		return valid;
	}
</script>


   -->
