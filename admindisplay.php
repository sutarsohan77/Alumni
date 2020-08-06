
<?php
session_start();
if(!isset($_SESSION["username"])){
    echo "<script>alert('Please Login again');</script>";
     //header("Location: index.php");
    echo "<script>location.href='admin.php'</script>";


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
		<form name="sendmail" method="post" id="formid">
		<div class="col-lg-12">
			<br><br>
			<h1 class="text-warning text-center">Alumni</h1>
			<br>
			<table class="table table-striped table-hover table-bordered">
				<tr class="bg-dark text-white text-center">
					
					<th>Profile</th>
					<th>Name</th>
					<th>Branch</th>
					<th>Passing Year</th>
					<th>City</th>
					<th>Delete</th>
					
				</tr>

				<?php
					include 'conn.php';
 					$q="select * from alumni2";  
					$query=mysqli_query($conn,$q);
					while ($res=mysqli_fetch_array($query)) {
						# code...
						
					 
				?>

				<tr class="text-center">
					
					<td><img src="<?php echo $res['image']; ?>" height="100px" width="100px"></td>
					<td><?php echo $res['name']; ?></td>
					<td><?php echo $res['branch']; ?></td>
					<td><?php echo $res['yop']; ?></td>
					<td><?php echo $res['address']; ?></td>

					<td><button class="btn-danger btn"><a href="admindelete.php?id=<?php echo $res['id']; ?>" class="text-white">Delete</a></button></td>
					
				</tr>
				 
			<?php
				}


			?>

			</table>

			<h1>Message For Alumni</h1>
			<input type="text" name="msgBody" class="form-control" placeholder="Subject" autocomplete="off"><br>
			<textarea form="formid" name="textarea" class="form-control" placeholder="Enter Message Here!" autocomplete="off"></textarea><br>
			 <input type="submit" name="submit" value="Send Mail" class="btn btn-success">
			   <button class="btn btn-danger" name="logout" onClick="logout">Logout</button>
		</div>
		</form>
	</div>
</body>
</html>

  <?php
    if(isset($_POST["logout"])){
        unset($_SESSION['username']);
         unset($_SESSION['password']);
         session_destroy();
         header('Location: admin.php');

        
    }
 
    
     ?>

<?php 

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 

require 'vendor/autoload.php'; 

$mail = new PHPMailer(true); 

if (isset($_POST["submit"])){

    
    try { 
	$mail->SMTPDebug = 2;									 
	$mail->isSMTP();											 
	$mail->Host	 = 'smtp.gmail.com;';					 
	$mail->SMTPAuth = true;							 
	$mail->Username = 'mydkte.123@gmail.com';
	$mail->Password = 'Dkte@123';
	
	$mail->SMTPSecure = 'tls';							 
	$mail->Port	 = 587; 

	//$mail->setFrom('asshelar@dktes.com', 'Alankar Shelar');		 
	//$mail->addAddress('alankarshelar5620@gmail.com'); 
	//$mail->addAddress('alankarshelar89@gmail.com', 'AS'); 
	
			//From email address and name
		$mail->From = "mydkte.123@gmail.com";
		$mail->FromName = "DKTE";

		//To address and name
		include 'conn.php';
 					$q="select * from alumni2";  
					$query=mysqli_query($conn,$q);
					while ($res=mysqli_fetch_array($query)) {
						# code...
						$mailAddr=$res['email'];
						$studName=$res['name'];
		$mail->addAddress("$mailAddr", "$studName");
	}
       // $mail->addAddress("sutarsohan1@gmail.com", "Sohan");
		//$mail->addAddress("alankarshelar89@gmail.com"); //Recipient name is optional

		//Address to which recipient will reply
		$mail->addReplyTo("mydkte.123@gmail.com", "Reply");

		//CC and BCC
		//$mail->addCC("cc@example.com");
		//$mail->addBCC("bcc@example.com");
	
	  // $mail->addAttachment("img1.jpg","file.txt");
		$msgBody=$_POST['msgBody'];
		$msgText=$_POST['textarea'];
	
	$mail->isHTML(true);								 
	$mail->Subject = $msgBody; 
	$mail->Body = $msgText; 
	$mail->AltBody = 'From Alumni Management System'; 
	$mail->send(); 
	
    echo "Mail has been sent successfully!"; 

} 
catch (Exception $e) 
{ 
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
}     
}



?>
