<?php
session_start();

//connect to database
$db=mysqli_connect("localhost","root","","docsys");

?>
<?php
    if(isset($_SESSION['message']))
    {
         echo "<div id='error_msg'>".$_SESSION['message']."</div>";
         unset($_SESSION['message']);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>DOCUMENT TRACKING</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
  

<br>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
  <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav center">
        <li><a href="home.php">HOME</a></li>
        <li><a href="login.php">LOGIN</a></li>
        <li><a href="register.php">SIGN UP</a></li>
        <li><a href="logout.php">LOG OUT</a></li>
      </ul>

    </div>
  </div>
</nav>


<main class="main-content">
 <div class="col-md-6 col-md-offset-4">
<div>
    <h4>Hello <?php echo $_SESSION['username']; ?></h4>
    <h4>Your document <?php echo $_SESSION['userid']; ?></h4>
    <h4>And is currently on <?php echo $_SESSION['location']; ?></h4>
    
</div>
</div>
<div class="form-group"><form action="update.php">
    <input type="submit" class="btn btn-block btn-outline-success" name="up_btn" value="UPDATE LOCATION">
  </form>
</div>
</main>
</div>
</body>
</html>
