<?php 

    //userLogin
	if(!isset($_SESSION)){
		session_start();
	}

	 //databaseconnection
	include_once("connections/connection.php");

	$con = connection();

    if(isset($_POST['login'])){
      
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM student_users WHERE username = '$username' AND password = '$password'";
        $user = $con->query($sql) or die ($con->error);
        $row = $user->fetch_assoc();
        $total = $user->num_rows;

       if($total > 0){
            $_SESSION['UserLogin'] = $row['username'];
            $_SESSION['Access'] = $row['access'];
           echo header("Location: index.php");
        } else{
            echo "<div class='message warning'> No User Found </div>";
        }

    } 

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student Management System</title>
	<link rel="stylesheet" href="css/style.css" class="style">

</head>
<body id="formlogin">
    <div class="login-container">
       
    
        <h1>Login Page</h1>

        <br>
        <div class="form-logo">
        <img src="img/login.png" alt="">
        </div>


        <form action="" method="post">

            <div class="form-element">
                <label>Username</label>
                <input type="text" name="username" id="username" autocomplete="off" placeholder="Enter Username" required>
            </div> 
            
            <div class="form-element">
                <label>Password</label>
                <input type="password" name="password" id="password" placeholder="Enter Password" required>
            </div> 

                <button type="submit" name="login">Login</button>
            
        </form>  
    </div>
</body>
</html>