<?php
  session_start();
  $conn=mysqli_connect('localhost','root','','votingsys');
  if($conn){
    // echo 'Connected to MySQL Database';
    if(isset($_POST["name"])){   
        $name=$_POST["name"];
        $aadhar_no=$_POST["aadhar_no"];
        $email=$_POST["email"];
        $pwd=$_POST["pwd"];
        $sql1= "SELECT aadhar_number from votes where (aadhar_number='$aadhar_no');";
        $result1 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
        $row1= mysqli_fetch_Array($result1,MYSQLI_ASSOC);
        $count1= mysqli_num_rows($result1);
        if($count1 == 1){
          echo "<script> alert('Your vote has already been registered! Thank You for Voting with us!'); window.location.href='Homepage.html';</script>";
        }
        else{
          $sql="SELECT aadhar_number from vdbase where (aadhar_number='$aadhar_no' and password='$pwd' and email='$email' and name = '$name');";
          $result = mysqli_query($conn,$sql) or die( mysqli_error($conn));
          $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
          $count = mysqli_num_rows($result);
          if($count == 1){
                //echo mysqli_error($conn);
                $_SESSION['aadhar_no'] = $aadhar_no;
                header('location:voting.php');
          }
          else{
            echo "<script>alert('User details are incorrect!');</script>";
          }
        }   
    }    
}
else{
    echo mysqli_connect_error($conn);
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="login.css">
   </head>
   <script>
      function formValidation()
    {
      const aadharField = ``+document.getElementById("aadhar-number").value;
      if(aadharField.length == 12)
      {
        return true; 
      }
      else {
        alert("Aadhar length invalid.");
        return false;
      }
      return false;
    }
  </script>
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
  <div class="container">
    <div class="title">Login Details</div>
    <div class="content">
      <form action="" method="POST" onsubmit="return formValidation()">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" name="name" required>
          </div>
          <div class="input-box">
            <span class="details">Aadhar Number</span>
            <input type="text" id="aadhar-number" placeholder="Enter your Aadhar number" name="aadhar_no" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="text" placeholder="Enter your email" name="email" required>
          </div> 
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" name="pwd" required>
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
