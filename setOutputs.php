<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
                
                $a1=$_POST['analog1'];
                $a2=$_POST['analog2'];
                $d1=$_POST['digital1'];
                $d2=$_POST['digital2'];

                require_once('dbConnect.php');
        $sql="INSERT INTO `outputs`(`id`, `time`, `analog1`, `analog2`, `digital1`, `digital2`) VALUES (null,null,'$a1','$a2','$d1','$d2')";

        $result=mysqli_query($cnn,$sql);

                if($result!=""){
                        echo "done";
                }else{
                        echo "fail";
                }

                mysqli_close($cnn);




        }




?>
