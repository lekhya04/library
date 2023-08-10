<?php
    session_start();
     if(isset($_SESSION['id']) && isset($_SESSION['username']))
     {
    ?>
<!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Student</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
            <style>
                header{
                color: blue;
                background-color: rgb(11, 226, 162,0);
                font-size: 40px;
                text-align: center;
                font-family:'Times New Roman', Times, serif;
                border-radius: 10px;
                top: 0px;
                backdrop-filter: blur(10px);
                position: fixed;
                width: 100%;
                left: 0px;
                z-index: 1;
            }
            .img{
                width: 50px;
                height: 50px;
            }
            
            body {
                background-image: url("https://images.unsplash.com/photo-1615715757401-f30e7b27b912?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxjb2xsZWN0aW9uLXBhZ2V8MXwxMTI1NDUzfHxlbnwwfHx8fHw%3D&w=1000&q=80");
            background-size: cover;
            background-position: center;
            height: 100vh;
            margin: 0;
            padding: 0;
            backdrop-filter: blur(10px);
            display:block;
            align-items: center;
            justify-content: center;
            }
            .hello{
                
                font-family: 'Courier New', monospace;
                font-size: 40px;
                text-align: center;
                align-items: center;
                padding-top: 80px;
            }
            .button-container {
                text-align: center;
                padding: 20px;
                margin-top: 0px;
                
                }
            .button {
                display: inline-block;
                margin: 10px;
                padding: 0;
                border: none;
                justify-content: space-between;
                background: none;
                cursor: pointer;
                }
            .but{
                display: flex;
                align-items: center;
                justify-content: center;
                border: none;
                border-radius: 5px;
                width: 280px;
                height: 60px;
                padding: 10px;
                font-size: 20px;
                background-color: red;
                color: #ffffff;
                cursor: pointer;
                }
                .but i {
                     margin-right: 10px;
                     color:black;
                }
            #search{
                background-color: #A04AAC;
                font-size: 35px;
                }
            #logout{
                    background-color: #B02525;
                    font-size: 35px;
                }
            </style>
        </head>
        <body>
        <header><marquee>Welcome to Library of Geetanjali College Of Engineering And Technology <img src="https://play-lh.googleusercontent.com/mtDBaLnbmAi3-PV8s4wpSeI28LayXVWgFciMurbDrRsmmDLesTVuMCbRkyPJZb65zA8" class="img"></marquee></header>
            <div class="hello">
              <h1 class="hi">Hello, <?php echo $_SESSION['username']; ?></h1>
            </div>
            <div class="button-container">
                <div class="button">
                    <button class="but" id="search" onclick="window.open('search.php', '_self')">
                    <i class="fas fa-search"></i>Search
                    </button>
                  
                </div>
                <div class="button">
                    <button class="but" id="search" onclick="window.open('total.php', '_self')">
                    <i class="fas fa-eye"></i>View
                    </button>
                  
                </div><br><br>
                <div class="button">
                    <button class="but" onclick="window.open('logout.php', '_self')" id="logout">
                    <i class="fas fa-sign-out-alt"></i>Logout
                    </button>
                 
                </div>
          </div>
        </body>
        </html>
        <?php
     }
     else
     {
        header ("Location:loginpage.php");
        exit();
     }
?>