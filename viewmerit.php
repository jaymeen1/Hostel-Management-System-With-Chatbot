<?php
    session_start();
    include("header.php");
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db_name = "hosteldb";
    $conn = new mysqli($host, $user, $pass, $db_name);	
 ?>
 <div id="page-content">
		<section class="box-content box-7" id="location">
			<div class="clearfix">
				
				<div class="box-item" >
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<center><h3>Merit List</h3></center>
								<div id="contact-form">
									<form name="form1" method="post" action="viewmerit.php">
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
												<center><button type="submit" class="btn btn-skin" name="viewbtn" id="viewbtn">
											 View Merit List</button></center>
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
if(isset($_POST['viewbtn']))
{
    $year=$_POST["year"];
    $type=$_POST["type"];
    $sql = "select * from merit_list where year = $year and sem = '$type'";
    $result = $conn->query($sql);
    if($result->num_rows>0)
    {
        echo "<table border=3 align=center width=500 height=100><th>Year</th><th>Semester</th><th>ACPDC No.</th><Th>Quota</th></tr>";
	    while($row1 = $result->fetch_assoc())
    	{
        	echo "<tr align=center><td width=100>".$row1["year"]."</td><td width=100>".$row1["sem"]."</td><td width=100>".$row1["acpdc"]."</td><td width=100>".$row1["quota"]."</td></tr>";
	    }
    }
    echo "</table><br><br>";			
}

?>

<?php include("footer.php"); ?>
