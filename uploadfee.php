<script src="js/sweet.js"></script>
<?php
session_start();
include('header.php'); 
if(!isset($_SESSION['user']))
{
header("location:login.php");
exit();
}
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "hosteldb";
$conn = new mysqli($host, $user, $pass, $db_name);

if(isset($_POST['upload']))
{
	$year=$_POST['year'];
	$ernroll=$_POST['enrollment_no'];
    $transaction=$_POST['transaction'];
	$type = $_POST['type'];
    $receipt=$ernroll."_".$year."_".$type.".jpg";
		
	$stmt="insert into upload_fees(year,enrollment_no,transaction_id,receipt,type) values(?,?,?,?,?)";
	$stmt = $conn->prepare($stmt);
    $stmt->bind_param("sssss",$year,$ernroll,$transaction,$receipt,$type);
    $stmt->execute();
	$stmt->store_result();
	if ($stmt->affected_rows > 0)
       	echo "<script>swal('Data Upload!', 'Data Inserted...', 'success');</script>";
    else
       	echo "<script>swal('Sorry!', 'Data Not Inserted...', 'error');</script>";
	$stmt->close();
		
}
?>

<div id="page-content">
		<section class="box-content box-7" id="location">
			<div class="clearfix">
				<div class="box-item" >
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<center><h3>Upload Fees</h3></center>
								<div id="contact-form">
									<form name="form1" method="post" action="uploadfee.php" enctype="multipart/form-data">
									<div class="row">
                                    <div class="row">
                                    <div class="col-md-4">
                                        </div>
                                            <div class="col-md-4">
												<div class="form-group">
												<center><input type="radio" class="" name="type" id="evensem" value="evensem" <?php (isset($_POST["type"]) && $_POST["type"]=="evensem")?print "checked":print "";  ?>  /> &nbsp;&nbsp;&nbsp;Even Semester
												&nbsp;&nbsp;<input type="radio" class="" name="type" id="oddsem"  value="oddsem"  <?php (isset($_POST["type"]) && $_POST["type"]=="oddsem")?print "checked":print "";  ?> />&nbsp;&nbsp;&nbsp;Odd Semester</center>
												</div>
											</div>
                                        </div>
                                       	<div class="col-md-4">
                                        </div>
                                            <div class="col-md-4">
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
                                      	</div>
                                    </div>
                                    <div class="row">
                                    <div class="col-md-4">
                                    </div>
									<div class="col-md-4">						
                                        Enrollment Number: <input type="text" class="form-control input-lg" name="enrollment_no" id="enrollment_no" placeholder="Enter Enrollment Number" required="required" /><br>
									</div>
    								</div>
                                    <div class="row">
                                    <div class="col-md-4">
                                    </div>
									<div class="col-md-4">						
                                        Tracation Id: <input type="text" class="form-control input-lg" name="transaction" id="transaction" placeholder="Enter Tracation Id Number" required="required" /><br>
									</div>
    								</div>
                                    <center>Select File to upload:
                                        <input type="file"  name="receipt" id="receipt"></center><br>
                                    <div class="row">
                                    <div class="col-md-4">
                                    </div>
									<div class="col-md-4">						
										<center><button type="submit" class="btn btn-skin" name="upload" id="upload">
										 Upload</button></center>
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
    include('footer.php');
?>
