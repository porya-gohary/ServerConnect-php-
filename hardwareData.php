<?php
if($_SERVER['REQUEST_METHOD']=='POST'){


                $_POST = array_merge($_POST, (array) json_decode(file_get_contents('php://input')));


                $analog1_in=$_POST["analog_in1"];
                $analog2_in=$_POST["analog_in2"];
				
				$digital1_in=$_POST["digital_in1"];
				$digital2_in=$_POST["digital_in2"];
				
				
                $analog1_out=$_POST["analog_out1"];
                $analog2_out=$_POST["analog_out2"];
				
				$digital1_out=$_POST["digital_out1"];
				$digital2_out=$_POST["digital_out2"];


                require_once('dbConnect.php');

                $sql="INSERT INTO `inputs`(`id`, `time`, `analog1`, `analog2`,`digital1`,`digital2`) VALUES (null,null,'$analog1_in','$analog2_in','$digital1_in','$digital2_in')";
				
                $result=mysqli_query($cnn,$sql);

                if($result!=""){
                        //echo $sql;
                        //echo "done";
						$sql2="INSERT INTO `outputs`(`id`, `time`, `analog1`, `analog2`,`digital1`,`digital2`) VALUES (null,null,'$analog1_out','$analog2_out','$digital1_out','$digital2_out')";
						$result2=mysqli_query($cnn,$sql2);
						if($result2!=""){
							$sql3 = "SELECT * FROM exec ORDER BY time DESC LIMIT 1";
							 $result3=mysqli_query($cnn,$sql3);
							 if($result3!=""){
								$row1 = mysqli_fetch_array($result3);
								
								$record['main']=$row1['main'];
								$record['analog1']=$row1['analog1'];
								$record['analog2']=$row1['analog2'];
								$record['digital1']=$row1['digital1'];
								$record['digital2']=$row1['digital2'];

								echo json_encode($record);
							}else{
								echo"fail";
							}
						}else{
							echo "fail";
						}
						
                }else{

                
                        echo "fail";
                }

                mysqli_close($cnn);

        }
?>

