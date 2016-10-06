<?php
	session_start();

  if(isset($_POST['register']))
  {
	  include('connect.php');
	  $email=mysql_real_escape_string($_POST['email']);
	  
	  $name=mysql_real_escape_string($_POST['name']);
	  
	  $username=mysql_real_escape_string($_POST['username']);
	  $password1=mysql_real_escape_string($_POST['pass']);
	  $mobile=mysql_real_escape_string($_POST['mobile']);
	  
	  
	  //if($password1==$password2)
	  {
	  		$password1=md5($password1);
				{
				$q1="insert into users values('$username','$password1','$name','$email','$mobile',null)";
				$r1=mysql_query($q1) or die(mysql_error());
				if($r1)
				{
					header("Location: login.php?v=2");
				}
				else{
					header("Location: register.php?v=1");
				}	
			}
			
		  }
  }
  ?>
