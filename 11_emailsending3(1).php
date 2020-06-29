<?php  session_start(); ?>
<?php include'1_connection.php'; ?>

<?php

$subject="date matched";
$body="hey i am $enro_matched  ,huree we have found each other ,lets talk on whatsapp!";
$headers= "From:$to_email";


if (mail($email,$subject,$body,$headers)) 
 {
          /* -----------------------------------------------------------------------------------------------------------------------------------------------*/

           $sql=" UPDATE  datingg SET status2='active'   WHERE  email ='$email'  ";
  /* -----------------------------------------------------------------------------------------------------------------------------------------------*/
         



  header('Location: https://vgecanonymousdating.com/5_Login.php');

           ?><script> alert( "succefully sent to $to_email...");</script><?php 
 

 }
 else
 {

              ?><script>alert( "failed sending......");</script><?php 
               

                 
 } 

 ?>                      