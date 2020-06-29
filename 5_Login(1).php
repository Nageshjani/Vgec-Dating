
<?php  session_start();  ?>

<?php include ('1_connection.php'); ?>
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
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=shift_jis">
<meta name ="viewport"
content='width=device-width,initial-scale=1.0'>


<style >
body{
  margin: 0;
  padding: 0;
  font-family: serif;
  /*text-transform: uppercase;*/

  background: black;
}

.box{
  width: 300px;
  padding: 40px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  background:black;
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
 /* border: 2px solid #2ecc43; */
 border: 2px solid lime;
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

<title>َlogin Form</title>



<body>

<form class="box" action="<?php  echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post" >
        <p  class='p' style="color:lime;"><?php     echo  'Hey,:';   ?><?php     echo  $_SESSION['msg777'];   ?></p>

    <p  class='p' style="color:lime;"><?php     echo  'TOTAL Registration :';   ?><?php     echo  $_SESSION['msg555'];   ?></p>
    <p  class='p' style="color:lime;"><?php     echo  'TOTAL Matched Date :';   ?><?php     echo(round($_SESSION['msg666']) . "</br>") ;   ?></p>

  <h1 style="font-family: serif;">Login</h1>

  <p style="color:lime;"><?php     echo $_SESSION['msg'];   ?></p>

  

  <input type="text" name="email" placeholder="email">
  <input type="password" name="password" placeholder="password">
   <input type="submit" name="submit" value="Login">
  <p style="color:skyblue;"><a href="<?php echo BASE_URL ?>2_Registration.php">If You haven't registered yet,Click here!</a></p>

</form>


  </body>
</head>

</html>







<?php 

if (isset($_POST['submit'])) {

    $email=mysqli_real_escape_string($con,$_POST['email']);
    $password=md5(mysqli_real_escape_string($con,$_POST['password']));


                         
                   $emil_query="select * from datingg where email='$email' ";
                   $query =mysqli_query($con,$emil_query);
                   $email_count =mysqli_num_rows($query);




                          if ($email_count)
                          {
                                  
                               
                                 $email_pass= mysqli_fetch_assoc($query);





                                      if ($email_pass['status']==='active')
                                      {

                    							           if ($email_pass['status2']==='active')
                                              {        
                                              
                                                   ?><script > alert("Hey,You Have Already Found Your Crush,This service is only one time Accessible!");</script><?php 

                                              }
                                              
                                              else
                                              {  





                                                               $user_enrollment=$email_pass['enrollment'];

                                                							   
                                                							    if ($email_pass['password']===$password)
                                                							     {
                                                							     

/*------------------------------------------------------msg2 ===  $email   -------------------------------------------------------------------------------*/                                                           

                                                                     $_SESSION['msg2']=$email; 							   
                                                 								      // header('Location: http://localhost/VGEC%202/6_Home.php');
                                                                     header('Location:'.BASE_URL.'6_Home.php');
                                                                     

                                                                   }

                                                							     else
                                                							     {

                                                							     	
                                                                     ?><script > alert("enter valid password");</script><?php 


                                                							     }

                                              }                     

                                     
                                      }  
                                      else
                                      {
                                              ?><script > alert("email hasnt registred yet, please register  first");</script><?php 


                                         header('Location:'.BASE_URL.'2_Registration.php');
                                          //header('Location:http://localhost/VGEC%202/2_Registration.php');
           
                                      }                           
                                                    

                          }
                          else
                           {
                                
                                 
                                  
                                  ?><script > alert("Sorry you are not in ECE 2022 batch ");</script><?php

                          	


                          }


}




?>




