<?php
session_start();
$name=$_POST['u_name'];
$password=$_POST['u_password'];
mysql_connect("localhost","root","");
mysql_select_db("project_era_db");
$query="SELECT * from user WHERE user_name='$name' AND user_password='$password'";
$result=mysql_query($query);
$result2=mysql_fetch_array($result);
$n=$result2[user_name];
if($result2!=0)
{
    if(isset($_SESSION['user_name']))
    {
        $name=$_SESSION['user_name'];
        $password=$_SESSION['user_password'];
    }
    else
    {
      $_SESSION['user_name']=$name;
          $_SESSION['user_password']=$password;
        header("location:signin.php");
    }
    
   
	echo"<center><b><h1>Welcome $n!<h1></b></center>";
    header("Location:../index.php");
}
else
{
    
echo"<b><center><h2><font size='7'>Invalid User Name or password</h2></center></b>";
}
	

?>