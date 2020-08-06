if (empty($_POST["name"])) {
							$nameError = "Name requires";
						}else{	
							$name=$_POST["name"];
						}	

						if (empty($_POST["dob"])) {
							$dobError = "Birth Date requires";
						}else{	
							$dob=$_POST["dob"];
						}	
						
						if (empty($_POST["contact"])) {
							$contacError = "Contact requires";
						}else{	
							$contact=$_POST["contact"];
						}

						if (empty($_POST["email"])) {
							$emailError = "Email requires";
						}else{	
							$email=$_POST["email"];
						}

						if (empty($_POST["branch"])) {
							$branchError = "Branch requires";
						}else{	
							$branch=$_POST["branch"];
						}

						if (empty($_POST["yop"])) {
							$yopError = "Passing Year requires";
						}else{	
							$yop=$_POST["email"];
						}

						if (empty($_POST["address"])) {
							$addressError = "Address requires";
						}else{	
							$address=$_POST["address"];
						}

						if (empty($_POST["password"])) {
							$passwordError = "Password requires";
						}else{	
							$password=$_POST["password"];
						}

						if(empty($_FILES['file'])){
							$fileError="File Requires"
						}