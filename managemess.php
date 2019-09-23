<?php
session_start();
if(!isset($_SESSION["admin"]))
{
header("location:adminpanel.php");
exit();
}
include ('header.php');
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
								<h3>Manage Mess Food</h3>
								<div id="contact-form">
									<form name="form1" method="post" action="contactus.php">
                                    <div class="row">
                                            <div class="col-md-6">
												<div class="form-group">
											    	<input type="radio" class="" name="atype" id="atype"  required="required" /> &nbsp;&nbsp;&nbsp;Even Semester
											    	&nbsp;&nbsp;<input type="radio" class="" name="atype" id="atype" required="required" />&nbsp;&nbsp;&nbsp;Odd Semester
												</div>
											</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                        	<div class="form-group">
                                        		Year :<select class="form-control input-lg" name="sem" id="sem">
                                                        <option>2018</option>
                                                        <option>2019</option>
                                                       </select>
                                        	</div>                                        		
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="">
                                            <div class="form-group">    
                                                <table style="width:100%"  Border="1">
                                                    <tr>
                                                        <th >Day
                                                        </th>
                                                        <th >Food Type
                                                        </th>
                                                        <th >Food Category
                                                        </th>
                                                        <th >Menu
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Sunday :
                                                        </td>
														<td>
															<select class="form-control input-lg" name="type" id="type">
                                                    		<option>Veg.</option>
                                                           	<option>Non. Veg.</option>
                                                           	</select>
														</td>
														<td>
														<select class="form-control input-lg" name="sCat" id="sCat">
                                                    		<option>Gujrati</option>
                                                           	<option>Punjabi</option>
															<option>Chainese</option>
															<option selected>Not Applicable</option>   
                                                        </select>
														</td>
														<td>
															<input type="text" class="form-control input-lg" name="sFood" id="sFood" placeholder="Enter Food Menu" required="required" />
														</td>
														
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Monday :
                                                        </td>
														<td>
															<select class="form-control input-lg" name="sem" id="sem">
                                                    		<option>Veg.</option>
                                                           	<option>Non. Veg.</option>
                                                           	</select>
														</td>
														<td>
														<select class="form-control input-lg" name="mCat" id="mCat">
                                                    		<option>Gujrati</option>
                                                           	<option>Punjabi</option>
															<option>Chainese</option>
															<option>Not Applicable</option>   
                                                        </select>
														</td>
														<td>
															<input type="text" class="form-control input-lg" name="mFood" id="mFood" placeholder="Enter Food Menu" required="required" />
														</td>
														
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Tuesday :
                                                        </td>
														<td>
															<select class="form-control input-lg" name="sem" id="sem">
                                                    		<option>Veg.</option>
                                                           	<option>Non. Veg.</option>
                                                           	</select>
														</td>
														<td>
														<select class="form-control input-lg" name="tCat" id="tCat">
                                                    		<option>Gujrati</option>
                                                           	<option>Punjabi</option>
															<option>Chainese</option>
															<option>Not Applicable</option>   
                                                        </select>
														</td>
														<td>
															<input type="text" class="form-control input-lg" name="tFood" id="tFood" placeholder="Enter Food Menu" required="required" />
														</td>
														
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Wednesday :
                                                        </td>
														<td>
															<select class="form-control input-lg" name="sem" id="sem">
                                                    		<option>Veg.</option>
                                                           	<option>Non. Veg.</option>
                                                           	</select>
														</td>
														<td>
														<select class="form-control input-lg" name="wCat" id="wCat">
                                                    		<option>Gujrati</option>
                                                           	<option>Punjabi</option>
															<option>Chainese</option>
															<option>Not Applicable</option>   
                                                        </select>
														</td>
														<td>
															<input type="text" class="form-control input-lg" name="wFood" id="wFood" placeholder="Enter Food Menu" required="required" />
														</td>
														
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Thursday :
                                                        </td>
														<td>
															<select class="form-control input-lg" name="sem" id="sem">
                                                    		<option>Veg.</option>
                                                           	<option>Non. Veg.</option>
                                                           	</select>
														</td>
														<td>
														<select class="form-control input-lg" name="thCat" id="thCat">
                                                    		<option>Gujrati</option>
                                                           	<option>Punjabi</option>
															<option>Chainese</option>
															<option>Not Applicable</option>   
                                                        </select>
														</td>
														<td>
															<input type="text" class="form-control input-lg" name="thFood" id="thFood" placeholder="Enter Food Menu" required="required" />
														</td>
														
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Friday :
                                                        </td>
														<td>
															<select class="form-control input-lg" name="sem" id="sem">
                                                    		<option>Veg.</option>
                                                           	<option>Non. Veg.</option>
                                                           	</select>
														</td>
														<td>
														<select class="form-control input-lg" name="fCat" id="fCat">
                                                    		<option>Gujrati</option>
                                                           	<option>Punjabi</option>
															<option>Chainese</option>
															<option>Not Applicable</option>   
                                                        </select>
														</td>
														<td>
															<input type="text" class="form-control input-lg" name="fFood" id="fFood" placeholder="Enter Food Menu" required="required" />
														</td>
														
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Saturday :
                                                        </td>
														<td>
															<select class="form-control input-lg" name="sem" id="sem">
                                                    		<option>Veg.</option>
                                                           	<option>Non. Veg.</option>
                                                           	</select>
														</td>
														<td>
														<select class="form-control input-lg" name="saCat" id="saCat">
                                                    		<option>Gujrati</option>
                                                           	<option>Punjabi</option>
															<option>Chainese</option>
															<option>Not Applicable</option>   
                                                        </select>
														</td>
														<td>
															<input type="text" class="form-control input-lg" name="saFood" id="saFood" placeholder="Enter Food Menu" required="required" />
														</td>
                                                    </tr>
                                                </table>
                                            </div>
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