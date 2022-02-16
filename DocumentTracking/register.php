<?php
session_start();
//connect to database
$db=mysqli_connect("localhost","root","","docsys");
if(isset($_POST['register_btn']))
{
    $userid=(rand());
    echo '$userid';
    $username=mysqli_real_escape_string($db,$_POST['username']);
    $password=mysqli_real_escape_string($db,$_POST['password']);
    $password2=mysqli_real_escape_string($db,$_POST['password2']);
    $location=mysqli_real_escape_string($db,$_POST['location']);
    $receiver=mysqli_real_escape_string($db,$_POST['receiver']);  
    $query = "SELECT * FROM users WHERE username = '$username'";
    
    $result=mysqli_query($db,$query);
      if($result)
      {
     
        if( mysqli_num_rows($result) > 0)
        {
                
                echo '<script language="javascript">';
                echo 'alert("Username already exists")';
                echo '</script>';
        }
        
          else
          {
            $sql="INSERT INTO users(username, password , location, receiver, docnum) VALUES('$username','$password','$location','$receiver', '$userid')"; 
                mysqli_query($db,$sql);  
                $_SESSION['message']="You are now logged in"; 
                $_SESSION['username']=$username;
                $_SESSION['userid']=$userid;
                $_SESSION['location']=$location;
                header("location:home.php");  //redirect home page
            
            
          }
      }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control">
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control">
            </div>
            <div>
                    <label for="location">Location:</label>
                    <select name="location" id="location" class="form-control" >
                    <option value="MAIN GATE">MAIN GATE</option>
                     <option value="COS 2ND FLOOR">COS 2ND FLOOR</option>
                     </select>
                </div>
                <label for="receiver">Receiver</label>
                    <input type="text" name="receiver" id="receiver" class="form-control">
            <div class="form-group">
              <input type="submit" class="btn btn-block btn-outline-success" name="register_btn">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>    
</body>
</html>


