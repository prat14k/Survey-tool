<?php
include("header1.php");

?>

	<div class="container">
		<div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center"> 
                        <strong>Create a Survey</strong>
                    </h2>
                    <hr>
                    <hr class="visible-xs">
                    <form class="form-horizontal" action="create_survey_back1.php" method="post" enctype="multipart/form-data">
					  <div class="form-group">
					    <label for="org" class="col-sm-2 control-label">Organization's/Company's Name :</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="org" name="org" placeholder="Organization">
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="title" class="col-sm-2 control-label">Title of the survey :</label>
					    <div class="col-sm-10">
					      <input type="text" class="form-control" id="title" name="title" placeholder="Title" required>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="attempts" class="col-sm-2 control-label">Number of Attempts :(0 mean infinite)</label>
					    <div class="col-sm-10">
					      <input type="number" class="form-control" id="attempts" name="attempts" value='0' min='0'>
					    </div>
					  </div>
					  <div class="form-group">
					    <label for="active" class="col-sm-7 control-label">Check if Active :</label>
					    <div class="col-sm-1">
					      <input type="checkbox" class="checkbox" id="active" name="active">
					    </div>
					  </div>
 					  <div class="form-group">
					    <label for="desc" class="col-sm-2 control-label">Instruction for the survey : </label>
					    <div class="col-sm-10">
					      <textarea class="form-control" id="desc" name="description" placeholder="Any Instructions regarding the survey"></textarea> 
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
					    
					        <div id="que1" class="row" style="margin-bottom:25px;">

					    	<label for="ques1" class="col-sm-2 control-label">Question : </label>
					    		<div class="col-sm-10">
								      	<input type="text" class="form-control" id="ques1" name="ques1[]" placeholder="Question" required>
								      	<div class="form-group">
								      	<label for="options_types" class="col-sm-2">Types of Options :</label>
								      	<div class="col-sm-6">
								      	<select class="form-control" id="options_types" required name="ques1[]">
								      		<option value=""> --SELECT-- </option>
								      		<option value="radio">Radio buttons</option>
								      		<option value="checkbox">Checkboxes</option>
								      		<option value="textarea">Descriptive</option>
								      		<option value="calender"> Calender </option>
								      		<option value="textbox">TextBoxes</option>
								      		<option value="select">Dropdowns</option>
								      	</select> 
								      </div>
									    </div>
									      <br>
								  	   <!--	<button class="btn btn-warning" onClick="rem_que();return false;">Remove Question</button>
								  	  
								       <div id="add_opt">
								       	<p>
								       	<input type="text" class="form-control" id="option" name="option_1" placeholder="Option">							      						  	   	
								  	   	</p>
								  	   </div>	

								  	  --> 	
								  	  <div>
								  	  	<div id='OptionsGroup1'>
													<div id="OptionDiv1_1" class="form-horizontal">
														<label>#Option : </label>
														<br>
														<input type="text" name="ques1[]" id="opt1_1" class="form-control" placeholder="Option" required>
														
													</div>
												</div>
												<br>
											<input type='button'  class="btn btn-default" value='Add Option' id='addButton' onClick="opt(1)">
										</div>
									</div>

								</div>

						</div>
						<div class="form-group"><h3>
								<input type='button'  class="btn btn-default pull-right" value='Add Question' id='addQues'>
								</h3><br>
						</div>
					  <div class="form-group" style="text-align:center">
					    <div class="col-sm-offset-2 col-sm-10">
					      <button type="submit" class="btn btn-success" name='submit'><h3><b>Create The Survey</b></h3></button>
					    </div>
					  </div>
					</form>                    
                </div>
            </div>
        </div>

    </div>


<script type="text/javascript">
    
    var counter = 1,cnt=1;

    var qcounter=1,qcnt=1;
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
