
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

                <li><a href="goal.php" target="_self" >HOME</a></li>
                <li><a href="rooms_available.php" target="_self">AVAILABILITY</a></li>
                <li>
             <form action="" method="post">
                <input style="font-size:18px;border-radius:10px;background-color:#101829;position:absolute;top:60%;left:70%;" type="submit" name="logout_submit" value="Logout">
            </form></li>

             <?php
                session_start();
                $name=$_SESSION['admin_name'];
                echo"<p style='color:white;font-size:26px;padding:10px;'>hello ".$name."</p>";
                ?>
                <li><a href="" style="background-color:dimgrey;color:white;">ADMIN</a></li>
            </ul>
        </nav>
        </header></div>
        <div class="outer-form-container">
        <div class="admin-form-container">
            <?php
            $roomie=0;
//            session_start();
            if(!isset($_SESSION['admin_name'])){
               
                header("location:admin_calc.php");
            }elseif(isset($_SESSION['admin_name'])){
                $session_value=$_SESSION['admin_name'];
                $conn=new mysqli("localhost","root","","room");
                $sql=$conn->query("select *from rooms where status='requested'");
               
                if($sql->num_rows>0){
                     echo "<table>
                <th>NAME</th>
                <th>ROOM NO</th>
                <th>STATUS </th>";
                    while($row=$sql->fetch_assoc()){

                        echo"<tr>";
                        echo"<td>$row[name]</td>";
                        echo"<td>$row[room_no]</td>";
                        echo"<td>$row[status]</td>";
                        $roomie=$row['room_no']; //put single quotes to assign values
                        
                        echo"<form method='post'><td id=spcl style='border:none'><input style='background-color:red;' type='submit' value='REJECT' name='rem_mem'></td><td id=spcl style='border:none'><input style='background-color:green;'type='submit' value='ACCEPT' name='accept_member'></td><td style='border:none'><input type='hidden' name='room_number' value='$row[room_no]'></td></tr></form>";
                        
//                        echo"<td id=spcl><form method='post'><input style='background-color:green'type='submit' value='ACCEPT' name='accept_member'></form></td></tr>";
//                         
                    
                    
                    
//                     echo "<br><br>$sql->num_rows more pending requests!!!";
                }
               echo"</table>";
                }
                 else{
                    echo"No more pending requests!!!";
                }
            }
            ?>
           <?php   
            function accept($final_room_number){
                $conn=new mysqli("localhost","root","","room");
                $sql=$conn->query("update rooms set status='accepted' where room_no=$final_room_number");
                header("location:admin_login_calc.php");
            
            }
//            if(array_key_exists('test',$_POST)){
            if(isset($_POST['accept_member'])){
               $final_room_number=$_POST[room_number];
                accept($final_room_number);
            }
            if(isset($_POST['rem_mem'])){
                $final_room_number=$_POST[room_number];
                remove( $final_room_number);
            }
            function remove( $final_room_number){
                $conn=new mysqli("localhost","root","","room");
                $sql=$conn->query("update rooms set status='rejected' where room_no= $final_room_number");
                header("location:admin_login_calc.php");
              
            }
            ?>
            
            <?php
            if(isset($_POST['logout_submit'])){
        
                session_destroy();
                header("location:admin_calc.php");
            }
            ?>
            </div>
        </div>
<!--            <footer class="main-footer">All &copy; rights reserved <strong style="color: tomato">www.webber-jeeva.com</strong>--2018</footer>-->
    </body>
</html>
