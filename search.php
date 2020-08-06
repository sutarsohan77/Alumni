<?php 
session_start();
if(!isset($_SESSION["field"])){
    echo "<script>alert('Please provide values again');</script>";
     header("Location: display.php");
    //echo "<script>location.href='a.php'</script>";


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
		<div class="col-lg-12">
			<br><br>
			<h1 class="text-warning text-center">Result of Searched Alumni</h1>
			<br>
			
			
			
			<table class="table table-striped table-hover table-bordered">
				<tr class="bg-dark text-white text-center">
					<th>Profile</th>
					<th>Name</th>
					<th>Branch</th>
					<th>Passing Year</th>
					<th>City</th>
					
				</tr>

				<?php
					$field=strtolower($_SESSION['field']);
					$searchval=strtoupper($_SESSION['searchval']);
					include 'conn.php';
 					$q="SELECT * FROM `alumni2` WHERE `$field` LIKE '%$searchval%'";  
					
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
				
					
				</tr>
			
			<?php
				}
			?>

			</table>
			<form method="post">
			<input type="submit" name="cancel" value="Cancel" class="btn btn-danger">
			</form>
	</div>

</body>
</html>

<?php
if(isset($_POST['cancel'])){
	unset($_SESSION['field']);
	unset($_SESSION['searchval']);
	session_destroy();
	 header('Location: display.php');
}

?>