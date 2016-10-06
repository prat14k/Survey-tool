<?php
include("header1.php");

?>



	<div class="container">
		<div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Sign Up</strong>
                        to continue
                    </h2>
                    <hr>
                    <p style="text-align:center;"><br>

						<form action="signup.php" method="post" class="form-horizontal" enctype="multipart/form-data">
							<div class="form-group">
							    <label for="name" class="col-sm-2 control-label">Full Name :</label>
							    <div class="col-sm-8">
							      <input type="text" class="form-control" id="name" name="name" placeholder="Enter your Full Name" required>
							    </div>
							</div>
							<div class="form-group">
							    <label for="username" class="col-sm-2 control-label">UserName :</label>
							    <div class="col-sm-8">
							      <input type="text" class="form-control" id="username" name="username" placeholder="User_Name" required>
							    </div>
							</div>
							<div class="form-group">
							    <label for="pass" class="col-sm-2 control-label">PassWord :</label>
							    <div class="col-sm-8">
							      <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required>
							    </div>
							</div>
							<div class="form-group">
							    <label for="email" class="col-sm-2 control-label">Email-id :</label>
							    <div class="col-sm-8">
							      <input type="email" class="form-control" id="email" name="email" placeholder="Email ID" required>
							    </div>
							</div>
							<div class="form-group">
							    <label for="mobile" class="col-sm-2 control-label">Mobile Number :</label>
							    <div class="col-sm-8">
							      <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Mobile number" required>
							    </div>
							</div>
							<div class="form-group" style="text-align:center">
							    <div class="col-sm-offset-3 col-sm-3">
							      <button type="submit" class="btn btn-success" name='register'><b><h4>Sign Up</h4></b></button>
							    </div>
							    <div class=" col-sm-3">
							      <button type="button" class="btn btn-info" name='login'><b><h4><a href="login.php">Login</a></h4></b></button>
							    </div>
							</div>

						</form>

                	</p>
                </div>
            </div>
        </div>
    </div>




<script type="text/javascript">
$("#index").removeClass("active");
$("#register").addClass("active");
</script>

<?php

include("footer1.php");

?>
