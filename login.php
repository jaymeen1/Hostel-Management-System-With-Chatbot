<?php
session_start();
if(isset($_SESSION['user']))
{
    header("Location: welcome.php");
}
$con=mysqli_connect("localhost","root","","hosteldb");
if(mysqli_connect_errno()>0)
{
	die(mysqli_connect_error());
}
if(isset($_POST["lgBtn"]) || isset($_POST["lgBtn1"]))
{
    if(isset($_POST["lgBtn"]))
    {
        $acpdc=$_POST["email_id"];
        $pass=$_POST["pass"];
        $q="select * from admission_form1 where acpdc_no=? and pass=?";
        $rs=$con->prepare($q);
        $rs->bind_param("ss",$acpdc,$pass);
        $rs->execute();
        $rs->store_result();
        if($rs->num_rows>0)
        {
            $_SESSION["login"] = true;
            $_SESSION["user"] =true;
            $_SESSION["email"]=$acpdc;
            header("Location: welcome.php");
        }
        else
        {
            $msg="Invalid acpdc o or Password";
        }
    }
    if(isset($_POST["lgBtn1"]))
    {
        $enroll=$_POST["email_id"];
        $pass=$_POST["pass"];
        $q="select * from admission_form2 where enrollment_no=? and pass=?";
        $rs=$con->prepare($q);
        $rs->bind_param("ss",$enroll,$pass);
        $rs->execute();
        $rs->store_result();
        if($rs->num_rows>0)
        {
            $_SESSION["email"]=$enroll;
            $_SESSION["user"] =true;
            header("location:welcome.php");
        }
        else
        {
            $msg="Invalid acpdc o or Password";
        }
    }
}
include ('header.php');
?>
	<div id="page-content">
		<section class="box-content box-7" id="location">
			<div class="clearfix">
				<div  class="heading" >
					<h2>LOGIN Form</h2>
				</div>
				<div class="box-item" >
					<div class="container">
						<div class="row">
							<div class="col-md-12">

								<div id="contact-form">
									<form name="form1" method="post" action="login.php">
                                        <div class="row">
                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-4">
												<input onclick="lgBtn.style.display='inline';lgBtn1.style.display='none';" type="radio" class="" name="atype"   required="required" checked/>After S.S.C <br>
												<input onclick="lgBtn1.style.display='inline';lgBtn.style.display='none';" type="radio" class="" name="atype"  required="required" />In Between Semester
                                                <div class="form-group">
                                                    <br>ACPDC No.: <input type="text" class="form-control input-lg" name="email_id" id="acpdc" placeholder="Enter ACPDC Email" required="required" />
                                                    <br>Password: <input type="password" class="form-control input-lg" name="pass" id="pass" placeholder="Enter Password" required="required" />
                                                    <br>
                                                    <button type="submit" class="btn btn-skin" name="lgBtn" id="lgBtn">Submit</button>
                                                    <button type="submit" class="btn btn-skin" name="lgBtn1" id="lgBtn1">Submit</button>
                                            </div>
                                            <div class="col-md-4">
                                            </div>
                                        </div>
										</div>
										</div>
										<?php if(isset($msg)) print "<h5 style='color:red' align='center'>$msg</h5>"; ?>
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
<script>
    $( document ).ready(function() {
        $('#lgBtn1').hide();
    });
    function change_from(id)
    {
        if (id == 1)
        {
            $('#lgBtn1').hide();
            $('#lgBtn').show();
        }
        if (id == 2) {
            $('#lgBtn').hide();
            $('#lgBtn1').show();
        }
    }
</script>
