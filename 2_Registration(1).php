<?php session_start(); ?>
<?php include'1_connection.php' ?>


<?php 
                                 $emil_query = " select * from datingg where status ='active' ";
                                    $query =mysqli_query($con,$emil_query);
                                    $email_count =mysqli_num_rows($query);

                                    $_SESSION['msg555']=$email_count;


                                 $emil_query = " select * from datingg where status2 ='active' ";
                                    $query =mysqli_query($con,$emil_query);
                                    $email_count =mysqli_num_rows($query);

                                    $_SESSION['msg666']=$email_count/2;
                                   


 


?>



<!DOCTYPE html>
<html lang="en" dir="ltr">'


<head><meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
<meta name ="viewport"
content='width=device-width,initial-scale=1.0'>
	<style >
body{
  margin: 0;
  padding: 0;
  font-family: serif;
  background: #274769;
}

.box{
  width: 300px;
  padding: 80px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  background: black;
  text-align: center;
 
}

.box h1{
  color: white;
  /*text-transform: uppercase;*/
  font-weight: 500;
}


.box input[type = "text"]{
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


.box input[type = "password"]{
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

    <title>َRegistration Form</title>




<body>

<form class="box" action="<?php  echo htmlentities($_SERVER['PHP_SELF']); ?> " method="post" >
 <p  class='p' style="color:lime;"><?php     echo  'TOTAL Registration :';   ?><?php     echo  $_SESSION['msg555'];   ?></p>      echo(round(3.5) . "<br>");

    <p  class='p' style="color:lime;"><?php     echo  'TOTAL Matched Date :';   ?><?php     echo(round($_SESSION['msg666']) . "</br>") ;   ?></p>
    

  <h1>Registration</h1>
  <input type="text" name="email" placeholder="email">
  <input type="password" name="password" placeholder="Password">
  <input type="password" name="cpassword" placeholder="Confirm-Password">
  <input type="submit" name="submit" value="submit">
  <p style="color:skyblue;"><a href="<?php echo BASE_URL ?>5_Login.php"> If You already registered ,Click here</a></p>

</form>


 </body>
</head>
</html>


<?php

if (isset($_POST['submit'])){


$email=mysqli_real_escape_string($con,$_POST['email']);
$password=md5(mysqli_real_escape_string($con,$_POST['password']));
$cpassword=md5(mysqli_real_escape_string($con, $_POST['cpassword']));
$token= bin2hex(random_bytes(15));
//$pass=password_hash($password, PASSWORD_BCRYPT);
//$cpass=password_hash($cpassword, PASSWORD_BCRYPT);



// 'dating' ---my dabase's table name

                  $emil_query="select * from datingg where email='$email' ";
                   $query =mysqli_query($con,$emil_query);
                   
                  $email_count =mysqli_num_rows($query);
                  $email_pass= mysqli_fetch_assoc($query);



  if ($email_count>0)
  {
                                 
                                  
                      if ($email_pass['status']==='active')
                      {
        							     
                         ?><script > alert("email alredy exist,lets go to login page and sign in");</script><?php
                       
                       }     	 
                           
                      
                      else
                      {
						               
            			                           if ($password===$cpassword)
            			                            {
                                						                                
                                
                                                        								                                     $email_pass= mysqli_fetch_assoc($query);
                                                        
                                                        							                                $sql=" UPDATE  datingg SET password = '".$password."', cpassword ='".$cpassword."',token='".$token."',
                                                        							                                status ='inactive' ,status2 ='inactive'   WHERE  email ='".$email."'  ";
                                                        
                                                        							                                
                                                        
                                                        
                                                        								                                              if (mysqli_query($con,$sql))
                                                        								                                              {
                                                        
                                                        								                                     
                                                        								                                                           include('3_Email_sending1.php');
                                                        
                                                        								                                               }
                                                        
                                                        								                                             
                                                        								                                              else
                                                        								                                              {
                                                        								                                              echo "query not inserted";
                                                        								                                              }
                                                        								  
                	                            }
                				                          
            		                           else
            		                           {
            		                             
            		                               ?><script > alert(" Password And Confirm Password Doesn't Match");</script><?php
            
            		                            }

						                

			          } 



                           

   } 

  else
  {

              ?><script > alert("Sorry you are not in ECE 2 nd year deparment");</script><?php


  } 

 }                        








?>