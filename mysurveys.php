<?php
include("header1.php");
//$_SESSION['username']="14k";
//session_start();
$res1 = mysql_query("SELECT survey_id,organization,survey_title,date_survey,time_survey from survey_info where user_name='".$_SESSION['username']."'") or die(mysql_error());

?>

<link href="css/dataTables.bootstrap.min.css" rel="stylesheet" media="screen">

<div class="container">
		<div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Surveys</strong>
                        you created
                    </h2>
                    <hr>
                    <p style="text-align:center;"><br>
						<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
						        <thead>
						            <tr>
						                <th>Name</th>
						                <th>Organization</th>
						                <th>Last Modified</th>
						                <th>Responses</th>
						                <th>Actions</th>
						            </tr>
						        </thead>
						        <tfoot>
						          <tr>
						                <th>Name</th>
						                <th>Organization</th>
						                <th>Last Modified</th>
						                <th>Responses</th>
						                <th>Actions</th>
						            </tr>
						          
						        </tfoot>
						        <tbody>
						        		<?php
						        	while($roww = mysql_fetch_array($res1)){
						        		$rr = mysql_query("SELECT COUNT(id) as dd from ".$roww['survey_id']."_responses") or die(mysql_error());
						        		$re = mysql_fetch_array($rr);
						        		?>
						          
						            <tr>
						                <td><?php echo $roww['survey_title']; ?></td>
						                <td><?php echo $roww['organization']; ?></td>
						                <td><?php echo $roww['date_survey']." ".$roww['time_survey']; ?></td>
						                <td id="resp_<?php echo $roww['survey_id']; ?>"><?php echo $re['dd']; ?></td>
						                <td style="text-align:center;"><a href="edit_survey.php?surv_id=<?php echo $roww['survey_id']; ?>" title="Edit Survey"><span class="glyphicon glyphicon-edit" style="color:blue;"></span></a> &nbsp;&nbsp;
						                	<a href="" onClick="ask1(<?php echo $roww['survey_id']; ?>); return false;" title="Delete Survey"><span class="glyphicon glyphicon-trash" style="color:red;"></span></a>&nbsp;&nbsp;
						                	<a href="" onClick="ask2(<?php echo $roww['survey_id']; ?>); return false;" title="Clear Responses"><span class="glyphicon glyphicon-remove" style="color:red;"></span></a>&nbsp;&nbsp;
						                	<a href="analyse_survey.php?surv_id=<?php echo $roww['survey_id']; ?>" title="Analyse Survey"><span class="glyphicon glyphicon-stats" style="color:blue;"></span></a>						                
						                </td>
						            </tr>
						              <?php
						        }
						        ?>
						        </tbody>
						    </table>
						</p>
					</div>
				</div>
			</div>
		</div>
		
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );

function ask1(id){

	if(window.confirm("Are you sure you wanna \n delete this survey???")){
		
		$.ajax({url : "del_survey.php?survey_id="+id , success : function(result){
			if(result=="Ok"){
				alert("Survey deleted !!!!");
				location.reload();
			}
			else
				alert(result);
		}});

	}
	else{
		return false;
	}
}

function ask2(id){
	if(window.confirm("Are you sure you wanna \n delete this survey???")){	
		$.ajax({url : "clearout_resp.php?survey_id="+id , success : function(result){
			if(result=="Ok"){
				$("#resp_"+id).html("0");
				alert("Cleared Respones !!! None left");
				//location.reload();
			}
			else
				alert(result);
		}});
	}
	else{
		return false;
	}	
}


</script>

<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.js"></script>
<?php
include("footer1.php");
?>