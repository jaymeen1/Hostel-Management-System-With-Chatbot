<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Hostel Management System</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="owl-carousel/owl.theme.css" rel="stylesheet">
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <style>
        .heading{
            padding-top: 40px;
        }
    </style>
</head>
<body>
<div class="top">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <ul class="list-inline social-buttons">
                    <li><a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li><a href="https://www.facebook.com/jaymeen14333"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-google"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="top-search">
                    <div id="search" class="input-group">
                        <input type="text" name="search" value="" placeholder="Search" class="form-control" />
                        <span class="input-group-btn">
							<button type="button" class="btn btn-default btn-lg"><i class="fa fa-search"></i></button>
						  </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="nav-wrapper">
    <div id="nav" class="navbar navbar-default navbar-inner">
        <div class="container">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <?php   if( isset($_SESSION['admin']) ){ ?>
                        <li>
                            <a class="page-scroll" href="adminhome.php">Home</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Admission Criteria
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="page-scroll" href="admissionprocess.php">After SSC</a></li>
                                <li><a class="page-scroll" href="admissionprocess1.php">In Between Sem</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">View Merit List
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="page-scroll" href="viewmerit.php">After SSC</a></li>
                                <li><a class="page-scroll" href="viewmerit1.php">In Between Sem</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="page-scroll" href="feesstruct.php">Fee Structure</a></li>
                                <li><a class="page-scroll" href="sendnotification.php">Notification</a></li>
                                <li><a class="page-scroll" href="merit.php">Merit List Generator</a></li>
                                <li><a class="page-scroll" href="complain.php">Manage Complain</a></li>
                                <li><a class="page-scroll" href="managemess.php">Manage Mess</a></li>
                            </ul>
                        </li>
                        <li>
                            <a class="page-scroll" href="transaction.php">Transaction Module</a>
                        </li>
                    <?php } ?>
                    <?php  if(isset($_SESSION['user'])){ ?>
                        <li>
                            <a class="page-scroll" href="welcome.php">Home</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="uploadfee.php">Upload Receipt</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="chatbot.php">Chat Room</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="approved.php">Notification</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="welcome.php">View Notofication</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">View Merit List
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a class="page-scroll" href="viewmerit.php">After SSC</a></li>
                                <li><a class="page-scroll" href="viewmerit1.php">In Between Sem</a></li>
                            </ul>
                        </li>
                    <?php } ?>
                    <?php  if(!$_SESSION){ ?>
                        <li>
                            <a class="page-scroll" href="index.php">Home</a>
                        </li>
                        <li>
                            <a class="page-scroll first" href="#nav-services">Hostel Services</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="photogallary.php">Hostel Gallery</a>
                        </li>
                     <?php } ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php  if($_SESSION){ ?>
                        <li>
                            <a class="page-scroll" href="logout.php">Logout</a>
                        </li>
                    <?php } ?>
                    <?php  if(!$_SESSION){ ?>
                        <li>
                            <a class="page-scroll" href="admission.php">Admission</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="feesstruct.php">Fees Structure</a>
                        </li>
                        <li>
                            <a class="page-scroll" href="contactus.php">Contact Us</a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
