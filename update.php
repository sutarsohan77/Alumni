<?php
include 'conn.php';

session_start();
/*if(!isset($_SESSION["email"])){
    echo "<script>alert('Please Login again');</script>";
     //header("Location: index.php");
    echo "<script>location.href='Login.php'</script>";


}*/

if(isset($_POST['done']))
{
 	//$id=$_GET['id'];
 	//$username=$_POST['username'];
 	//$password=$_POST['password'];

	$Email=$_SESSION['email'];
	$id=$_SESSION['id'];
	
	//$password=$_SESSION['password'];
	$newName=$_POST["newName"];
	$newBranch=$_POST["newBranch"];
	$newYop=$_POST["newYop"];
	$newContact=$_POST["newContact"];
	$newDob=$_POST["newDob"];
	$newAddress=$_POST["newAddress"];
	$newEmail=$_POST["newEmail"];
	$newPassword=$_POST["newPassword"];
	
	$_SESSION['name']=strtoupper($newName);
	$_SESSION['branch']=$newBranch;
	$_SESSION['yop']=$newYop;
	$_SESSION['contact']=$newContact;
	$_SESSION['dob']=$newDob;
	$_SESSION['address']=strtoupper($newAddress);
		
	//$q="UPDATE `alumni2` SET `email`='$newEmail' WHERE `email`='$email'";

	$q="UPDATE `alumni2` SET `name`=upper('$newName'), `branch`='$newBranch' , `yop`='$newYop' , `contact`='$newContact' , `dob`='$newDob' ,`address`=upper('$newAddress') WHERE `id`='$id';";

	//$q="update crudtable set id=$id,username='$username',password='$password' where id=$id";  
	


	$query=mysqli_query($conn,$q);
	if($query)
	{
		echo "data updated";

		header('location:landing.php');
	}else
	{
		echo "data not updated";
	}

	  	/*unset($_SESSION['name']);
        unset($_SESSION['branch']);
        unset($_SESSION['yop']);
        unset($_SESSION['contact']);
        unset($_SESSION['dob']);
        unset($_SESSION['address']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        session_destroy();
        header('Location: Login.php');*/
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Alumni Management System</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
</head>
<body>
	<div class="col-lg-6 m-auto">
		<form name="updateform" method="post" onsubmit="return validate_form();">
			<br><br><div class="card">
				<div class="card-header bg-dark">
					<h1 class="text-white text-center">Update Details</h1>
				</div>

				<label><h3>Name</h3></label>
				<input type="text" name="newName" class="form-control" id="name" autocomplete="off">
				<span id="uname" class="text-danger font-weight=bold"></span>

				

				<label for="branch"><h3>Branch</h3></label>
			<input list="branch" name="newBranch" class="form-control" autocomplete="off" class="form-control" id="branch1">
  				<datalist id="branch">
   				 	    <option value="COMPUTER SCIENCE AND ENGINEERING">
					    <option value="INFORMATION TECHNOLOGY">
					    <option value="MECHANICAL ENGINEERING">
					    <option value="CIVIL ENGINEERING">
					    <option value="ELECTRONICS">
  				</datalist>	
  				<span id="ubranch" class="text-danger font-weight=bold"></span>


				<label><h3>Passing Year</h3></label>
				<input type="text" name="newYop" class="form-control" id="yop" autocomplete="off">
				<span id="uyop" class="text-danger font-weight=bold"></span>

				<label><h3>Contact</h3></label>
				<input type="text" name="newContact" class="form-control" id="contact" autocomplete="off">
				<span id="ucontact" class="text-danger font-weight=bold"></span>


				<label><h3>Birth Date</h3></label>
				<input type="date" name="newDob" class="form-control" id="dob" autocomplete="off">
				<span id="udob" class="text-danger font-weight=bold"></span>

				<label><h3>City</h3></label>
				<input type="text" name="newAddress" class="form-control" id="address" autocomplete="off">
				<span id="uaddress" class="text-danger font-weight=bold"></span>

				<!--
				<label><h3>Email</h3></label>
				<input type="email" name="newEmail" class="form-control" id="email" autocomplete="off">

				<label><h3>Password</h3></label>
				<input type="password" name="newPassword" class="form-control" id="password" autocomplete="off">
				-->
				<br>
				

				<button class="btn btn-success" type="submit" name="done">Submit</button><br>

				<input type="button" name="cancel" value="Cancel" class="btn btn-danger" onClick="location.href='landing.php'">
			</div>
		</form>		
	</div>

	<script type="text/javascript">
		 document.getElementById("name").value="<?php echo $_SESSION["name"]?>";
        document.getElementById("branch1").value="<?php echo $_SESSION["branch"]?>";
        document.getElementById("yop").value="<?php echo $_SESSION["yop"]?>";
        document.getElementById("contact").value="<?php echo $_SESSION["contact"]?>";
        document.getElementById("dob").value="<?php echo $_SESSION["dob"]?>";
        document.getElementById("address").value="<?php echo $_SESSION["address"]?>";
        document.getElementById("email").value="<?php echo $_SESSION["email"]?>";
        document.getElementById("password").value="<?php echo $_SESSION["password"]?>";
       
	</script>


	<script type="text/javascript">
	function validate_form(){
			var name = document.getElementById('name').value;
			var branch = document.getElementById('branch1').value;
			var yop = document.getElementById('yop').value;
			var contact = document.getElementById('contact').value;
			var dob = document.getElementById('dob').value;
			var address = document.getElementById('address').value;
			


			var isValid=true;
			document.getElementById('uname').innerHTML="";
			document.getElementById('ubranch').innerHTML="";
			document.getElementById('uyop').innerHTML="";
			document.getElementById('ucontact').innerHTML="";
			document.getElementById('udob').innerHTML="";
			document.getElementById('uaddress').innerHTML="";
			

		isValid=true;

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


		
		return isValid;
	}
	</script>

	<!--<script type="text/javascript">
	function validate_form(){
		valid=true;
		if(document.updateform.newName.value=="" || document.updateform.newBranch.value=="" || document.updateform.newYop.value=="" || document.updateform.newContact.value=="" || document.updateform.newDob.value=="" || document.updateform.newAddress.value==""){
			alert("Please fill out all details");
			valid=false;
		}
		return valid;
	}
	</script>-->

</body>
</html>

