<?php
include("header1.php");

if(!isset($_GET['surv_id'])){
	header("Location: index.php");
}

$surv_id = mysql_escape_string(strip_tags($_GET['surv_id']));

if(!is_numeric($surv_id)){
	header("Location: index.php");
}

$ress = mysql_query("SELECT * FROM survey_info where user_name='".$_SESSION['username']."' and survey_id=".$surv_id);

if(mysql_num_rows($ress)!=1){
	header("Location: index.php");
}

$row_sur = mysql_fetch_array($ress);
?>

	<div class="container">
		<div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center"> 
                        <strong>Edit the Survey</strong>
                    </h2>
                    <hr>
                    <hr class="visible-xs">
                    <form class="form-horizontal" action="edit_survey_back1.php" method="post" enctype="multipart/form-data">
                    	<input type="hidden" name="surv_id" value="<?php echo $surv_id ?>" />
					  <div class="form-group">
					    <label for="org" class="col-sm-2 control-label">Organization's/Company's Name :</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="org" name="org" placeholder="Organization" value="<?php echo $row_sur['organization']; ?>">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="title" class="col-sm-2 control-label">Title of the survey :</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="title" name="title" placeholder="Title" value="<?php echo $row_sur['survey_title']; ?>" required>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="attempts" class="col-sm-2 control-label">Number of Attempts :(0 mean infinite)</label>
					    <div class="col-sm-10">
					      <input type="number" class="form-control" id="attempts" name="attempts" min='0'  value="<?php echo $row_sur['attempts']; ?>">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="active" class="col-sm-7 control-label">Check if Active :</label>
					    <div class="col-sm-1">
					    	<?php
					    	if($row_sur['active']==0){
					    		?><input type="checkbox" class="checkbox" id="active" name="active">
					    		<?php }
					    		else{ ?>
					    			<input type="checkbox" class="checkbox" id="active" name="active" checked>
					    		<?php } ?>
					    </div>
					  </div>
 					  <div class="form-group">
					    <label for="desc" class="col-sm-2 control-label">Instruction for the survey : </label>
					    <div class="col-sm-10">
					      <textarea class="form-control" id="desc" name="description" placeholder="Any Instructions regarding the survey"  ><?php echo $row_sur['instructions']; ?></textarea> 
					  	</div>
					  </div>
					  <div class="form-group">
					    <label for="logo" class="col-sm-2 control-label">Logo (optional) : </label>
					    <div class="col-sm-10" style="position:relative;">
					      <a class='btn btn-info' href='javascript:;'>
						            Choose File...
						            <input type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="logo" size="40"  onchange='$("#upload-file-info").html($(this).val());'>
						        </a>
						        &nbsp;
						        <span class='label label-info' id="upload-file-info"></span>
					    </div>
					  </div>
					  <br><br>

					  <div class="my-form form-group" id="ques_collect">
					    	<?php
					    		$q_res = mysql_query("SELECT * from questions where survey_q_id=".$row_sur['survey_id']);
					    		$qw=1;
					    		$opop=1;
					    		while($q_row = mysql_fetch_array($q_res)){
					    	?>
					        <div id="<?php echo 'que'.$q_row['question_no']; ?>" class="row" style="margin-bottom:25px;">

					    	<label for="<?php echo 'ques'.$q_row['question_no']; ?>" class="col-sm-2 control-label">Question : </label>
					    		<div class="col-sm-10">
								      	<input type="text" class="form-control" id="<?php echo 'ques'.$q_row['question_no']; ?>" name="<?php echo 'ques'.$q_row['question_no'].'[]'; ?>" placeholder="Question" value="<?php echo $q_row['question_title']; ?>" required>
								      	<div class="form-group">
								      	<label for="options_types" class="col-sm-2">Types of Options :</label>
								      	<div class="col-sm-6">
								      	<select class="form-control" id="options_types" required name="<?php echo 'ques'.$q_row['question_no'].'[]'; ?>">
								      		<option value=""> --SELECT-- </option>
								      		<option value="radio">Radio buttons</option>
								      		<option value="checkbox">Checkboxes</option>
								      		<option value="textarea">Descriptive</option>
								      		<option value="calender"> Calender </option>
								      		<option value="text">TextBoxes</option>
								      		<option value="select">Dropdowns</option>
								      	</select> 
								      </div>
									    </div>
									      <br>
								  	   <div>
								  	   	<?php
								  	   		$op_res = mysql_query("SELECT * FROM options where options_q_id=".$q_row['question_id']);
								  	   		$o=1;
								  	   		while($op_row = mysql_fetch_array($op_res)){
								  	   	?>
								  	  	<div id='OptionsGroup<?php echo $q_row['question_no']; ?>'>
													<div id="OptionDiv<?php echo $q_row['question_no'].'_'.$o; ?>" class="form-horizontal">
														<label>#Option : </label>
														<br>
														<input type="text" name="<?php echo 'ques'.$q_row['question_no'].'[]'; ?>" id="opt<?php echo $q_row['question_no'].'_'.$o; ?>" class="form-control" placeholder="Option" value="<?php echo $op_row['options_text']; ?>" required>
														<?php if($o>1)
															{
																?>
																<input type="button" value="Remove Option" id="removeButton<?php echo $q_row['question_no']; ?>_<?php echo $o ?>" onClick="remm(<?php echo $q_row['question_no']; ?>,<?php echo $o ?>);" />

																<?php } 	?>
														
													</div>
												</div>

								<?php $o++; $opop++;}  ?>
												<br>
											<input type='button'  class="btn btn-default" value='Add Option' id='addButton' onClick="opt(<?php echo $q_row['question_no']; ?>)">
										</div>
									</div>
									<?php 
									if($qw>1){ ?>
									<input type="button"  class="btn btn-default pull-right" style="margin-right:480px" value="Remove Question" id="remQ" onClick="remQue(<?php echo $qw; ?>)">
									<?php }

									?>

								</div>
								<?php
								$qw++;
							}
							
							?>

						</div>
						<div class="form-group"><h3>
								<input type='button'  class="btn btn-default pull-right" value='Add Question' id='addQues'>
								</h3><br>
						</div>
					  <div class="form-group" style="text-align:center">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-success" name='submit'><h3><b>Edit Survey</b></h3></button>
					    </div>
					  </div>
					</form>                    
                </div>
            </div>
        </div>

    </div>
	<?php
echo '<script type="text/javascript">';

echo "var counter =".$opop.",cnt=".$opop.";";
echo "var qcounter=".$qw.",qcnt=".$qw.";";    
echo "</script>";
?>
<script type="text/javascript">
    
    $("#addQues").click(function(){

    	qcnt++;
    	qcounter++;
    	console.log("ijdn");
    	var newTextBoxDiv = $(document.createElement('div'))
         .attr("id", 'que' + qcounter).attr("class",'row').attr("style","margin-bottom:25px;");


         newTextBoxDiv.after().html('<hr><br><label for="ques'+qcounter+'" class="col-sm-2 control-label">Question : </label>'+
		    		'<div class="col-sm-10">'+
					      	'<input type="text" class="form-control" id="ques'+qcounter+'" name="ques'+qcounter+'[]" placeholder="Question" required>'+
					      	'<div class="form-group">'+
					      	'<label for="options_types" class="col-sm-2">Types of Options :</label>'+
					      	'<div class="col-sm-6">'+
					      	'<select class="form-control" id="options_types'+qcounter+'" required name="ques'+qcounter+'[]">'+
					      		'<option value=""> --SELECT-- </option>'+
					      		'<option value="rad">Radio buttons</option>'+
					      		'<option value="checkboxes">Checkboxes</option>'+
					      		'<option value="descriptive">Descriptive</option>'+
					      		'<option value="calender"> Calender </option>'+
					      		'<option value="textboxes">TextBoxes</option>'+
					      		'<option value="select">Dropdowns</option>'+
					      	'</select> '+
					      '</div>'+
						   ' </div>'+
						    '  <br> 	  <div>'+
					  	  	'<div id="OptionsGroup'+qcounter+'">'+
							'			<div id="OptionDiv'+qcounter+'_1" class="form-horizontal">'+
											'<label>#Option : </label>'+
											'<br>'+
											'<input type="text" name="ques'+qcounter+'[]" id="opt'+qcounter+'_1" class="form-control" placeholder="Option" required>'+
											
										'</div>'+
									'</div>'+
									'<br>'+
								'<input type="button"  class="btn btn-default" value="Add Option" id="addButton" onClick="opt('+qcounter+')">'+
							'</div>'+
						'</div><br>'+
						'<input type="button"  class="btn btn-default pull-right" style="margin-right:480px" value="Remove Question" id="remQ" onClick="remQue('+qcounter+')">');

    		newTextBoxDiv.appendTo("#ques_collect");
    		return false;

    });

	function remQue(qn){

		$('#que' + qn).remove(); qcnt--; 	
		  return false;

	}
	
    function remm(n1,num){

    	$('#OptionDiv' + n1 + '_' + num).remove(); cnt--; 	if(cnt==0){  alert("No more options to remove"); }  return false;
    }

    function opt(n){

    if(counter>15){
            alert("Only 15 options allow");
            return false;
    }   
    cnt++;
    counter++;
    var newTextBoxDiv = $(document.createElement('div'))
         .attr("id", 'OptionDiv' + n + '_' + counter).attr("class",'form-horizontal');

    newTextBoxDiv.after().html('<label>#Option : </label><br>' +
          '<input type="text" name="ques' + n + '[]' + 
          '" id="opt' + n + '_' +counter + '" class="form-control" placeholder="Option" required><input type="button" value="Remove Option" id="removeButton'+ n + '_' +counter+'" onClick="remm('+ n + ',' +counter+');" />');

    newTextBoxDiv.appendTo("#OptionsGroup"+n);
     
    	
     }

</script>

<?php
 
include("footer1.php");

?>
