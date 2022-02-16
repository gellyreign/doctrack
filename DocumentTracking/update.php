<?php
session_start();
//connect to database
$db=mysqli_connect("localhost","root","","docsys");


if(isset($_POST['update_btn']))
{
    $username=mysqli_real_escape_string($db,$_POST['username']);
    $location=mysqli_real_escape_string($db,$_POST['location']);

    $sql = "UPDATE users SET location='$location' WHERE username='$username'";

if (mysqli_query($db, $sql)) {
   
   session_start();
            $_SESSION['message']= "Record updated successfully";
            $_SESSION['username']=$username;
            $_SESSION['location']=$location;
            header("location:home.php");
} else {
  echo "Error updating record: " . mysqli_error($db);
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
            <div>
                    <label for="location">Location:</label>
                    <select name="location" id="location" class="form-control" >
                    <option value="MAIN GATE">MAIN GATE</option>
                     <option value="COS 2ND FLOOR">COS 2ND FLOOR</option>
                     </select>
                </div>
    
              <input type="submit" class="btn btn-block btn-outline-success" name="update_btn">
              <p>Done? <a href="home.php">Go home.</a>.</p>
            </div>
        </form>
    </div>    
</body>
</html>


