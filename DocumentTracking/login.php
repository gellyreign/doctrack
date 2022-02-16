<?php
session_start();
//connect to database
$db=mysqli_connect("localhost","root","","docsys");
if($db)
{
  if(isset($_POST['login_btn']))
  {
      $userid=mysqli_real_escape_string($db,$_POST['userid']);
      $username=mysqli_real_escape_string($db,$_POST['username']);
      $password=mysqli_real_escape_string($db,$_POST['password']);
            session_start();
            $_SESSION['message']="You are now Loggged In";
            $_SESSION['username']=$username;
            $_SESSION['userid']=$userid;
            header("location:home.php");
        
      }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>LOG IN</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>

<body>
    <div class="wrapper">
        <h2>LOG IN</h2>

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
                <label>Document Number</label>
                <input type="text" name="userid" class="form-control">
            </div>
            <div class="form-group">
              <input type="submit" class="btn btn-block btn-outline-success" name="login_btn">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up</a>.</p>
        </form>
    </div>    
</body>
</html>