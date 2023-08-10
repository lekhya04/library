<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <style>
body {
  background-image: url("https://www.geethanjaliinstitutions.com/engineering/ece/img/carousel/2.png");
  background-size: cover;
  background-position: center;
  height: 100vh;
  margin: 0; 
  padding: 0;
  backdrop-filter: blur(5px);
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: 'Helvetica', sans-serif; 
  overflow: hidden; 
}
header {
  color: #333; 
  background: linear-gradient(135deg, #C1F78F, #8FF7B2, #D7F78F);
  font-size: 40px;
  text-align: center;
  font-family: 'Arial', sans-serif; 
  border-radius: 10px;
  padding: 20px; 
  position: fixed;
  width: 100%;
  height: 50px;
  top: 0;
  left: 0;
  z-index: 1;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); 
}
header marquee {
  color: #fff;
  font-size: 40px;
}

.button-container {
  text-align: center;
  padding: 20px;
}
.img{
  width:50px;
  height: 50px;;
}
.button {
  display: inline-block;
  margin: 100px; 
  border: none;
  background: #e6dcca; 
  border-radius: 10px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); 
  transition: transform 0.2s ease-in-out; 
}

.button:hover {
  transform: scale(1.05); 
}

.but {
  display: inline-block;
  padding: 10px 20px;
  border: none;
  background-color: transparent;
  color: #333; 
  font-size: 16px;
  cursor: pointer;
}
.lib,
.stu {
  border-radius: 50%; 
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); 
  width: 250px;
  height: 250px;
}
h1 {
  margin-top: 10px;
  font-size: 20px;
  color: #444;
}

    </style>
</head>
<body background="gctc.png">
<?php
    session_start();
    if (isset($_SESSION['id'])) {
        header("Location: studenthome.php");
        exit();
    }
    if (isset($_SESSION['faculty_id'])) {
      header("Location: facultyhome.php");
      exit();
  }
  ?>
    ?>
    <header><marquee>Welcome to Library of Geetanjali College Of Engineering And Technology <img src="https://play-lh.googleusercontent.com/mtDBaLnbmAi3-PV8s4wpSeI28LayXVWgFciMurbDrRsmmDLesTVuMCbRkyPJZb65zA8" class="img"></marquee></header>
    <div class="button-container">
            <div class="button">
            <button class="but" onclick="<?php echo isset($_SESSION['faculty_id']) ? "window.open('facultyhome.php', '_self')" : "window.open('facultylogin.php', '_self')" ?>">
                    <img src="https://cdn-icons-png.flaticon.com/128/29/29302.png" alt="Librarian Button" class="lib">
                </button>
              <h1>Librarian</h1>
            </div>
            <div class="button">
            <button class="but" onclick="<?php echo isset($_SESSION['id']) ? "window.open('studenthome.php', '_self')" : "window.open('loginpage.php', '_self')" ?>">
                    <img src="https://cdn-icons-png.flaticon.com/128/2203/2203016.png" alt="Student Button" class="stu">
                </button>
              <h1>Student</h1>
            </div>
      </div>
</body>
</html>