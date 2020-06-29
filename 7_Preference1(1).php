
<?php

//include ''.BASE_URL.'1_connection.php';

$emil_query = " select * from datingg where email ='".$email."' ";
$query =mysqli_query($con,$emil_query);
$email_count =mysqli_num_rows($query);
$email_pass= mysqli_fetch_assoc($query);
$user_enrollment=$email_pass['enrollment'];
$pre1=$email_pass['pre1'];
 

     /*---------------------------Accessing current user's Raw-----------------------------------------------------------------*/				                                                   





/*---------------------------------------------------------------msg-------------------------------------------------------------------------*/				                                                   

    $_SESSION['msg']="You will Be Nofified When Your Preference Matches "; 


/*---------------------------------------------------------------checking pre1 ------------------------------------------------------------------------*/				                                                   


                              $emil_query1="select * from datingg where enrollment='".$pre1."' ";
				              $query1 =mysqli_query($con,$emil_query1);
				              $email_count1 =mysqli_num_rows($query1);
				          


  /*---------------------------Accessing opposite party's (current user's pre1) Raw  ----------------------------------------------------*/				                                                   
     /*---------------------------------- $email_pass1 ==== Raw of opposite party(current user's pre1) ----------------------------------------------------*/				                                                

  if($email_count1>0)
  	{
                                  

		       
                      $email_pass1= mysqli_fetch_assoc($query1);
                    
                       if($email_pass1['pre1']===$user_enrollment || $email_pass1['pre2']===$user_enrollment|| 
                           	$email_pass1['pre3']===$user_enrollment)
                       {
                          

	                                  $to_email=$email_pass1['email'];
	                                   $enro_matched=$email_pass1['enrollment'];
	                                   

	                                 include ('10_emailsending2.php');
	                                 include ('11_emailsending3.php');


	                    } 
	                   else
	                    {
	                        
	                    	 include '8_preference2.php';
	                    }
	                   
	  }

  else
    {
    	include '8_preference2.php';
    	 /* ?> <script>alert( "Preference-1 Is not in our list,either he/she is from other college or from other departement,just wait for while till we access that feature ");</script> <?php */
    	  /*?> <script>alert( "wrong something ");</script> <?php */

    } 
	   
    
?>















