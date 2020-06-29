<?php


$subject="Activation Email";
$body = "Hi\n
          Welcome to vgecanonymousdating Family\n
          You just create account on <b>vgecanonymousdating.com</b>\n
          <a href='".BASE_URL."4_Activation.php?token=".$token."'>Click Here to Verify</a>\n
          Thank you !";

$headers= "From:admin@vgecanonymousdating.com";



if (mail($email,$subject,$body,$headers))
 {
       /*-----------------------------------------------------msg-----------------------------------------------------------------------------------*/                                                          
       
              $_SESSION['msg']="Check-Your-Mailbox";
              
              /*--------------------------------------------new updates-------------------------------------------------------------------------------------*/

                                       $emil_query="select * from datingg where email='$email' ";
                                       $query =mysqli_query($con,$emil_query);
                                       
                                      $email_count =mysqli_num_rows($query);
                                      $email_pass= mysqli_fetch_assoc($query);
                                      $user_enrollment=$email_pass['enrollment'];
                                       $_SESSION['msg777']=$user_enrollment;
                    
/*--------------------------------------------new updates-------------------------------------------------------------------------------------*/




          header('Location: '.BASE_URL.'5_Login.php');
           ?><script > alert("succefully sent to $to_email...");</script><?php
                         
           
                                  
              
 }
 else
 {

              ?>
               <script>
                alert( "failed sending......");
               </script>

                 <?php
 }

 ?>      