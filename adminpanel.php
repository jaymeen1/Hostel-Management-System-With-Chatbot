
<?php
session_start();
if( isset($_SESSION['admin']) )
{
    header("location:adminhome.php");
}
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
		$_SESSION["admin"]=true;
		$_SESSION["eid"]=$eid;

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
				<div class="heading" style="margin-bottom: 70px;">
					<h2>ADMIN Login</h2>
				</div>
				<div class="box-item" >
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<div id="contact-form">
									<form name="form1" method="post" action="adminpanel.php">
										<div class="row">
                                            <div class="col-md-4">
                                            </div>
											<div class="col-md-4 ">
												<div class="form-group">
												Email Id: <input type="email" class="form-control input-lg" name="aEmail" id="aEmail" placeholder="Enter Email Id" required="required" />
												</div>

												<div class="form-group">
												Password: <input type="password" class="form-control input-lg" name="aPass" id="hFees" placeholder="Enter Password" required="required" />
												</div>
                                                <div class="col-md-6 ">
                                                    <button name="lgbtn" type="submit" class="btn btn-skin " name="btnContactUs" id="btnContactUs">Login</button>
                                                </div>
											</div>
                                            <div class="col-md-4">
                                            </div>
										</div>

										<div class="col-md-6">
										</div>
										<?php
												if(isset($msg)) print "<h5 style='color:red' align='center'>$msg</h5>";
										?>
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
	<?php include ('footer.php'); ?>