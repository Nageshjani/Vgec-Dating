<?php
define('BASE_URL', 'https://vgecanonymousdating.com/');
// here 3307 is mysql port number ,which i have custmized before//
//$con = mysqli_connect('localhost', 'system_admin', 'Sweetu@19211','vgec');
$con = mysqli_connect('localhost', 'system_admin', 'Sweetu@19211','vgec');
if (!$con)
{
  echo "Something Went Wrong";
}
