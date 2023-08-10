<?php
session_start();

if (!isset($_SESSION['faculty_id'])) {
    header("Location: facultylogin.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Faculty</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        header {
            color: blue;
            background-color: rgba(147,209,255,0.5);
            font-size: 40px;
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
            border-radius: 10px;
            top: 0px;
            position: fixed;
            width: 100%;
            left: 0px;
            z-index: 1;
        }

        .img {
            width: 50px;
            height: 50px;
        }

        body {
            background-image: url("https://www.geethanjaliinstitutions.com/engineering/ece/img/carousel/2.png");
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            backdrop-filter: blur(10px);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .hello {
            text-align: center;
            font-size: 40px;
            margin-bottom: 20px;
        }

        .button-box {
            display: inline-block;
            padding: 20px;
            width:550px;
            margin-top:3px;
            height:300px;
            border: 5px solid black;
            border-radius: 10px;
            background-color: rgba(9, 4, 7, 0.42); 
        }

        .button-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            
        }

        .button {
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            border-radius:2px;
            border: 2px solid white;
            width: 300px;
            padding: 15px;
            height: 50px;
            margin: 10px auto;
            background-color: #4CAF50;
            color: #ffffff;
            font-size: 30px;
            cursor: pointer;
            border-radius:20px;
        }

        #add {
            background-color: #D85E13;
            
        }

        #change {
            background-color: #3554BB;
        }
        .button i {
            color: black;
            margin-right: 15px; 
        }
        p{
            font-size:30px;
            margin-top:2px;
            color:white;
        }
        #logout {
            background-color: #D83737;
        }
    </style>
</head>
<body>
<header><marquee>Welcome to Faculty Home Page <img src="https://play-lh.googleusercontent.com/mtDBaLnbmAi3-PV8s4wpSeI28LayXVWgFciMurbDrRsmmDLesTVuMCbRkyPJZb65zA8" class="img"></marquee></header>
<div class="hello">
    <h1>Hello, Admin</h1>
</div>
<div class="button-box">
    <div class="button-container">
        <p>Choose the Operation you want to perform</p>
        <button class="button" id="add" onclick="window.open('add.php', '_self')">
        <i class="fas fa-plus-circle" ></i>Add
        </button>
        <button class="button" id="change" onclick="window.open('update.php', '_self')">
        <i class="fas fa-edit"></i>Update
        </button>
        <button class="button" onclick="window.open('logout.php', '_self')" id="logout">
        <i class="fas fa-sign-out-alt"></i>Logout
        </button>
    </div>
</div>
</body>
</html>
