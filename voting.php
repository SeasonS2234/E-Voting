<?php
    session_start();
    $conn=mysqli_connect('localhost','root','','votingsys');
    if($conn)
    {
        if(isset(($_POST['vote'])))
        {
            $party = substr($_POST['vote'],-3);  
            $aadhar = $_SESSION['aadhar_no'];
            $sql="INSERT INTO votes (aadhar_number,party_name) VALUES ('$aadhar','$party')";
            mysqli_query($conn,$sql);
            echo "<script>if(confirm('Thank You for Registering Your Precious Vote')){window.location.href='Homepage.html'}else{window.location.href='Homepage.html'}</script>";
            session_unset();
            session_destroy();
            //header('location:Homepage.html');
        }
    }
    else{
        echo mysqli_connect_error($conn);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting</title>
    <link rel="stylesheet" href="voting.css">
</head>
<body>
    <!--NAV BAR-->
    <nav>
        <p class="logo">E-Voting</p>
            <ul>
                <li class="noscroll"><a href="Homepage.html">HOME</a></li>
                <li class="noscroll"><a href="login.php">LOGIN</a></li>
                <li class="noscroll"><a href="Registration.php">REGISTER</a></li>
                <li class="noscroll"><a href="adminlogin.php">ADMIN LOGIN</a></li>
            </ul>
    </nav>
    <!--NAV BAR-->
    <div class="big__container">
        
        <!-- <section class="mainsec"> -->
         <div class="userdetails">
             <img class="user-img" src="user.png">
             <p class="user-info">--User Details go here--</p>
        </div>
        <div class="container">
            <div class="title">Vote for your Parties</div>
            <form action="voting.php" method="POST">
                <div class="symbol">
                    <div class="img__container">
                        <img class="party-img" src="bjp.png">
                    </div>
                    <p class="party-name">BJP</p>
                    <div class="btn">
                        <input type="submit" value="Vote FOR BJP" class="button-input" name="vote"  onclick="">
                    </div>
                </div>
                <div class="symbol">
                    <div class="img__container">
                        <img class="party-img" src="inc.jfif">
                    </div>
                    <p class="party-name">INC</p>
                    <div class="btn">
                        <input type="submit" value="Vote for INC" class="button-input" name="vote" onclick="">
                    </div>
                </div>
                <div class="symbol">
                    <div class="img__container">
                        <img class="party-img" src="bsp.jpg">
                    </div>
                    <p class="party-name">BSP</p>
                    <div class="btn">
                        <input type="submit" value="Vote for BSP" class="button-input" name="vote"onclick="">
                    </div>
                </div>
                    <div class="symbol">
                        <div class="img__container">
                            <img class="party-img" src="aap.jpg">
                        </div>
                        <p class="party-name">AAP</p>
                        <div class="btn">
                            <input type="submit" value="Vote for AAP" class="button-input" name="vote" onclick="">
                        </div>
                    </div>
                    <div class="symbol">
                        <div class="img__container">
                            <img class="party-img" src="cpi.png">
                        </div>
                        <p class="party-name">CPI</p>
                        <div class="btn">
                            <input type="submit" value="Vote for CPI" class="button-input" name="vote"  onclick="">
                        </div>
                    </div>
            </form>
        </div>
        <!-- </section> -->
    </div>

   <script>
    const noScrollArray = document.getElementsByClassName("noscroll");
   console.log(noScrollArray);
   /* noScrollArray.forEach(element => {
    console.log(element);           
    });*/
</script>
</body>
</html>