
<?php  session_start();  ?>

<?php include'1_connection.php';


 ?>


<!DOCTYPE html>
<html>
<head>
    <meta name ="viewport"
content='width=device-width,initial-scale=1.0'>
	<style >
	
body{
  margin: 0;
  padding: 0;
  font-family: serif;
  background:black;
}

.box{
  width: 300px;
  padding: 40px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  background: black;
  text-align: center;
}

.box h1{
  color: white;
 
  font-weight: 500;

 
}

.box input[type = "text"],
.box input[type = "password"]



{
  border:0;
  background: none;
  display: block;
  margin: 20px auto;
  text-align: center;
  border: 2px solid #54bbff;
  padding: 14px 10px;
  width: 200px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;

}
.box input[type = "text"]:focus,.box input[type = "password"]:focus{
  width: 280px;
  /* border-color: #2ecc43; */
  
 border-color: lime;
}


.box input[type = "submit"]
{
  border:0;
  background: none;
  display: block;
  margin: 20px auto;
  text-align: center;
  border: 2px solid #2ecc43;
  padding: 14px 40px;
  outline: none;
  color: white;
  border-radius: 24px;
  transition: 0.25s;
  cursor: pointer;
}
.box input[type = "submit"]:hover{
  background: #2ecc43;
}
</style>





<title>َPreferences Form</title>

<body>
<form class="box" action="<?php  echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

	<h1>Enrollments Of Your Preferences</h1>
	
<input type="text" name="pre1"  placeholder="preference-1">
<input type="text" name="pre2"  placeholder="preference-2">
<input type="text" name="pre3" placeholder="preference-3">
<input type="submit"  name="submit">
</form>



</body>
</head>
</html>


<?php

if(isset($_POST['submit'])){

if ($_POST['pre1']>0) {
  $pre1=$_POST['pre1'];
}else{
   $pre1="NULL";
}


if ($_POST['pre2']>0) {
  $pre2=$_POST['pre2'];
}else{
   $pre2="NULL";
}

if ($_POST['pre3']>0) {
  $pre3=$_POST['pre3'];
}else{
   $pre3="NULL";
}







/*----------------------------------------------------msg2------------------------------------------------------------------------------------*/				                                                   

 /*---------------------------Accessing current user's email----------------------------------------------------------------------*/				                                                   

 $email=$_SESSION['msg2']; 	

$_SESSION['msg']="You will Be Nofified When Your Preference Matches ";


$emil_query = " select * from datingg where email ='".$email."' ";
$query =mysqli_query($con,$emil_query);
$email_count =mysqli_num_rows($query);

							if ($email_count)
							 {
							                                  
							                               
							                               

     /*---------------------------Accessing current user's enrollement using his email-----------------------------------------------------------------*/				                                                   

     														$email_pass= mysqli_fetch_assoc($query);
							                                $user_enrollment=$email_pass['enrollment'];


									       if($pre1===$user_enrollment || $pre2===$user_enrollment || $pre3===$user_enrollment )
									       {

									       	?><script > alert("you cannot add your own enrollment in preferences list");</script><?php 
									       }
    
     /*---------------------------Deniying input of user's own enrollement---------------------------------------------------------------*/				                                                   

									       else
									       {


							                                $sql=" UPDATE  datingg SET pre1=".$pre1.", pre2=".$pre2.", pre3=".$pre3."   WHERE  email ='".$email."'  ";
                                    


                      /*---------------------------Insert preferences -----------------------------------------------------------------*/				                                                   


															      if (mysqli_query($con,$sql))

															       {
							                                         
							                                         /*header('Location:http://localhost/htdocs/vgec%20dating/log.php');*/
							                                        

															        include '7_Preference1.php';
															         include'9_Preference3.php';
															         include'8_Preference2.php';
															         /* include'pre3.php';*/



															       }
															       else
															       {
															        echo "query not inserted";

													                } 

								           }    						                



						       }  	        


					      

}                        
                        
                                  


?>












