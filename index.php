 <!DOCTYPE html>
 <html>
 <head>
 	<title>Alumni Management System</title>
 	<link rel="stylesheet" type="text/css" href="app.css">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> 
 	
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
 <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    
  <a class="navbar-brand" href="https://www.dkte.ac.in/">DKTE</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent" >
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="admin.php">Admin Login</a>
      </li> 
       <li class="nav-item">
        <a class="nav-link" href="contactus.php">Contact us</a>
      </li> 
      <li class="nav-item">
        <a class="nav-link" href="about.html">About us</a>
      </li>
    
     
    </ul>
   
    <div class="collapse navbar-collapse justify-content-end" id="navbarCollapse">
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="Login.php"><i class="fa fa-user"></i> Login</a>
    </li>
     <li class="nav-item">
      <a class="nav-link" href="signup.php"><i class="fa fa-user-plus"></i> Sign Up</a>
    </li>
  </ul>
</div>
  </div>
  
</nav>



 	
  <div class="container">
  	<div class="row">
  		<div class="col-lg-12">
  			<div id=content>
  			<h1 style="font-weight: bold ">Alumni Management System </h1>
  			<h3>Insert or Search Alumni</h3>
  			<hr>
  			<button class="btn  btn-dark" onClick="location.href='display.php'"><i class="fas fa-user-graduate"></i>Dashboard!</button>
  			</div>
  		</div>
  	</div>
  </div>

 <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>	
 <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
 </body>
 </html>