<?php
session_start();
if(!isset($_SESSION['username'])){

	header("Location: index.php");

}
include("connect.php");

if(isset($_GET['survey_id'])&&!empty($_GET['survey_id'])){
	$id = mysql_escape_string(strip_tags(trim($_GET['survey_id'])));
	$q_res = mysql_query("SELECT question_id from questions where survey_q_id=".$id) or die(mysql_error());
	while($q_row = mysql_fetch_array($q_res)){
		
			mysql_query("delete from options where options_q_id=".$q_row['question_id']) or die(mysql_error());

	}
	mysql_query("delete from questions where survey_q_id=".$id) or die(mysql_error());
	mysql_query("delete from survey_info where survey_id=".$id) or die(mysql_error());
	mysql_query("drop table if exists ".$id."_responses") or die(mysql_error());

	echo "Ok";
		
}
?>