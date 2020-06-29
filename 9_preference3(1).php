
<?php
//include ''.BASE_URL.'1_connection.php';
/*

$emil_query = " select * from datingg where email ='$email' ";
$query =mysqli_query($con,$emil_query);
$email_count =mysqli_num_rows($query);
 $email_pass= mysqli_fetch_assoc($query);
$user_enrollment=$email_pass['enrollment'];
$pre3=$email_pass['pre3'];
  

/*---------------------------------------------------------------msg-------------------------------------------------------------------------*/				                                                   

    $_SESSION['msg']="You will Be Nofified When Your Preference Matches "; 


/*---------------------------------------------------------------edited-------------------------------------------------------------------------*/				                                                   






                        $emil_query3="select * from datingg where enrollment='".$pre3."' ";
			            $query3=mysqli_query($con,$emil_query3);
			            $email_count3=mysqli_num_rows($query3);		




     /*---------------------------------- $email_pass3 ==== Raw of opposite party(current user's pre3) ----------------------------------------------------*/				                                                   

	if($email_count3>0)
    {
      
   
             $email_pass3= mysqli_fetch_assoc($query3);


               if($email_pass3['pre1']===$user_enrollment || $email_pass3['pre2']===$user_enrollment|| 
               	$email_pass3['pre2']===$user_enrollment)
               {


                     $to_email=$email_pass3['email'];
                      $enro_matched=$email_pass3['enrollment'];

                    include  '10_emailsending2.php';
					         include '11_emailsending3.php';
                  
                 }

                 else
                 {
                 	 
                 	 include 'index.php';


                 	                  
                 } 



      } 
      else


          {
         	  include 'index.php';

         	/* ?> <script>alert( "Preference-3 Is not in our list,either he/she is from other college or from other departement,just wait for while till we access that feature ");</script> <?php */
         	    	/*  ?> <script>alert( "wrong something ");</script> <?php */

         }	 


         	                  
        





?>







