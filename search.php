<?php
    include "db_con.php";

    if(isset($_POST['search']))
    {
        $book_name = $_POST['book_name'];

        $stmt = $con->prepare("SELECT * FROM books WHERE book_name = ?");
        $stmt->bind_param("s", $book_name);

        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            header("Location: view.php?book_no=" . urlencode($row['book_no']) . "&book_name=" . urlencode($row['book_name']) . "&book_stock=" . urlencode($row['book_stock']));
            exit();
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("No record found")';
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
    <title>Search</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        header{
                color: blue;
                background-color: rgb(3,6,5,0);
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
            background-image: url("https://mir-s3-cdn-cf.behance.net/project_modules/disp/3651fa81381729.5cfe55542529a.jpg");
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
                width:40rem;
                margin: auto;
                color:white;
                margin-top: 170px;
                background-color: rgba(9, 4, 7, 0.42);
                border-radius: 12px;
                align-items:center;
                height:300px;
            }
            .img{
                width: 50px;
                height: 50px;
                margin:10px auto 0;
            }
            .user{
            width: 180px;
            height: 50px;
            border-radius:2%;
            font-size: 25px;
            background-color: pink;
            cursor:pointer;
        }
        .data{
            font-size: 30px;
            font-family: 'Times New Roman', Times, serif;
        }
        .name{
            width: 240px;
            height: 30px;
            font-size: 20px;
        }
    </style>
</head>
<body>
<header><marquee>Welcome to Search Book Page <img src="https://play-lh.googleusercontent.com/mtDBaLnbmAi3-PV8s4wpSeI28LayXVWgFciMurbDrRsmmDLesTVuMCbRkyPJZb65zA8" class="img"></marquee></header>
<form action="search.php" class="form" method="post" name="f1">
    <h1 align="center">Search Book</h1>
    <br>
    <center>
        <div class="mainContainer">
            <p class="data">Book Name:
                <input type="text" placeholder="Enter Book Name" autocomplete="off" name="book_name" class="name">
            </p>
            <br>
            <button type="submit" class="user" name="search"><i class="fas fa-search"></i> Search</button>
            <button type="button" class="user" onclick="window.open('studenthome.php', '_self')"><i class="fas fa-home"></i> Home</button>
            <button type="reset" class="user"><i class="fas fa-times"></i> Clear</button>
            <br>
        </div>
    </center>
</form>

</body>
</html>