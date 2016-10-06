<?php
session_start();
if(!isset($_SESSION['username'])){

	header("Location: index.php");

}
include("connect.php");


class Survey_info{

	private $ques_title;
	private $option_type;
	private $options;
	function __construct(){
		$options = array();
	}
}



if(isset($_POST["submit"])) {
	$org=mysql_escape_string(strip_tags(trim($_POST['org'])));
	$active=0;
	if(isset($_POST['active']))
		$active=1;
	$survey_title = mysql_escape_string(strip_tags(trim($_POST['title'])));
	$attempts = mysql_escape_string(strip_tags(trim($_POST['attempts'])));
	$instruc = mysql_escape_string(strip_tags(trim($_POST['description'])));

	if($survey_title==""){
		header("Location: index.php");
	}
	if($attempts=="")
		$attempts=0;

	$d=date("Ymd");
	$t=date("His");
	if($_FILES['logo']['name']){
		$target_dir = "logos/";
		$target_file = $d.$t. basename($_FILES["logo"]["name"]);
		//$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		// Check if image file is a actual image or fake image

	    $check = getimagesize($_FILES["logo"]["tmp_name"]);
	    if($check !== false) {
	        //echo "File is an image - " . $check["mime"] . ".";
	        $uploadOk = 0;
	    } else {
	        //echo "File is not an image.";
	        $uploadOk = 1;
	    }

		// Check if file already exists
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
		   // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.".$imageFileType;
		    $uploadOk = 3;
		}
		$i=0;
		//$dh1=str_replace('.'.$imageFileType,"",$target_file).'_'.$d.'_'.$t;
		$dhh=$target_dir .$target_file;
		while (file_exists($dhh)) {
		    $i++;
		    $dhh = $target_dir .$i.'_'.$target_file;
		    //$uploadOk = 0;
		}
		$target_file = $dhh;
		// Check file size
		if ($_FILES["logo"]["size"] > 500000) {
		   // echo "Sorry, your file is too large.";
		    $uploadOk = 2;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
		   // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.".$imageFileType;
		    $uploadOk = 3;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    move_uploaded_file($_FILES["logo"]["tmp_name"], $target_file);
		  //  echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} 
	}
	else
		$target_file=null;
	$i=0;
	$infoo[] = new Survey_info(); 
	foreach ($_POST as $key => $val){
		$key=mysql_escape_string(strip_tags(trim($key)));
		//$val = mysql_escape_string(strip_tags(trim($val)));
		if (strpos($key, 'que') !== false) {
			//$pp=$key[strlen($key) -1];
			$infoo[$i] = new stdClass();
			$infoo[$i]->ques_title=mysql_escape_string(strip_tags(trim($val[0])));
			$infoo[$i]->option_type=mysql_escape_string(strip_tags(trim($val[1])));
			$sz=count($val);
			for($j=2;$j<$sz;$j++){
				$infoo[$i]->options[$j-2]=mysql_escape_string(strip_tags(trim($val[$j])));
			}
			$i++;
		}	
	}
	$q=$i;
	$d=date("Y-m-d");
	$t=date("H:i:s");
	include("ip.php");
	mysql_query("insert into survey_info values(null,'$org','$survey_title','$instruc',$attempts,$active,'$target_file','".$_SESSION['username']."','$d','$t',null)") or die(mysql_error());
	$surv_ = mysql_query("select survey_id from survey_info where date_survey='".$d."' and time_survey='".$t."' and user_name='".$_SESSION['username']."'") or die(mysql_error());
	$surv_id = mysql_fetch_array($surv_); 
	$ipp = get_client_ip_env();
	mysql_query("CREATE TABLE ".$surv_id['survey_id']."_responses (id int PRIMARY KEY AUTO_INCREMENT , resp_ip varchar(399) NOT NULL , date_resp DATE ,time_resp TIME)") or die(mysql_error());
	for($i=0;$i<$q;$i++){

		mysql_query("insert into questions values(null,".($i+1).",'".$infoo[$i]->ques_title."','".$infoo[$i]->option_type."',".$surv_id['survey_id'].")") or die(mysql_error());
		$qq =mysql_query("select question_id from questions where survey_q_id=".$surv_id['survey_id']." and question_no=".($i+1)) or die(mysql_error());
		$qw=mysql_fetch_array($qq);
		
		mysql_query("ALTER TABLE ".$surv_id['survey_id']."_responses ADD q_".($i+1)." int ") or die(mysql_error());

		$sz=count($infoo[$i]->options);
		for($j=0;$j<$sz;$j++){

			mysql_query("insert into options values(null,'".$infoo[$i]->options[$j]."',".$qw['question_id'].")") or die(mysql_error());
		}
	}

	header("Location: index.php");

 }


?>