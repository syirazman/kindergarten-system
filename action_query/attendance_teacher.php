<?php
$username="root";  
$password="";  
$hostname = "localhost";  
//connection string with database  
$dbhandle = mysqli_connect($hostname, $username, $password)  
or die("Unable to connect to MySQL");  
echo "";  
// connect with database  
$selected = mysqli_select_db($dbhandle, "kindergarten")  
or die("Could not select examples");

$username = $_POST['username'];
$password = $_POST['password'];
date_default_timezone_set("Asia/Kuala_Lumpur");
$time = date('H:i:s A'); //Returns IST
$date = date('d M Y');
$result = mysqli_query($dbhandle, "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1");

if(mysqli_num_rows($result) != 1){
    $array = array(
        'status' => 'error',
        'message' => 'You enter wrong credential!',
    );
    echo json_encode($array);
} else{
    $datas = mysqli_fetch_assoc($result);
    $lectID = $datas['id'];
    $checkAtt = mysqli_query($dbhandle, "SELECT * FROM kehadiran_cikgu WHERE users_id = '$lectID' AND date = '$date'");

    if(mysqli_num_rows($checkAtt) != 1){
        $insert = mysqli_query($dbhandle, "INSERT INTO kehadiran_cikgu (users_id,date,checkin) VALUES ('$lectID','$date','$time')");
        if($insert===TRUE)
        {
            $array = array(
                'status' => 'success',
                'message' => 'You checkin on '.$time,
            );
            echo json_encode($array);
        }						
        else
        {
            $array = array(
                'status' => 'error',
                'message' => 'Unable to store the attendance!',
            );
            echo json_encode($array);
        } 
    } else {

        $different = mysqli_fetch_assoc($checkAtt);
        $timezone = new DateTimeZone('Asia/Kuala_Lumpur');
        $time1 = DateTime::createFromFormat('H:i:s a',$different['checkin'],$timezone);
        $time2 = DateTime::createFromFormat('H:i:s a',$time,$timezone);
        $diff = $time1->diff($time2);
        // echo json_encode($different);
        $totalHour = $diff->format('%h hours, %i minutes and %s seconds');
        
	    $update = mysqli_query($dbhandle, "UPDATE kehadiran_cikgu SET checkout = '$time', total_hours = '$totalHour' WHERE users_id = $lectID");

        if($update===TRUE)
        {
            $array = array(
                'status' => 'success',
                'message' => 'You check out on '.$time.' total hours '.$totalHour,
            );
            echo json_encode($array);
        }						
        else
        {
            $array = array(
                'status' => 'error',
                'message' => 'Something went worng!',
            );
            echo json_encode($array);
        }

    }
}
?>