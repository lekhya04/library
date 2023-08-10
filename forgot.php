<!DOCTYPE html>
<html lang="en">
<head>
    <title>Forgot Password</title>
    <style>
        header{
                color: blue;
                background-color: rgba(147,209,255,0.5);
                font-size: 40px;
                text-align: center;
                font-family:'Times New Roman', Times, serif;
                border-radius: 10px;
                top: 0px;
                position: fixed;
                width: 100%;
                left: 0px;
                z-index: 1;
            }
        body{
            background-size: cover;
            background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWs8nSyhnOtAeqg-9ASEneydlDaILG4jzZxA&usqp=CAU");
      background-position: center;
      height: 100vh;
      margin: 0;
      padding: 0;
      backdrop-filter: blur(15px);
      display: flex;
      align-items: center;
      justify-content: center;
        }
        .form{
            width: 40rem;
            margin: auto;
            color: white;
            margin-top: 120px;
            background-color: rgba(9, 4, 7, 0.42); 
            border-radius: 12px;
            align-items: center;
            height: 450px;
            backdrop-filter: blur(10px);
        }
        .img{
            width: 50px;
            height: 50px;
            align-self: baseline;
        }
        .user{
            width: 200px;
            height: 40px;
            font-size: larger;
            cursor:pointer;
            background-color: rgb(154, 235, 154);
        }
        .data{
            font-size: larger;
            font-family: 'Times New Roman', Times, serif;
        }
        .name,.pass{
            width: 200px;
            height: 30px;
            font-size: large;
        }
    </style>
</head>
<body>
    <center>
    <header><marquee>Forgot Password Page &nbsp;&nbsp;<img src="https://play-lh.googleusercontent.com/mtDBaLnbmAi3-PV8s4wpSeI28LayXVWgFciMurbDrRsmmDLesTVuMCbRkyPJZb65zA8" class="img"></marquee></header>
    <form action="forgot.php" class="form" method="post" >
        <h1 align="center"><font color="white">Forogt Password</font></h1>
        <?php if(isset($_GET['error'])) {?>
            <p class="error"><?php echo $_GET['error'];?></p>
        <?php } ?>
        <?php 
            $con=mysqli_connect("localhost","root","","library");
            if(!$con)
            {
                die("Connection failed"." ".mysqli_connect_error());
            }
            if(isset($_POST['reset']))
            {
                $username=$_POST['user'];
                $pass=$_POST['password'];
                $rp=$_POST['reenter'];
                if($username and $pass)
                {
                    if($pass==$rp)
                    {
                        $sql="select * from student where id='$username'";
                        $result=mysqli_query($con,$sql);
                        if(mysqli_num_rows($result)>=1)
                        {
                            $query="update student set password='$pass' where id='$username'";
                            $re=mysqli_query($con,$query);
                            if ( $re === TRUE) 
                            {
                                echo '<script type="text/javascript">';
                                echo 'alert("successfully updated")';
                                echo '</script>';
                            }
                        }
                        else
                        {
                           
                            echo "username not found";
                        }
                    }
                    else
                    {
                        echo "password did not match";
                    }
                }
                else
                {
                    echo "username or password is empty";
                }
            }
        ?>
  <br>  
    <center>
    <div class="mainContainer">
        <p class="data">Username: <input type="text" placeholder="Student-ID" autocomplete="off" name="user" class="name"></p>
        <br>
        <p class="data">New Password: <input type="password" placeholder="Password" autocomplete="off" name="password" class="pass"></p>
        <br>
        <p class="data">Re-enter Password: <input type="password" placeholder="Password" autocomplete="off" name="reenter" class="pass"></p>
        <input type="submit" value="Reset Password" name="reset" class="user">
        <input type="button" value="Cancel" class="user" onclick="window.open('loginpage.php', '_self')">
        <br>
        <p class="data"><a href="loginpage.php" style="color:black;">Back to Login</a></p>
    </div>
    </center>
</form>
</center>
</body>
</html>