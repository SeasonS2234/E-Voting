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
          $gender=$_POST["gender"];
          $check="SELECT aadhar_number from vdbase where (aadhar_number='$aadhar_no');";
          $res1= mysqli_query($conn,$check) or die(mysqli_error($conn));
          $row1= mysqli_fetch_array($res1,MYSQLI_ASSOC);
          $count1= mysqli_num_rows($res1);
          if($count1 == 1){
             echo "<script> alert ('User with same aadhar number has already been registered!'); window.reload();</script>"; 
          }
          else{
            $sql="INSERT INTO vdbase (name,aadhar_number,email,password,gender) VALUES ('$name','$aadhar_no','$email','$pwd','$gender')";
            mysqli_query($conn,$sql);
            //echo mysqli_error($conn);
            $yourURL="./login.php";
            echo ("<script>alert('You have been Successfully Registered as a Voter!'); location.href='$yourURL';</script>");
            exit();
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
     <link rel="stylesheet" href="registration_css.css">
   </head>
   <script>
    function formValidation()
    {
      const aadharField = ``+document.getElementById("aadhar-number").value;
      var passwordField = ``+document.getElementById("pass1").value;
      var nameField = ``+document.getElementById("name1").value;
      if(passwordField.length<6)
      {
        alert("Password should be at least 6 characters long!")
        return false;
      }
      if(nameField==null)
      {
        alert("Please Enter your Name!")
        return false;
      }
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
    <div class="title">Voter Registration</div>
    <div class="content">
      <form method="POST" action="" onsubmit="return formValidation()">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" id="name1" name="name"required>
          </div>
          <div class="input-box">
            <span class="details">Aadhar Number</span>
            <input type="number" size="12" id="aadhar-number" placeholder="Enter your Aadhar number" name="aadhar_no" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="Enter your email" name="email" required>
          </div> 
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password" placeholder="Enter your password" id="pass1" name="pwd" required>
          </div>
        </div>
        <div class="gender-details">
          <input type="radio" name="gender" value="Male" id="dot-1">
          <input type="radio" name="gender" value="Female" id="dot-2">
          <input type="radio" name="gender" value="PNTS" id="dot-3"  checked>
          <span class="gender-title">Gender</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Male</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Female</span>
          </label>
          <label for="dot-3">
            <span class="dot three"></span>
            <span class="gender">Prefer not to say</span>
            </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" value="Register">
        </div>
      </form>
    </div>
  </div>

</body>
</html>
