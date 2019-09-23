<script src="js/sweet.js"></script>
<?php
session_start();
if(!isset($_SESSION['admin']))
{
header("location:adminpanel.php");
exit();
}
include('header.php');
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "hosteldb";
$conn = new mysqli($host, $user, $pass, $db_name);

if(isset($_POST['save']))
{
	$year=$_POST['year'];
	$sem=$_POST['type'];
	$arr=$_SESSION["arr"];
	$arr1=$_SESSION["arr1"];
	for($i=1;$i<=count($arr);$i++)
	{
	$ano=$arr["enrollment_no".$i];
	$quota=$arr1["quota".$i];
		
	$stmt="insert into merit_list1(enrollment_no,quota,sem,year) values(?,?,?,?)";
	$stmt = $conn->prepare($stmt);
    $stmt->bind_param("ssss",$ano,$quota,$sem,$year);
    $stmt->execute();
	$stmt->store_result();
	}
	if ($stmt->affected_rows > 0)
       		echo "<script>swal('Data Inserted!','Thank You...',successful);</script>";
    	else
        	echo "<script>swal('Data Not Inserted!','Sorry...',error);</script>";
	$stmt->close();
		
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
							<div class="col-md-12">
								<center><br><h3>Merit List</h3></center>
								<div id="contact-form">
									<form name="form1" method="post" action="merit1.php">
									<div class="row">
									<div class="col-md-4">
                                        </div>
                                            <div class="col-md-4">
												<div class="form-group">
												<a href="merit.php"><input type="radio" class="" name="type2" id="evensem" value="AfterSSC"  /></a> &nbsp;&nbsp;&nbsp;After SSC
												&nbsp;&nbsp;<a href="merit1.php"><input type="radio" class="" name="type2" id="oddsem"  value="Inbetweensem" checked/></a>&nbsp;&nbsp;&nbsp;In Between Semester
												</div>
											</div>
                                        </div>
									</div>
                                    <div class="row">
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
												<div class="form-group">
												<input type="radio" class="" name="type" id="evensem" value="evensem" <?php (isset($_POST["type"]) && $_POST["type"]=="evensem")?print "checked":print "";  ?>  /> &nbsp;&nbsp;&nbsp;Even Semester
												&nbsp;&nbsp;<input type="radio" class="" name="type" id="oddsem"  value="oddsem"  <?php (isset($_POST["type"]) && $_POST["type"]=="oddsem")?print "checked":print "";  ?> />&nbsp;&nbsp;&nbsp;Odd Semester
												</div>
											</div>
                                        </div>
										
										<div class="row">
                                        <div class="col-md-4">
                                        </div>
											<div class="col-md-4">						
												<center><button type="submit" class="btn btn-skin" name="lgBtn" id="lgBtn">
											 Generate Merit List</button></center>
											</div>
    									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		
	</div>
	<?php
	if(isset($_POST["lgBtn"]))
	{
		$year=$_POST["year"];
		$type=$_POST["type"];
		$sql = "select tseat,scseat,stseat,obcseat,genseat from admin_criteria1 where year=$year and type='$type'";
		$result = $conn->query($sql);
		if($result->num_rows > 0)
		{
			echo "<table border=3 align=center width=500 height=200>";
			$row = $result->fetch_assoc();
			$stcount=$row["stseat"];
			$sccount=$row["scseat"];
			$obccount=$row['obcseat'];
			$gencount=$row['genseat'];
			echo"<th> Seat </th><th> Count </th>";
			echo "<tr align=center><td>ST Seats:</td><td width=100>".$row["stseat"]."</td></tr>";
			echo "<tr align=center><td>SC Seats:</td><td>".$row["scseat"]."</td></tr>";
			echo "<tr align=center><td>OBC Seats:</td><td>".$row["obcseat"]."</td></tr>";
			echo "<tr align=center><td>GEN Seats:</td><td>".$row["genseat"]."</td></tr>";
			echo "</table><br><br>";
		}
		$sql1 = "select * from admission_form2 where cast='obc' order by cpi desc";
		$rs = $conn->query($sql1);
		$c=1;
		echo "<table border=3 align=center width=500 height=100><tr><th>Lastname</th><th>Firstname</th><th>Fathername</th><th>CPI</th><th>Enrollment No</th><th>Gender</th><th>Cetegory</th><Th>Quota</th></tr>";	 
		if($rs->num_rows> 0)
		{
			
			$i=1;
			while(($row1 = $rs->fetch_assoc()) && $i<=$obccount)
			{
				$arr["enrollment_no".$c]=$row1["enrollment_no"];
				$arr1["quota".$c]="OBC QUOTA";
				$c++;
			echo "<tr align=center><td width=100>".$row1["lastname"]."</td><td width=100>".$row1["firstname"]."</td><td width=100>".$row1["fathername"]."</td></td><td width=100>".$row1["cpi"]."</td><td width=100>".$row1["enrollment_no"]."</td><td width=100>".$row1["gender"]."</td><td width=100>".$row1["cast"]."</td><td>OBC Quota</td></tr>";
			$i++;
			}
		}
		$sql1 = "select * from admission_form2 where cast='st' order by cpi desc";
		$rs = $conn->query($sql1);
		$c=1;	 
		if($rs->num_rows> 0)
		{
			//echo "<table border=3 align=center width=500 height=100><tr><th>Lastname</th><th>Firstname</th><th>Fathername</th><th>CPI</th><th>Enrollment No</th><th>Gender</th><th>Cetegory</th><Th>Quota</th></tr>";
			$i=1;
			while(($row1 = $rs->fetch_assoc()) && $i<=$stcount)
			{
				$arr["enrollment_no".$c]=$row1["enrollment_no"];
				$arr1["quota".$c]="OBC QUOTA";
				$c++;
			echo "<tr align=center><td width=100>".$row1["lastname"]."</td><td width=100>".$row1["firstname"]."</td><td width=100>".$row1["fathername"]."</td></td><td width=100>".$row1["cpi"]."</td><td width=100>".$row1["enrollment_no"]."</td><td width=100>".$row1["gender"]."</td><td width=100>".$row1["cast"]."</td><td>ST Quota</td></tr>";
			$i++;
			}
		}
		$sql1 = "select * from admission_form2 where cast='sc' order by cpi desc";
		$rs = $conn->query($sql1);
		$c=1;	 
		if($rs->num_rows> 0)
		{
			//echo "<table border=3 align=center width=500 height=100><tr><th>Lastname</th><th>Firstname</th><th>Fathername</th><th>CPI</th><th>Enrollment No</th><th>Gender</th><th>Cetegory</th><Th>Quota</th></tr>";
			$i=1;
			while(($row1 = $rs->fetch_assoc()) && $i<=$sccount)
			{
				$arr["enrollment_no".$c]=$row1["enrollment_no"];
				$arr1["quota".$c]="OBC QUOTA";
				$c++;
			echo "<tr align=center><td width=100>".$row1["lastname"]."</td><td width=100>".$row1["firstname"]."</td><td width=100>".$row1["fathername"]."</td></td><td width=100>".$row1["cpi"]."</td><td width=100>".$row1["enrollment_no"]."</td><td width=100>".$row1["gender"]."</td><td width=100>".$row1["cast"]."</td><td>SC Quota</td></tr>";
			$i++;
			}
		}
		$sql1 = "select * from admission_form2 order by cpi desc";
			$rs = $conn->query($sql1);
	 		if($rs->num_rows> 0)
			{
				//echo "<table border=3 align=center width=500 height=100><tr><th>Lastname</th><th>Firstname</th><th>Fathername</th><th>Mobile No</th><th>Meritmark</th><th>ACPDC No.</th><th>Gender</th><th>Cetegory</th></tr>";
				$i=1;
				while(($row1 = $rs->fetch_assoc())  )
				{
					if(in_array($row1["cpi"],$arr)==0)
					{

						$arr["enrollment_no".$c]=$row1["enrollment_no"];
						$arr1["quota".$c]="GEN QUOTA";
						$c++;
				
						echo "<tr align=center><td width=100>".$row1["lastname"]."</td><td width=100>".$row1["firstname"]."</td><td width=100>".$row1["fathername"]."</td></td><td width=100>".$row1["cpi"]."</td><td width=100>".$row1["enrollment_no"]."</td><td width=100>".$row1["gender"]."</td><td width=100>".$row1["cast"]."</td><td>Gen Quota</td></tr>";
						if($i>=$gencount)
						{
							break;
						}
						$i++;
				
					}
				}
			}
		echo "</table><br>";
		echo "<center><button type='submit' class='btn btn-skin' name='save' id='save' >Save</button></center>";
	$_SESSION["arr"]=$arr;
	$_SESSION["arr1"]=$arr1;		  
	}
	
	?>
	<?php
	?>
	</form>
<?php include('footer.php'); ?>