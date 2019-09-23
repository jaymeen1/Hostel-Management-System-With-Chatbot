<script src="js/sweet.js"></script>
<?php
session_start();
include ('header.php');
if(!isset($_SESSION["admin"]))
{
header("location:adminpanel.php");
exit();
}
$con=mysqli_connect("localhost","root","","hosteldb");
if(mysqli_connect_errno()>0)
{
	die(mysqli_connect_error());
}

if(isset($_POST["lgBtn"]))
{
    $opass=$_POST["oPass"];
    $npass=$_POST["nPass"];
    $cpass=$_POST["cPass"];
    $eid=$_SESSION["eid"];
    if($npass==$cpass)
    {
	$q="update admin_table set password=? where email_id=? and password=?";
	$rs=$con->prepare($q);
	$rs->bind_param("sss",$npass,$eid,$opass);
	$rs->execute();
	$rs->store_result();
	if($rs->affected_rows>0)
	{
		echo "<script>swal('Done!', 'Password is Changed', 'success');</script>";
		//$msg="";
	}
	else
	{
		echo "<script>swal('Sorry!', 'Invalid old Password', 'warning');</script>";
		//$msg="";
	}
    }
    else
    {
		echo "<script>swal('Checked!', 'Confirm Password is not matched', 'error');</script>";
		//$msg="";

    }
}

?>
	<div id="page-content">
		<section class="box-content box-7" id="location">
			<div class="clearfix">
				<div class="heading" style="margin-bottom: 0;">	
					<h2>ADMIN PANEL</h2>
				</div>
				<div class="box-item" >
					<div class="container">
						<div class="row">
							<div class="col-md-8">
								<h3>Change Password</h3>
								<div id="contact-form">
									<form name="form1" method="post" action="changePassword.php">
                                    <div class="row">
										<div class="col-md-6">
											<div class="form-group">
											    Old Password:	<input type="password" class="form-control input-lg" name="oPass" id="oPass" placeholder="Enter Old Password" required="required" />
											</div>
										</div>
                                        <div class="col-md-6">
											<div class="form-group">
											    New Password:	<input type="password" class="form-control input-lg" name="nPass" id="nPass" placeholder="Enter New Password" required="required" />
											</div>
										</div>
                                        <div class="col-md-6">
											<div class="form-group">
											    Confirm Password:	<input type="password" class="form-control input-lg" name="cPass" id="cPass" placeholder="Enter Confirm Password" required="required" />
											</div>
										</div>
                                    </div>       
                                    <div class="row">
									    <div class="col-md-6">						
											<center><button type="submit" class="btn btn-skin" name="lgBtn" id="lgBtn">
											 Submit</button></center>
										</div>
                                        <div class="col-md-6">						
											<center><button type="submit" class="btn btn-skin" name="cancel" id="btnContactUs">
											 Cancel</button></center>
										</div>
									</div>                  
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
	</div>
	<?php include ('footer.php');?>