<?php
include("header1.php");

?>
	<div class="container">
		<div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Login</strong>
                        to continue
                    </h2>
                    <hr>
                    <p style="text-align:center;"><br>

						<form action="log1.php" method="post" class="form-horizontal">
							<div class="form-group">
							    <label for="name" class="col-sm-2 control-label">Name :</label>
							    <div class="col-sm-8">
							      <input type="text" class="form-control" id="name" name="username" placeholder="User_Name" required>
							    </div>
							</div>
							<div class="form-group">
							    <label for="pass" class="col-sm-2 control-label">PassWord :</label>
							    <div class="col-sm-8">
							      <input type="password" class="form-control" id="pass" name="pass" placeholder="Password" required>
							    </div>
							</div>
							<br>
							<div class="form-group" style="text-align:center">
							    <div class="col-sm-offset-3 col-sm-3">
							      <button type="submit" class="btn btn-success" name='login'><b><h4>Login</h4></b></button>
							    </div>
							    <div class=" col-sm-3">
							      <button type="button" class="btn btn-info" name='register'><b><h4><a href="register.php">Register</a></h4></b></button>
							    </div>
							</div>

						</form>

                	</p>
                </div>
            </div>
        </div>
    </div>

<!--
<a href="reg.php">SIGN UP</a>
-->
						
						
<script type="text/javascript">
$("#index").removeClass("active");
$("#login").addClass("active");
</script>
<?php

include("footer1.php");

?>