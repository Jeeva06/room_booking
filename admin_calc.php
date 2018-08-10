
<!DOCTYPE html>
<html>
    <head>
        <title>Webber</title>
        <link rel="stylesheet" type="text/css" href="goal_css.css">
    </head>
    <body class="main-body">
        <div>
        <header id="main-header">The HOTEL MANAGEMENT
        <nav id="main-nav"><br><br>
            <ul>
                <li><a href="goal.php" target="_self" >BOOK ROOMS</a></li>
                <li><a href="rooms_available.php" target="_self">AVAILABILITY</a></li>
                <li><a href="contact.php" target="_self">CONTACT US</a></li>
                <li><a href="" style="background-color:dimgrey;color:white">ADMIN</a></li>
            </ul>
        </nav>
        </header></div>
        <div class="outer-form-container">
        <div class="admin-form-container">
    <form action="" method="post"><br><br>
        ADMIN NAME<br><input type="text" name="admin_name" required><br><br>
        PASSWORD<br><input type="password" name="pass" required><br><br>
        <input type="submit" name="sub_admin_form" value="Submit">
           <?php
           if(isset($_POST['sub_admin_form'])){
               $name=$_POST['admin_name'];
               $password=$_POST['pass'];
               if(($name=='admin')and($password=='admin')){
                   session_start();
                   $_SESSION['admin_name']=$name;//setting a session variable 1
                   header("location:admin_login_calc.php"); //if login is sucess redirect the page
//                   exit; // **
//                   session_destroy();
                
               }
               else{
                   echo '<script>alert("INCORRECT DETAILS!!!")</script>';
                   echo "<p style='color:red;'>*Incorrect details*<br> login failed :(</p>";
               }
           }  
            ?>
            </form>
                
            </div>
        </div>
        <footer class="main-footer">All &copy; rights reserved <strong style="color: tomato">www.webber-jeeva.com</strong>--2018</footer>
    </body>
</html>
