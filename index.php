<?php
include("header1.php");
?>
    <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-lg-12 text-center">
                    <h2 class="brand-before">
                        <small>Welcome to</small>
                    </h2>
                    <h1 class="brand-name">USurvey</h1>
                    <hr class="tagline-divider">
                    <h2>
                        <small>
                            <strong>Easy and fast survey's for Busy and important you !!!</strong>
                        </small>
                    </h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Why 
                        <strong>Choose Us</strong>?
                    </h2>
                    <hr>
                    <hr class="visible-xs">
                    <div class="row">
                        <div class="col-md-3">
                            <p>
                                <b><em>Our Surveys</em></b><br> Surveys created using our website are created with inspiration, checked for quality and originality.
                            </p>
                        </div>
                        <div class="col-md-3">
                            <p>
                                <b><em>Our Survey library</em></b><br> Just browse through all our Free Survey Samples and ﬁnd what you’re looking for.
                            </p>
                        </div>
                        <div class="col-md-3">
                        <p>
                                <b><em>Different Analytics</em></b><br> Check out the new analysis tools provided by the developer for different data-alalytics.
                            </p>
                        </div>
                        <div class="col-md-3">
                        <p>
                                <b><em>Get in touch with us</em></b><br> we love the challenge of doing something diferent and something special.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">
                        <strong>Get Started</strong>
                    </h2>
                    <hr>
                    <p style="text-align:center;"><br>
                    <em>Create Surveys, Get Results, Analyse them</em><br><br>
                    <?php
                    if(!isset($_SESSION['username'])){ ?>
                        <button class="btn btn-info"><a href="login.php">Login</a></button> &nbsp;&nbsp;
                        <button class="btn btn-info"><a href="register.php">Register</a></button>
                    <?php
                    }
                    else{?>
                    <button class="btn btn-info"><a href="create_survey.php" class="more">New Survey</a></button> &nbsp;&nbsp; 
                    <button class="btn btn-info"><a href="mysurveys.php" class="more">Old Surveys</a></button>
                    <?php 
                    }
                    ?>
                    <br>
                </p>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <?php
    include("footer1.php");
    ?>