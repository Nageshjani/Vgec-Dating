<?php  session_start(); ?>

<?php  include('1_connection.php');    ?>



<?php
                                                                               
if (isset($_GET['token']))
 {

	
$token=$_GET['token'];


                $emil_query="select * from datingg where token='".$token."' and status='inactive' ";
                   $query =mysqli_query($con,$emil_query);
                    $email_count =mysqli_num_rows($query);

                    if($email_count)
                    {

/*-----------------------------status--modified-- to---active -----------------------------------------------------------------*/				                                                   



                                                           $sql=" UPDATE  datingg SET status='active'   WHERE  token ='".$token."'  ";
                                                           
                                                            $emil_query = " select * from datingg where status ='active' ";
                                    $query =mysqli_query($con,$emil_query);
                                    $email_count =mysqli_num_rows($query);

                                    $_SESSION['msg555']=$email_count;


                                 $emil_query = " select * from datingg where status2 ='active' ";
                                    $query =mysqli_query($con,$emil_query);
                                    $email_count =mysqli_num_rows($query);

                                    $_SESSION['msg666']=$email_count/2;





												      if (mysqli_query($con,$sql))
												      {	
                                                                      $emil_query = " select * from datingg where status2 ='active' ";
																    $query =mysqli_query($con,$emil_query);
																    $email_count =mysqli_num_rows($query);

																    
																								           
																if(isset($_SESSION['msg']))
																 {
/*----------------------------------------------------------------------msg------------------------------------------------------------------*/				                                                   
				                                                   $_SESSION['msg']="Activated-Succefully ";

												                 /*  ?><script > alert("varified succefully");</script><?php */

												                 header('Location:'.BASE_URL.'5_Login.php');
												                  //header('Location: http://localhost/VGEC%202/5_Login.php');

												                 } 


				                                      } 


				       }else{
				            header('Location:'.BASE_URL.'5_Login.php');
				       }             

 }
                   




?> 