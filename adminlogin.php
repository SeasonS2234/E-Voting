<?php
    session_start();
    $conn=mysqli_connect('localhost','root','','votingsys');
    if($conn){
        // echo "Connected to DB";
        if(isset($_POST["aemail"])){
            $aemail= $_POST["aemail"];
            $apass= $_POST["apass"];
            $sql1="SELECT * FROM admin WHERE (admin_email='$aemail');";
            $result= mysqli_query($conn,$sql1) or die(mysqli_error($conn));
            $row= mysqli_fetch_array($result,MYSQLI_ASSOC);
            $count=mysqli_num_rows($result);
            if($count == 1){
                echo "<script> alert('Welcome Admin !'); window.location.href='results.php';</script>";
            }
            else{
                echo "<script> alert('Admin Details are incorrect'); window.reload();</script>";
            }            
        }
    else{
        echo mysqli_connect_error($conn);
    }
  }    

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="adminlogin.css">
   </head>
<body>
  <!--NAV BAR-->
    <nav>
        <p class="logo">E-Voting</p>
            <ul>
                <li><a href="Homepage.html">HOME</a></li>
                <li><a href="login.php">LOGIN</a></li>
                <li><a href="Registration.php">REGISTER</a></li>
                <li><a href="adminlogin.php">ADMIN LOGIN</a></li>
            </ul>
    </nav>
   <!--NAV BAR--> 
  <div class="container">
    <div class="title">Login Details</div>
    <div class="content">
      <form action="" method="POST" onsubmit="">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Admin-Email</span>
            <input type="email" placeholder="Enter your email" name="aemail" required>
          </div> 
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="apass" required>
          </div>
        </div>
        </div>
        <div class="button">
          <input type="submit" value="Login">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
