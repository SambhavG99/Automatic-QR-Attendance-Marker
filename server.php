<?php
date_default_timezone_set('Asia/Kolkata');
$con = mysqli_connect("localhost", "root", "","test");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
else
{
    // echo "Connection succesfull!!";
}

if (isset($_POST['Mark'])) {
   
    $id_sql= $_POST['id'];
    
    //Checking whether ID exists or not     
    $id_check="SELECT * FROM gd t1 INNER JOIN student t2 ON t1.s_id = t2.s_id WHERE g_id='".mysqli_escape_string($con,$id_sql)."';"; 
    $result=mysqli_query($con,$id_check);
    $user=mysqli_fetch_assoc($result);
    $att_time=date("Y-m-d H:i:s"); 
        // if user exists
        if ($user) { 
                //Checking whether attendance already marked or not
                if($user['status']=="A"){
                    $query="UPDATE gd SET status='P',att_time='$att_time' WHERE g_id='{$id_sql}'";
                    mysqli_query($con,$query);
                    echo "STATUS : Marked Present ! <i class='fa fa-check-circle'></i>" ;
                    echo "<br>".$user['fname'];
                    echo "<br>".$user['phone'];
                }else{
                    echo 'Already Marked ! <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>' ;
                    echo '<br>'.$user['fname'];
                    echo '<br>'.$user['phone'];
                }
        } else {
            echo "Please Register yourself";
        }    
        exit();
}