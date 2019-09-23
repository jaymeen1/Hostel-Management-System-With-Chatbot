<?php
session_start();
if(!isset($_SESSION["admin"]))
{
header("location:adminpanel.php");
exit();
}
include ('header.php');
?>
<div id="page-content">
<section class="box-content box-7" id="location">
    <div class="clearfix">
        <div class="box-item" >
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <h3>Admin Home</h3>
                        <div id="contact-form">
                            <form name="form1" method="post" action="contactus.php">
                                <h5><a href="changePassword.php">Change Password</a></h5>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
	<?php include ('footer.php'); ?>