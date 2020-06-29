<?php

//include ''.BASE_URL.'1_connection.php';


$emil_query = " select * from datingg where email ='".$email."' ";
$query =mysqli_query($con,$emil_query);
$email_count =mysqli_num_rows($query);
 $email_pass= mysqli_fetch_assoc($query);
 $user_enrollment=$email_pass['enrollment'];
$pre2=$email_pass['pre2'];



/*---------------------------------------------------------------msg-------------------------------------------------------------------------*/				                                                   

    $_SESSION['msg']="You will Be Nofified When Your Preference Matches "; 


/*---------------------------------------------------------------edited-------------------------------------------------------------------------*/				                                                   


                            $emil_query2="select * from datingg where enrollment='".$pre2."' ";
				            $query2 =mysqli_query($con,$emil_query2);
				            $email_count2 =mysqli_num_rows($query2);


     /*---------------------------------- $email_pass2 ==== Raw of opposite party(current user's pre2) ----------------------------------------------------*/				                                                   


	if($email_count2>0)
	{           
	                             


		          
			                                  $email_pass2= mysqli_fetch_assoc($query2);
			                                
			                                   if($email_pass2['pre1']===$user_enrollment || $email_pass2['pre2']===$user_enrollment|| 
			                                   	$email_pass2['pre3']===$user_enrollment)
			                                   {
                           

					                                 $to_email=$email_pass2['email'];
					                                  $enro_matched=$email_pass2['enrollment'];

					                                 include  '10_emailsending2.php';
					                                  include '11_emailsending3.php';
		                                          
		                                         }
		                                         
		                                         else
		                                         {

		                                         	include '9_preference3.php';
		                                         	//include ''.BASE_URL.'pre3.php';
		                                         }
		                                         


 }  
  else
    {
    	include '9_preference3.php';
    	/*include'9_preference3.php';*/
     	//include  ''.BASE_URL.'pre3.php';
    	 /*?> <script>alert( "Preference-2 Is not in our list,either he/she is from other college or from other departement,just wait for while till we access that feature ");</script> <?php */
    	     	 /* ?> <script>alert( "wrong something ");</script> <?php */

    }
	          





?>
                          

