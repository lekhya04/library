<!DOCTYPE html>
<html>

<head>
    <title>
        REGISTRARTION
    </title>
    <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            background-image: url("https://image.shutterstock.com/image-photo/closeup-businesswoman-hands-holding-white-260nw-251186056.jpg");
            
      background-size: cover;
      background-position: center;
      height: 100vh;
      margin: 0;
      padding: 0;
      backdrop-filter: blur(10px);
      display: flex;
      align-items: center;
      justify-content: center;
        }
        .img{
            width: 50px;
            height: 50px;
            margin: 13px auto 0;
        }
        .input {
            margin-top: 8px;
            text-align: center;
        }

        p {
            margin-bottom: 0%;
        }

        .flex {
            display: flex;
            text-align: center;
        }

        .dob {
            margin-left:25%;
            align-items:center;
            height:40px;
        }
        .occupation {
            margin-left: 3%;
        }
        .danger{
            color: red;
            text-align: center;
        }
        .data{
            width:300px;
            height:30px;
            font-size:19px;
            border-radius:8px;
        }
        .log{
            color:black;
            font-weight:bold;
        }
        .but{
            width:150px;
            height:30px;
            background-color:#85D6DF;
            font-size:19px;
            border-radius:8px;
            cursor:pointer;
        }
        .form{
            width: 40rem;
            margin: auto;
            color: white;
            margin-top: 30px;
            margin-top: 80px;
            border-radius: 12px;
            align-items: center;
            height: 450px;
            background-color: rgba(0, 0, 0, 0.3); 
            backdrop-filter: blur(10px); 
            padding: 20px;
        }

        h3{
            text-align:center;
            font-size:30px;
        }
        .icon{
            color:black;
            font-size: 24px;
        }
        .login{
            font-size: larger;
            color:blue;
            font-family: 'Times New Roman', Times, serif;
        }
        .s{
            color:orange;
            text-align:center;
        }
    </style>
</head>

<body>
    <header><marquee>Student Registration Page &nbsp;&nbsp;<img src="https://play-lh.googleusercontent.com/mtDBaLnbmAi3-PV8s4wpSeI28LayXVWgFciMurbDrRsmmDLesTVuMCbRkyPJZb65zA8" class="img"></marquee></header>
    <div class="register">
        <div class="form">
        
            
                <h3><font color="black">Student Registration</font></h3>
            <?php
            $conn=mysqli_connect('localhost','root','','library');
            if(mysqli_connect_error()){
                exit("Error connecting to Database");
            }
            if(isset($_POST["submit"])){
               $name=$_POST["name"];
               $id=$_POST["id"];
               $email=$_POST["email"];
               $password=$_POST["password"];
               $dob=$_POST["dob"];
               $rp=$_POST["rp"];
            $errors=array();
        
            if(strlen($password)<8){
                array_push($errors,"password is too weak");
            }
            if($password!=$rp){
                array_push($errors,"password is not matched");
            }
            
            if($stmt=$conn->prepare( 'SELECT * FROM student WHERE id = ?')){
                $stmt->bind_param('s',$_POST['id']);
                $stmt->execute();
                $stmt->store_result();

                if($stmt->num_rows()>0){
                    array_push($errors,"id already exists!");
                }
            }
           
            if(count($errors)>0){
                foreach($errors as $error){
                    echo "<div class='danger'>$error</div>";
                }
            }
            else{
            
                if($stmt=$conn->prepare('INSERT INTO student (username,password,id,email,dob) VALUES ( ?, ?, ?, ?, ? )')){
    
                    $stmt->bind_param("sssss",$name,$password,$id,$email,$dob);
                    $stmt->execute();
                    
         echo '<script type="text/javascript">';
         echo 'alert("successfully registered")';
         echo '</script>';
                }
            else{
                    die("Something went wrong");
                }
               }
        }
            ?>
            <form action="register.php" method="post" id="form">
                <div class="name">
                    <div class="input">
                    <i class="icon fas fa-user"></i>
                        <input type="text" placeholder="Enter your Full name" name="name" id="name" class="data" required>
                        
                    </div>
                </div>
                <div class="idno">
                    <div class="input">
                    <i class="icon fas fa-address-card"></i>
                        <input type="text" placeholder="Enter Identity number" name="id" id="id" class="data" required>
                        
                    </div>
                </div>
                <div class="email">
                    <div class="input">
                    <i class="icon fas fa-envelope" ></i>
                        <input type="email" placeholder="Enter your Email" name="email" id="email" class="data" required>
                        
                    </div>
                </div>
                <div class="password">
                    <div class="input">
                    <i class="icon fas fa-lock"></i>
                        <input type="password" placeholder="Enter Password" name="password" id="password" class="data" required>
                        
                    </div>
                </div>
                <div class="check password">
                    <div class="input">
                    <i class="icon fas fa-lock"></i>
                        <input type="password" placeholder="Re-enter password" name="rp" id="rp" class="data" required>
                        
                     </div>
                </div>

                <div class="gender">
                    <div class="input">
                        <input type="radio" name="gender" id="male"  value="male">
                        <i class="icon fas fa-male "></i>
                        <label for="male" style="color:black;">Male</label>
                        
                        <input type="radio" name="gender" id="female"  value="female">
                        <i class="icon fas fa-female "></i>
                        <label for="female" style="color:black;">Female</label>
                        
                    </div>
                </div>
                <div class="flex">
                    <div class="dob">
                        <div class="input">
                            <input type="date" name="dob" id="dob" required class="data">
                        </div>
                    </div>
                </div>
                <div class="select_btn">
                    <div class="input">
                    <input type="submit" value="Register" class="but" name="submit">&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="reset" class="but" value="Clear" name="clear">
                </div>
                <div class="message">
                    <div class="input">
                        <p class="login">Already registerd then <a href="loginpage.php" target="_self" class="log">Login</a> </p>
                    </div>
                </div>

            </form>
        </div>
    </div>
    
</body>

</html>