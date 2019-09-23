<script src="js/sweet.js"></script>
<?php
session_start();
if(!isset($_SESSION['admin']))
{
header("location:adminpanel.php");
exit();
}
include ('header.php');
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "hosteldb";
$conn = new mysqli($host, $user, $pass, $db_name);
if(isset($_POST['lgBtn'])) 
{
	
	$type = $_POST['type'];
    $mfees = $_POST['mfees'];
    $hfees = $_POST['hfees'];
    $year = $_POST['year'];
    $tseat = $_POST['tseat'];
    $scseat = $_POST['scseat'];
	$stseat = $_POST['stseat'];
	$obcseat = $_POST['obcseat'];
	$genseat = $_POST['genseat'];
	if($type == "evensem" || $type == "oddsem")
	{
    	$stmt = $conn->prepare("insert into admin_criteria(year,type,tseat,scseat,stseat,obcseat,genseat) values (?,?,?,?,?,?,?)");
    	$stmt->bind_param("sssssss", $year,$type,$tseat,$scseat,$stseat,$obcseat,$genseat);
    	$stmt->execute();
		$stmt->store_result();
		
    	if ($stmt->affected_rows > 0)
       		echo "<script>swal('Data Inserted!','Thank You...',successful);</script>";
    	else
        	echo "<script>swal('Data Not Inserted!','Sorry...',error);</script>";
		$stmt->close();
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
								<h3>In Between Semester</h3>
								<div id="contact-form">
									<form name="form1" method="post" action="admissionprocess.php">
                                    <div class="row">
                                            <div class="col-md-6">
												<div class="form-group">
												<input type="radio" class="" name="type" id="evensem" value="evensem"  /> &nbsp;&nbsp;&nbsp;Even Semester
												&nbsp;&nbsp;<input type="radio" class="" name="type" id="oddsem"  value="oddsem"/>&nbsp;&nbsp;&nbsp;Odd Semester
												</div>
											</div>
                                        </div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
												Mess Fees: <input type="text" class="form-control input-lg" name="mfees" id="mFees" placeholder="Enter Mess Fess" required="required" />
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
												Hostel Fees: <input type="text" class="form-control input-lg" name="hfees" id="hFees" placeholder="Enter Hostel Fees" required="required" />
												</div>
											</div>
										</div>
										<div class="row">
                                        <div class="col-md-6">
                                       		    <div class="form-group">
                                       			    Current Year :<select class="form-control input-lg" name="year" id="year">
                                                   <?php
													   $yr=date("Y");
													   for($i=$yr;$i>=$yr-2;$i--)
													   {
														   if(isset($_POST["year"]) && $_POST["year"]==$i)
														   echo "<option value=$i selected>$i</option>";
														   else
														   echo "<option value=$i >$i</option>";
													   }
													?>
												    </select>
                                      		    </div>
                                            </div>
                                            <div class="col-md-6">
												<div class="form-group">
												Total Seats: <input type="text" class="form-control input-lg" name="tseat" id="tSeat" placeholder="Enter Total Seat" required="required" />
												</div>
											</div>                                        	
                                        </div>
                                        <div class="row">
											<div class="col-md-6">
												<div class="form-group">
												SC Seats: <input type="text" class="form-control input-lg" name="scseat" id="scSeat" placeholder="Enter SC Seats" required="required" />
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
												ST Seats: <input type="text" class="form-control input-lg" name="stseat" id="stSeat" placeholder="Enter ST Seat" required="required" />
												</div>
											</div>
										</div>
                                        <div class="row">
											<div class="col-md-6">
												<div class="form-group">
												OBC Seats: <input type="text" class="form-control input-lg" name="obcseat" id="obcSeat" placeholder="Enter OBC Seats" required="required" />
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
												General Seats: <input type="text" class="form-control input-lg" name="genseat" id="genSeat" placeholder="Enter General Seat" required="required" />
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">						
												<center><button type="submit" class="btn btn-skin" name="lgBtn" id="lgBtn">
											 Submit</button></center>
											</div>
                       						 <div class="col-md-6">						
												<center><a href="adminhome.php"><button type="submit" class="btn btn-skin" name="lgbtn1" id="btnContactUs">
											 Cancel</button></a></center>
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