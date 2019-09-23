<script src="js/sweet.js"></script>
<?php
session_start();
$conn = mysqli_connect("localhost","root","","hosteldb");
if(mysqli_connect_errno()>0)
{
	die(mysqli_connect_error());
}
include ('header.php');
if(isset($_POST['lgBtn']))
{
	$lname = $_POST['lname'];
	$fname = $_POST['fname'];
	$faname = $_POST['faname'];
	$mname = $_POST['mname'];
	$email = $_POST['email'];
	$enrollment = $_POST['enroll'];
	$sem = $_POST['sem'];
	$pass = $_POST['pass'];
	$gender = $_POST['gender'];
	$address = $_POST['address'];
	$cpi = $_POST['cpi'];
	$cast = $_POST['cet'];


	$stmt = $conn->prepare("insert into admission_form2 values (?,?,?,?,?,?,?,?,?,?,?,?)");
	$stmt->bind_param("ssssssssssss",$lname,$fname,$faname,$mname,$email,$enrollment,$sem,$pass,$gender,$address,$cast,$cpi);
	$stmt->execute();
	$stmt->store_result();
	
	if ($stmt->affected_rows > 0)
  {	echo "<script>swal('Data Upload!', 'Data Inserted...', 'success');</script>"; }
  else
		{ echo "<script>swal('Sorry!', 'Data Not Inserted...', 'error');</script>"; }
	
	$stmt->close();

}
?>
	<div id="page-content">
		<section class="box-content box-7" id="location">
			<div class="clearfix">
				<div class="heading" style="margin-bottom: 0;">	
					<h2>ADMISSION</h2>
				</div>
				<div class="box-item" >
					<div class="container">
						<div class="row">
							<div class="col-md-8">
								<h3>Admission Form</h3>
								<div id="contact-form">
									<form name="form1" method="post" action="admission1.php">
                                        <div class="row">
                                            <div class="col-md-6">
												<div class="form-group">
												<a href="admission.php"><input type="radio" class="" name="atype" id="atype"  required="required"/></a> &nbsp;&nbsp;&nbsp;After S.S.C
												&nbsp;&nbsp;<a href="admission1.php"><input type="radio" class="" name="atype" id="atype" required="required" checked/></a>&nbsp;&nbsp;&nbsp;In Between Semester
												</div>
											</div>
                                        </div>
                                        <div class="row">
											<div class="col-md-6">
												<div class="form-group">
												Last Name: <input type="text" class="form-control input-lg" name="lname" id="lname" placeholder="Enter Last name" />
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
												First Name: <input type="text" class="form-control input-lg" name="fname" id="fname" placeholder="Enter First name"  />
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
												Father Name: <input type="text" class="form-control input-lg" name="faname" id="faname" placeholder="Enter Father name"  />
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
												Mother Name: <input type="text" class="form-control input-lg" name="mname" id="mname" placeholder="Enter Mother name"  />
												</div>
											</div>
										</div>
                      <div class="row">
											<div class="col-md-6">
												<div class="form-group">
												Email ID: <input type="text" class="form-control input-lg" name="email" id="email" placeholder="Enter Email Id"  />
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
												Enrollment No.: <input type="text" class="form-control input-lg" name="enroll" id="enroll" placeholder="Enter Enrollment"  />
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													Semester<select class="form-control input-lg" name="sem" id="sem">
													<option value="select">Select</option>
                          <option value="1st">1st</option>
                          <option value="2nd">2nd</option>
                          <option value="3rd">3rd</option>
                          <option value="4th">4th</option>
                          <option value="5th">5th</option>
                          <option value="6th">6th</option>
                          </select>
												</div>
											</div>
											<div class="col-md-6">
											<div class="form-group">
											Branch<select class="form-control input-lg" name="branch" id="branch">
											<option value="select">Select</option>
                      <option value="Mechanical">Mechanical</option>
                      <option value="Civil">Civil</option>
                      <option value="Electrical">Electrical</option>
                      <option value="Computer">Computer</option>
                      <option value="EC">Electronics & Communication</option>
                      <option value="cddm">C.D.D.M.</option>
                      </select>
											</div>
										</div>
										<div class="rows">
											<div class="col-md-6">
												<div class="form-group">
                          Cetegory
                          <select class="form-control input-lg" name="cet" id="cet">
                        	<option value="General">General</option>
                          <option value="obc">O.B.C.</option>
                          <option value="sc">S.C.</option>
                          <option value="st">S.T.</option>
                          <option value="other">Other</option>
                          </select>
                          </div>
                        </div>
											<div class="rows">
											<div class="col-md-6">
												<div class="form-group">
                          CPI: <input type="text" class="form-control input-lg" name="cpi" id="cpi" placeholder="Enter CPI"  />
												</div>
											</div>
										</div>
										<div class="rows">
											<div class="col-md-6">
												<div class="form-group">
												Password: <input type="password" class="form-control input-lg" name="pass" id="pass" placeholder="Enter Password"  />
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
												Confirm Password: <input type="password" class="form-control input-lg" name="cpass" id="cpass" placeholder="Enter Confirm Password"  />
												</div>
											</div>
										<div class="rows">
											<div class="col-md-6">
												<div class="form-group">
													Address: <textarea name="address" id="address" class="form-control" rows="4" cols="25" style="height:100px" 
													placeholder="Address"></textarea>
                        </div>
                      </div>				
											<div class="col-md-6">
                           	<div class="form-group">
                             	Gender:<br>Male: <input type="radio" class="" name="gender" id="gender" value="male" />&nbsp;&nbsp;&nbsp;&nbsp;
                       				Female: <input type="radio" class="" name="gender" id="gender" value="female"/>
                           	</div>
                          </div>
											</div>					
                      </div>
											<div class="row">
											<div class="col-md-12">						
												<center><button type="submit" class="btn btn-skin" name="lgBtn" id="lgBtn">
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
	<?php 
		include ('footer.php');
	?>