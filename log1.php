
<?php
session_start();
$val=0;
  if(isset($_POST['login']))
  {
	  include('connect.php');
	  $username=mysql_real_escape_string($_POST['username']);
	  $password=md5(mysql_real_escape_string($_POST['pass']));
	  $q="select * from users where username='$username' AND password='$password'";
	  $r=mysql_query($q) or die(mysql_error());
	  $row=mysql_fetch_array($r) or die(mysql_error());
	  $num=mysql_num_rows($r) or die(mysql_error());
		if($num==1)
		{
			
			$_SESSION['username']=$username;
			//$_SESSION['email_id']=$row['email_id'];
			header("Location: index.php");
		}
		else{
			header("Location: login.php?v=1");
		}
	
  }
  ?>
