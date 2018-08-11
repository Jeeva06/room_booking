<!DOCTYPE html>
<?php

?>
<hmtl>
    <head>
        <title>Webber</title>
        <link rel="stylesheet" type="text/css" href="goal_css.css">
        <link rel="stylesheet" href="font-awesome.min.css">
    </head>
    <body class="main-body">
        <div>
        <header id="main-header">The HOTEL MANAGEMENT
        <nav id="main-nav"><br><br>
            <ul>
                <li><a href="home.php">HOME</a></li>
                <li><a href="goal.php" target="_self" style="background-color:dimgrey;color:white">BOOK ROOMS</a></li>
                
                <li><a href="">CONTACT US</a></li>
                <li><a href="admin_login_calc.php" target="_self">ADMIN</a></li>
            </ul>
        </nav>
        </header></div>
<!--        <div class="outer-form-container">-->
        <div class="form-container">
    <form action="" method="post">
         <button onclick="window.location='rooms_available.php'">Check Rooms Availability</button>
       
        NAME<br><input type="text" name="cust_name" placeholder="James Bond" required><br><br>
        PHONE NUMBER<br><input type="number" name="ph_number" placeholder="99999*****" required><br><br>
        EMAIL ID<br><input type="text" name="email" required placeholder="example@mail.com"><br><br>
        ROOM NUMBER<br><input type="number" name="room" required placeholder="1 or 2"><br><br>    
        ADULTS<br><input type="number" name="adults" placeholder="4 adults"><br><br>
        CHILDREN<br><input type="number" name="child" placeholder="2 children" ><br><br>
            
               

        <input type="submit" name="sub_form" value="Submit">
<!--        <button class="btn"><i class="fa fa-bars">ICONIC</i></button>-->
           <?php
                if(isset($_POST['sub_form'])){
                    $name=$_POST['cust_name'];
                    $phone=$_POST['ph_number'];
                    $mail=$_POST['email'];
                    $adults=$_POST['adults'];
                    $child=$_POST['child'];
 
                    if($_POST['child']==''){
                        $child=0;
                    }
                    if($_POST['adults']==''){
                        $adults=0;
                    }
                    
                    $room=$_POST['room'];
                    $conn=new mysqli("localhost","root","","room");
                    $sql=$conn->query("select *from rooms where room_no=$room");
                    if($sql->num_rows>0){
                        while($row=$sql->fetch_assoc()){
                            if(($row['status']=='available')or($row['status']=='rejected')){
                                $conn=new mysqli("localhost","root","","room");
                                 $sql1=$conn->query("update rooms set name='$name',mail='$mail',phone=$phone,adults=$adults,children=$child,status='requested' where room_no=$room");
                                $msg="success!!! Your Request has been sent to the admin";
                                echo"<br><br>$msg";
                            }
                        }
                       
                    }
                    else{
                    echo "<br><p style='color:red'>This Room is unavailable. Please try with another room.</p>";
                    }
                }
        ?>
        
            </form>
            <div id="pic"></div>
                
           
        </div>
<!--         <footer class="main-footer">All &copy; rights reserved <strong style="color: tomato">www.webber-jeeva.com</strong>--2018</footer>-->
    </body>
   

</hmtl>