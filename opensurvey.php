<?php
include("header1.php");
$res=2;
$rs= mysql_query("SELECT survey_title, instructions from survey_info where survey_id=$res");
$rs1=mysql_fetch_array($rs);
?>
<link href="css/dataTables.bootstrap.min.css" rel="stylesheet" media="screen">
<div class="container">
		<div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <h2 class="intro-text text-center">
                      <hr>  <strong><?php echo $rs1[0] ?></strong>
<hr>
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
		            <div class="box">
		                <div class="col-lg-12">
						<?php $res1 = mysql_query("SELECT * from questions where survey_q_id=$res order by question_no") or die(mysql_error());
						 ?>
		                    <h2 class="intro-text text-left">
		                       <?php echo $rs1[1] ?>
		                    </h2>
		                </div>
		            </div>
        </div>
        <div class="row">
        	<div class="box">
        		<div class="col-lg-12">

				<hr class="visible-xs">

				                    <form class="form-horizontal" action="get_response.php" method="post" enctype="multipart/form-data">
									<?php while($roww = mysql_fetch_array($res1)){  ?>
									  <div class="form-group">
									    <label for="org" class="col-sm-2 control-label"><?php echo $roww['question_title'] ?></label>
									    <br>
									    <div >
									    <?php
									     $res2=mysql_query("SELECT * from options where options_q_id=".$roww['question_id']);
									     while($roww2 = mysql_fetch_array($res2)){ ?>
									      <label for="org"><?php echo $roww2['options_text'] ?></label>

									   <input type="<?php echo $roww['option_types'] ?>" id="org" name="org">
									    <?php }  ?>
									    </div>
									  </div>
										<?php }  ?>
									<div class="form-group" style="text-align:center">
									    <div class="col-sm-offset-2 col-sm-10">
									      <button type="submit" class="btn btn-success" name='submit'><h3><b>SUBMIT</b></h3></button>
									    </div>
									  </div>
					</form>
        		</div>
        	</div>
        </div>
 </div>
 <script type="text/javascript">
 $(document).ready(function() {
     $('#example').DataTable();
 } );
 </script>
 <script src="js/jquery.dataTables.min.js"></script>
 <script src="js/dataTables.bootstrap.js"></script>
 <?php
 include("footer1.php");
?>