<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Login</title>
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
            background-image: url("https://img.freepik.com/free-photo/elevated-view-laptop-stationeries-yellow-backdrop_23-2147880496.jpg");
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
            width: 100px;
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
    <header><marquee>Welcome to Student Login Page &nbsp;&nbsp;<img src="https://play-lh.googleusercontent.com/mtDBaLnbmAi3-PV8s4wpSeI28LayXVWgFciMurbDrRsmmDLesTVuMCbRkyPJZb65zA8" class="img"></marquee></header>
    <form action="login.php" class="form" method="post" >
        <h1 align="center"><font color="white">Student Login</font></h1>
        <?php if(isset($_POST['submit'])) {?>
            <p class="error"><?php echo $_GET['error'];?></p>
        <?php } ?>
  <br>  
    <center>
    <div class="mainContainer">
        <p class="data">Username: <input type="text" placeholder="Student-ID" autocomplete="off" name="user" class="name"></p>
        <br><br>
        <p class="data">Password: <input type="password" placeholder="Password" autocomplete="off" name="password" class="pass"></p>
        <br><br>
        <input  type="submit" value="Login" class="user" name="submit">&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" value="Home" class="user" onclick="window.open('index.php', '_self')">&nbsp;&nbsp;&nbsp;&nbsp;
        <input  type="reset" value="Clear" class="user">
        <p class="data">New Member ?<a href="register.php"style="color:black;text-decoration:none">Sign-Up</a></p>
        <p class="data"><a href="forgot.php">Forgot Password</a></p>
        <br> 
    </div>
    </center>
</form>
</body>
</html>