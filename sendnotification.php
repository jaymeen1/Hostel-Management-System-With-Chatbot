
<?php
session_start();
$con=mysqli_connect("localhost","root","","hosteldb");
if(mysqli_connect_errno()>0)
{
	die(mysqli_connect_error());
}

if(isset($_POST["lgbtn"]))
{
	$eid=$_POST["aEmail"];
	$pass=$_POST["aPass"];
	$q="select * from admin_table where email_id=? and password=?";
	$rs=$con->prepare($q);
	$rs->bind_param("ss",$eid,$pass);
	$rs->execute();
	$rs->store_result();
	if($rs->num_rows>0)
	{
		$_SESSION["atype"]="Admin";

		header("location:adminhome.php");
	}
	else
	{
		$msg="Invalid Email id or Password";
	}
}
include ('header.php');
?>
	<div id="page-content">
		<section class="box-content box-7" id="location">
			<div class="clearfix">
				<div class="heading" style="margin-bottom: 0;">	
					<h2>ADMIN</h2>
				</div>
				<div class="box-item" >
					<div class="container">
						<div class="row">
							<div class="col-md-8">
								<h3>Send Notification</h3>
								<div id="contact-form">
									<form name="form1" method="post" action="adminpanel.php">
                                    <div class="row">
											<div class="col-md-6">
												<div class="form-group">
												<input type="text" class="form-control input-lg" name="name" id="name" placeholder="Enter Subject" required="required" />
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<textarea name="message" id="message" class="form-control" rows="4" cols="25" required="required"
													placeholder="Message"></textarea>
												</div>						
												<center><button type="submit" class="btn btn-skin" name="btnContactUs" id="btnContactUs">
											 Submit</button></center>
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