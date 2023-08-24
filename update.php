<?php
    include "db_con.php";

    if(isset($_POST['submit']))
    {
        $book_no = $_POST['book_no'];
        $book_name = $_POST['book_name'];
        $book_stock = $_POST['book_stock'];

        $stmt = $con->prepare("UPDATE books SET book_name = ?, book_stock = ? WHERE book_no = ?");
        $stmt->bind_param("ssi", $book_name, $book_stock, $book_no);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo '<script type="text/javascript">';
            echo 'alert("Successfully updated")';
            echo '</script>';
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("No records were updated")';
            echo '</script>';
        }

        $stmt->close();
        $con->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        header{
                color: blue;
                background-color: rgb(11, 226, 162);
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
            background-image: url("https://www.geethanjaliinstitutions.com/engineering/ece/img/carousel/2.png");
            background-position: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            backdrop-filter: blur(10px);
            display: flex;
            align-items: center;
            justify-content: center;
            }
            .form{
                width:40rem;
                margin: auto;
                color:white;
                margin-top: 150px;
                background-color:rgba(9, 4, 7, 0.42);
                border-radius: 12px;
                align-items:center;
                height:450px;
            }
            .img{
                width: 50px;
                height: 50px;
                align-self: baseline;
            }
            .user{
            width: 100px;
            height: 30px;
            font-size: larger;
            background-color: rgb(154, 235, 154);
            cursor:pointer;
        }
        .data{
            font-size: larger;
            font-family: 'Times New Roman', Times, serif;
        }
        .name{
            width: 200px;
            height: 30px;
            font-size: large;
        }
    </style>
</head>
<body>
<header><marquee>Welcome to Faculty Update Book Page <img src="https://play-lh.googleusercontent.com/mtDBaLnbmAi3-PV8s4wpSeI28LayXVWgFciMurbDrRsmmDLesTVuMCbRkyPJZb65zA8" class="img"></marquee></header>
<form action="update.php" class="form" method="post" name="f1">
        <h1 align="center">Update Book</h1>
  <br>  
    <center>
    <div class="mainContainer">
        <p class="data">Book Number:<input type="text" placeholder="Enter Book No" autocomplete="off" name="book_no" class="name"></p>
        <br>
        <p class="data">Book Name:<input type="text" placeholder="Enter Book Name" autocomplete="off" name="book_name" class="name"></p>
        <br>
        <p class="data">Book Stock:<input type="text" placeholder="Enter Book Stock" autocomplete="off" name="book_stock" class="name"></p>
        <br>
        <input  type="submit" value="Update" class="user" name="submit">&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" value="Home" class="user" onclick="window.open('facultyhome.php', '_self')">&nbsp;&nbsp;&nbsp;&nbsp;
        <input  type="reset" value="Clear" class="user">
        <br> 
    </div>
    </center>
</form>
</body>
</html>
