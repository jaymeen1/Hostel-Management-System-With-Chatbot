<script src="js/sweet.js"></script>
<?php
session_start();
$conn = mysqli_connect("localhost","root","","hosteldb");
if(mysqli_connect_errno()>0)
{
	die(mysqli_connect_error());
}
include ('header.php'); 
if(isset($_POST['lgBtn'])) {
    $lname = $_POST['lname'];
    $fname = $_POST['fname'];
    $faname = $_POST['faname'];
    $mname = $_POST['mname'];
    $email = $_POST['email'];
    $acpdc = $_POST['acpdc'];
    $branch = $_POST['branch'];
    $mono = $_POST['mono'];
    $cetegory = $_POST['cet'];
    $meritmark = $_POST['meritmark'];
    $pass = $_POST['pass'];
    $address = $_POST['add'];
    $gender = $_POST['gen'];


    $stmt = $conn->prepare("insert into admission_form1(lastname,firstname,fathername,mothername,email_id,acpdc_no,branchnm,mobile_no,cetegory,merit_mark,pass,address,gender) values (?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssssssss", $lname, $fname, $faname, $mname, $email, $acpdc, $branch, $mono, $cetegory, $meritmark, $pass, $address, $gender);
    $stmt->execute();
    $stmt->store_result();
    if ($stmt->affected_rows > 0)
        echo "<script type='text/javascript'>alert('Data Inserted..');</script>";
    else
		echo "<script type='text/javascript'>alert('Data Not Inserted..');</script>";
		
    $stmt->close();
}
?>
	<div id="page-content">
		<section class="box-content box-7" id="location">
			<div class="clearfix">
				<div class="heading" >
					<h2>ADMISSION</h2>
				</div>
				<div class="box-item" >
					<div class="container">
						<div class="row">
							<div class="col-md-8">
								<h3>Admission Form</h3>
								<div id="contact-form">
									<form name="form1" method="post" action="admission.php">
                                        <div class="row">
                                            <div class="col-md-6">
												<div class="form-group">
												 <a href="admission.php"><input type="radio" class="" name="atype" id="atype"  required="required" checked/></a> &nbsp;&nbsp;&nbsp;After S.S.C
												&nbsp;&nbsp;<a href="admission1.php"><input type="radio" class="" name="atype" id="atype" required="required" /></a>&nbsp;&nbsp;&nbsp;In Between Semester
												</div>
											</div>
										
                                        </div>
                                        <div class="row">
											<div class="col-md-6">
												<div class="form-group">
												Last Name: <input type="text" class="form-control input-lg" name="lname" id="lname" placeholder="Enter Last name" required="required" />
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
												Email Id: <input type="email" class="form-control input-lg" name="email" id="email" placeholder="Enter Email Id"  />
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
												ACPDC No.: <input type="text" class="form-control input-lg" name="acpdc" id="acpdc" placeholder="Enter ACPDC Number"  />
												</div>
											</div>
										</div>
										<div class="row">
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
											<div class="col-md-6">
												<div class="form-group">
												Mobile Number: <input type="text" class="form-control input-lg" name="mono" id="mono" placeholder="Enter Mobile name"  />
												</div>
											</div>
										</div>
                                        <div class="row">
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
                                            		Merit Marks: <input type="text" class="form-control input-lg" name="meritmark" id="meritmark" placeholder="Enter Merit Marks"  />
												</div>
											</div>
										</div>
										
										<div class="rows">
											<div class="col-md-6">
												<div class="form-group">
												Password: <input type="password" class="form-control input-lg" name="pass" id="pass" placeholder="Enter Last name" />
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
												Confirm Password: <input type="password" class="form-control input-lg" name="cpass" id="cpass" placeholder="Enter First name"  />
												</div>
											</div>
										</div>
                                        <div class="rows">
											<div class="col-md-6">
												<div class="form-group">
													Address: <textarea name="add" id="add" class="form-control" rows="4" cols="25" style="height:100px" 
													placeholder="Address"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            	<div class="form-group">
                                            	Gender:<br>
												Male: <input type="radio" class="" name="gen" id="gen" value="male" />&nbsp;&nbsp;&nbsp;&nbsp;
                                                Female: <input type="radio" class="" name="gen" id="gen" value="female" />
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
	<?php include ('footer.php'); ?>