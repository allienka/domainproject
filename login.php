<?php session_start(); 	 ?>
<?php require_once ('./connection_db/Dbconnection.php'); // call the connection config?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
<div class="form-wrapper">
  
  <form action="#" method="post">
    <h3>Login </h3>
	
    <div class="form-item">
		<input type="text" name="user" required="required" placeholder="Username" autofocus required></input>
    </div>
    
    <div class="form-item">
		<input type="password" name="pass" required="required" placeholder="Password" required></input>
    </div>
    
    <div class="button-panel">
		<input type="submit" class="button" title="Log In" name="login" value="Login"></input>
    </div>
  </form>
  <?php
	if (isset($_POST['login']))
		{   
            // check the user name and password 
			$database   = new Database();  
			$username  	= mysqli_real_escape_string($database->connection, $_POST['user']);
			$password  	= mysqli_real_escape_string($database->connection, $_POST['pass']);
			// add new code
			$query       = "SELECT *  from users WHERE  password='$password' and user_name ='$username'";
			$result      = $database->query($query);
			if ($result->num_rows > 0) {
				while ($row = mysqli_fetch_assoc($result)) {		
					$_SESSION['user_name']	  = $row['user_name']; // set session
					$_SESSION['first_name']   = $row['first_name']; // set session
					header('location:index.php');
				}
			}
			else
			echo'<div style="color:red;"> Invalid Username or Password  </div>';
		}

  ?>
</body>
</html>