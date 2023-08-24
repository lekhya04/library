<?php
    include "db_con.php";
    if(isset($_POST['submit']))
    {
        $id= $_POST['stu_id'];
        $book_name= $_POST['book_name'];
        $q="select book_no from books where book_name='$book_name'";
        $r=mysqli_query($con,$q);
        if(mysqli_num_rows($r)>0)
        {
            $row=mysqli_fetch_assoc($r);
            $book_no=$row['book_no'];
        }
        else
        {
            echo '<script type="text/javascript">';
            echo 'alert("book name is incorrect please check")';
            echo '</script>';
        }
        $td=date("Y-m-d");
        $rd=date("Y-m-d",strtotime($td."+10days"));
        $sql = "INSERT INTO borrowed (stu_id, book_no, book_name, given_date, return_date) VALUES ('$id', '$book_no', '$book_name', '$td', '$rd')";
        $result = $con->query($sql);


        if($result == TRUE)
        {
            echo '<script type="text/javascript">';
            echo 'alert("Borrow successful! Return by: ' . $rd . '")';
            echo '</script>';

            $up = "UPDATE books SET book_stock = book_stock - 1 WHERE book_no = '$book_no'";
            $up_result = $con->query($up);
            if (!$up_result) 
            {
                echo "Error updating book stock: " . $con->error;
            }
        }
        else
        {
            echo "Error:".$sql."<br>".$con->error;
        }
        $con->close();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrow Books</title>
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
                margin-top: 130px;
                background-color:rgba(9, 4, 7, 0.42);
                border-radius: 12px;
                align-items:center;
                height:400px;
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
<header><marquee>Welcome to Student Borrow Book Page <img src="https://play-lh.googleusercontent.com/mtDBaLnbmAi3-PV8s4wpSeI28LayXVWgFciMurbDrRsmmDLesTVuMCbRkyPJZb65zA8" class="img"></marquee></header>
<form action="bookborrow.php" class="form" method="post" name="f1">
        <h1 align="center">Borrow Book</h1>
  <br>  
    <center>
    <div class="mainContainer">
    <p class="data">Student Id:<input type="text" placeholder="Student Id" autocomplete="off" name="stu_id" class="name"></p><br>
        <p class="data">Book Name:<input type="text" placeholder="Enter Book Name" autocomplete="off" name="book_name" class="name"></p><br>
        <input  type="submit" value="Borrow" class="user" name="submit">&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" value="Home" class="user" onclick="window.open('studenthome.php', '_self')">&nbsp;&nbsp;&nbsp;&nbsp;
        <input  type="reset" value="Clear" class="user">
        <br> 
    </div>
    </center>
</form>
</body>
</html>