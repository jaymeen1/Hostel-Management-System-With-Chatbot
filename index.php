<?php session_start(); ?>
<?php include ('header.php');?>
<header>
    <div class="box-shadow">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img src="images/1.jpg" alt="First slide">
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                        </div>
                    </div><!-- /header-text -->
                </div>
                <div class="item">
                    <img src="images/2.jpg" alt="Second slide">
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                        </div>
                    </div><!-- /header-text -->
                </div>
                <div class="item">
                    <img src="images/3.jpg" alt="Third slide">
                    <!-- Static Header -->
                    <div class="header-text hidden-xs">
                        <div class="col-md-12 text-center">
                            <h1><!--Let's enjoy the wonders <br/>of the nature together!--></h1>
                        </div>
                    </div><!-- /header-text -->
                </div>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div><!-- /carousel -->
    </div>
</header>
	<div id="page-content">
		<section class="box-content box-1" id="nav-services">
			<div class="container">
				<div class="heading">
					<h2>Why Join Our Hostel?</h2>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="box-item">
							<center><img src="images/climbing.png" /></center>
							<h3>Quick Addmission</h3>
							<p>Student Can Register themself by entering their personal and acadmic details and after that login into system and check merit list for admission.</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="box-item">
							<center><img src="images/fishing.png" /></center>
							<h3>Extra Activity</h3>
							<p>Available Gym for students, Hostel ground for playing games like cricket, football for only hostel students and free WI-FI avalilable for students</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="box-item">
							<center><img src="images/camping.png" /></center>
							<h3>Online<br> Fees</h3>
							<p>Any students can pay that hostel fees via SBI collect and after submit is the fees tranjection sleep is uploaded in this system online.</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="box-item">
							<center><img src="images/fire.png" /></center>
							<h3>Chatboat<br></h3>
							<p>This system have also available for online communication with hostel system</p>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>
    <div id="page-content">
        <section class="box-content box-1" id="nav-event">
            <div class="container">

                <div class="row">
                    <div class="col-md-3">
                        <div class="box-item">
                            <center><img src="images/climbing.png" /></center>
                            <h3>Quick Addmission</h3>
                            <p>Student Can Register themself by entering their personal and acadmic details and after that login into system and check merit list for admission.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-item">
                            <center><img src="images/fishing.png" /></center>
                            <h3>Extra Activity</h3>
                            <p>Available Gym for students, Hostel ground for playing games like cricket, football for only hostel students and free WI-FI avalilable for students</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-item">
                            <center><img src="images/camping.png" /></center>
                            <h3>Online<br> Fees</h3>
                            <p>Any students can pay that hostel fees via SBI collect and after submit is the fees tranjection sleep is uploaded in this system online.</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="box-item">
                            <center><img src="images/fire.png" /></center>
                            <h3>Chatboat<br></h3>
                            <p>This system have also available for online communication with hostel system</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal" style="z-index: 99999999"  role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hostel Management System</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-4">
                            <a href="index1.php" ><img style="height: 100px;width: 100px" src=" images/1-1.png"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Student</a>
                            </div>
                            <div class="col-md-4">
                                <a href="adminpanel.php" ><img style="height: 100px;width: 100px" src=" images/2-2.png"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Admin</a>
                            </div>
                            <div class="col-md-4">
                                <a href="login.php" ><img style="height: 100px;width: 100px" src=" images/3-3.png"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Hostel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php include ('footer.php');?>
<script>
    $(document).ready(function(){
        $('#myModal').modal({
            backdrop: 'static',
            keyboard: false
        });
    });
</script>
