<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="results.css">
    <title>results</title>
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
    <div class="big__container">
        
        <!-- <section class="mainsec"> -->
        <div class="container">
            <div class="title">Votes Analysis</div>
            <form action="voting.php" method="POST">
                <div class="symbol">
                    <div class="img__container">
                        <img class="party-img" src="bjp.png">
                    </div>
                    <p class="party-name">BJP</p>
                    <div class="btn">
                        <span class="button-input" id="BJP">Total no. of votes : </span>
                    </div>
                </div>
                <div class="symbol">
                    <div class="img__container">
                        <img class="party-img" src="inc.jfif">
                    </div>
                    <p class="party-name">INC</p>
                    <div class="btn">
                        <span class="button-input" id="INC">Total no. of votes : </span>
                    </div>
                </div>
                <div class="symbol">
                    <div class="img__container">
                        <img class="party-img" src="bsp.jpg">
                    </div>
                    <p class="party-name">BSP</p>
                    <div class="btn">
                        <span class="button-input" id="BSP">Total no. of votes : </span>
                    </div>
                </div>
                    <div class="symbol">
                        <div class="img__container">
                            <img class="party-img" src="aap.jpg">
                        </div>
                        <p class="party-name">AAP</p>
                        <div class="btn">
                            <span class="button-input" id="AAP">Total no. of votes : </span>
                        </div>
                    </div>
                    <div class="symbol">
                        <div class="img__container">
                            <img class="party-img" src="cpi.png">
                        </div>
                        <p class="party-name">CPI</p>
                        <div class="btn">
                            <span class="button-input" id="CPI">Total no. of votes : </span>
                        </div>
                    </div>
            </form>
        </div>
        <!-- </section> -->
    </div>
</body>
<?php
    $conn= mysqli_connect('localhost','root','','votingsys');
    if($conn){
        $countQuery="SELECT count(*),party_name FROM `votes` group by `party_name`";
        /*$inc_query="SELECT COUNT(*) FROM votes where party_name='INC';";
        $bsp_query="SELECT COUNT(*) FROM votes where party_name='BSP';";
        $aap_query="SELECT COUNT(*) FROM votes where party_name='AAP'";
        $cpi_query="SELECT COUNT(*) FROM votes where party_name='CPI'";
        mysqli_query($conn,$bjp_query);
        mysqli_query($conn,$inc_query);
        mysqli_query($conn,$bsp_query);
        mysqli_query($conn,$app_query);
        */

        $res = mysqli_query($conn,$countQuery);
        while($row = mysqli_fetch_array($res))
        {
            echo "<script> document.getElementById('".$row['party_name']."').innerHTML+=".$row['count(*)']."</script>";
        }
    }
    else{
        mysqli_connect_error($conn);
    }


?>

</html>