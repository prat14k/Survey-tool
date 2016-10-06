<?php
	session_start();
	if(!isset($_SESSION['username'])){

		header("Location: index.php");

	}
	include("connect.php");

	if(isset($_GET['survey_id'])&&!empty($_GET['survey_id'])){
		$id = mysql_escape_string(strip_tags(trim($_GET['survey_id'])));
		mysql_query("truncate table ".$id."_responses") or die(mysql_error());
		echo "Ok";
	}
?>