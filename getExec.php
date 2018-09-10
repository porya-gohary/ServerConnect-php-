<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
        date_default_timezone_set("Asia/Tehran");
        require_once('dbConnect.php');

        $username = $_POST['username'];

        $sql = "SELECT * FROM user WHERE username = '$username' ";

        $result = mysqli_query($cnn,$sql);

        $row = mysqli_fetch_array($result);

        if(isset($row)){
                $today = date("Y-m-d G:i:s");


        //      $sql2 = "SELECT * FROM adc WHERE time >= '$today' ";
                $sql2 = "SELECT * FROM exec ORDER BY time DESC LIMIT 1";
                $result2 = mysqli_query($cnn,$sql2);
                $row2 = mysqli_fetch_array($result2);
                if(isset($row2)){

                        $record2['time']= $row2['time'];
						$record2['main']= $row2['main'];
                        $record2['analog1']= $row2['analog1'];
                        $record2['analog2']= $row2['analog2'];
						$record2['digital1']= $row2['digital1'];
						$record2['digital2']= $row2['digital2'];
                        echo json_encode($record2);

                }else{
                        echo "Fail";

                }

        }else{
                echo "Fail";

        }




}
?>

