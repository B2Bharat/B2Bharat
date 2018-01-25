<style>
  .glyphicon {margin-right: 10px !important;}
</style>
<div class="col-sm-3 col-md-3 profile-bg">
				<div class="row">
                  <div class="col-md-12  text-center">
				 <?
					$memInfo = $db->singlerec("select * from membership where id = '".$userInfo['mem_pack']."'");
					$transSts = $userInfo['tranx_st'];
					$balDays='';
					$plandays = (int)$memInfo['package_renewal'];
					$max_price = $memInfo['max_price'];
					$memNam = $memInfo['name'];
					
					
					$joindate = strtotime($userInfo['crcdt']);
					$today = time();
					$usedDays = floor(($today-$joindate)/(24*60*60));
					
					if($plandays!==0){	
						$from = strtotime($userInfo['crcdt']);
						$to = $from + ($plandays*24*60*60);
						$now = strtotime(date('Y-m-d'));
						$bal = $to - $now;
						$balDays = floor($bal/(24*60*60));
						$balancedays = $balDays;
						$balancedays_con = $balancedays;
					}else{
						$balDays = '0';
						$balancedays_con = 1; 
					}
				 if((0 >= $balancedays_con)||($transSts==0)){echo "<h5 style='color:#d61c23;font-weight:bold;padding-top:10px;'>Please Upgrade Your Membership</h5>";}
				 ?>
				 
				  </div>
				</div>  
               <div class="row">
                  <div class="col-md-12  text-center">
                     <div class="profile-image">
					 <?if($uinfo["img"]!=""){
					 $img=$uinfo["img"]; }
					//else $img="userimage.jpg";
					else { $img="no_image.png"; }?>
						<?php
						$url="/uploads/user_images/".$img;
						if(!file_exists($url)) $url="/uploads/user_images/no_image.png";
						?>
                        <img src="<?php echo $siteurl."/uploads/user_images/".$img;?>" width="150" class="img-circle ">
                     </div>
                     <p class="profile-usertitle-name"><?php echo ucfirst($uinfo["fname"]).' '.$uinfo["lname"];?></p>
                     <p class="profile-mobile"><?php echo $uinfo["mobile"];?> <span style="color:#1f8b23;" class="glyphicon glyphicon-ok-circle"></span></p>
                     <p class="profile-mobile"><?php echo $uinfo["email"]; ?> </p>
                     <p class="profile-mobile">Profile ID: <?php echo $uinfo["id"]; ?> </p>
					 <?php if($uinfo["last_login_date"]!='0000-00-00 00:00:00'){?>
                     <p class="profile-mobile">Last Login: <span style="color:#d61c23;"><?php echo date("d-M-Y h:i A",strtotime($uinfo["last_login_date"]));?><span> </span></span></p>
					 <?php }?>
                  </div>
               </div>
               <div class="col-md-12 pdt15">
                  <div class="panel-group" id="accordion">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-user"></span>My Account</a>
                           </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse">
                           <div class="panel-body">
                              <table class="table">
                                 <tbody>
                                    <tr>
                                       <td>
                                          <a id='profile' href="<?php echo $siteurl;?>/profile">My Profile</a>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <a id='change-pass' href="<?php echo $siteurl;?>/change-pass">Change Password</a>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <a id='edit-profile' href="<?php echo $siteurl;?>/edit-profile">Edit Profile</a>
                                       </td>
                                    </tr>
									<tr>
                                       <td>
                                          <a id='change-profile-img' href="<?php echo $siteurl;?>/change-profile-img">Change Image</a>
                                       </td>
                                    </tr>
									
                                    <!-- <tr>
                                       <td>
                                           <span class="glyphicon glyphicon-chevron-right"></span><a href="#">Comments</a>
                                           <span class="badge">42</span> 
                                       </td>
                                       </tr> -->
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
					 
					<div class="panel panel-default">
						<div class="panel-heading">
						  <h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo-1"><span class="glyphicon glyphicon-bookmark">
							</span>Company Details</a>
						  </h4>
						</div>
						<div id="collapseTwo-1" class="panel-collapse collapse">
						  <div class="panel-body">
							<table class="table">
							  <tbody>
								<tr>
								  <td>
									<a id='manage-company' href="<?echo $siteurl;?>/manage-company">Manage Company</a>
								  </td>
								</tr>
							  </tbody>
							</table>
						  </div>
						</div>
					</div>
					
					
					<div class="panel panel-default">
						<div class="panel-heading">
						  <h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo-2"><span class="	glyphicon glyphicon-tags">
							</span>Membership Details</a>
						  </h4>
						</div>
						<div id="collapseTwo-2" class="panel-collapse collapse">
						  <div class="panel-body">
							<table class="table">
							  <tbody>
								<tr>
								  <td>
									<a id='manage-company' href="<?echo $siteurl;?>/membership-details.php">Current Plan</a>
								  </td>
								</tr>
								<tr>
								  <td>
									<a id='manage-company' href="<?echo $siteurl;?>/upgrade-membership.php">Upgrade Membership</a>
								  </td>
								</tr>
							  </tbody>
							</table>
						  </div>
						</div>
					</div>
					 
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-th">
                              </span>Product</a>
                           </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                           <div class="panel-body">
                              <table class="table">
                                 <tbody>
                                    <tr>
                                       <td>
                                          <a id="add-product" href="<? echo $siteurl; ?>/add-product">Add Product</a> <!-- <span class="label label-success">$ 320</span> -->
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <a id="manage-product" href="<? echo $siteurl; ?>/manage-product">Manage Product</a>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
					 <!-- buyers only can had this option -->
					 <?if($usertype=='buyer' || $usertype=='seller' || $usertype=='all'){?>
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-shopping-cart">
                              </span>Want to Buy</a>
                           </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                           <div class="panel-body">
                              <table class="table">
                                 <tbody>
                                    <tr>
                                       <td>
                                          <a id='add-buying-offer' href="<?echo $siteurl;?>/add-buying-offer">Want to Buy</a>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <a id='manage-buying-leads' href="<?echo $siteurl;?>/manage-buying-leads">Manage offers</a> <!-- <span class="label label-info">5</span> -->
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
					
					   

				<?}?>
                                 <!-- sellers only can had this option -->
                                
                                <?if( $usertype=='seller' || $usertype=='buyer' || $usertype=='all'){?>
                     <div class="panel panel-default">
                        <div class="panel-heading">
                           <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-tags">
                              </span>Want To sell</a>
                           </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                           <div class="panel-body">
                              <table class="table">
                                 <tbody>
                                    <tr>
                                       <td>
                                          <a id='add-selling-offer' href="<?echo $siteurl;?>/add-selling-offer">Want To Sell</a>
                                        
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <a id='manage-selling-leads' href="<?echo $siteurl;?>/manage-selling-leads">Manage offers</a> <!-- <span class="label label-info">5</span> -->
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
					 <?}?> 
                                         
                                         
					 <?if($usertype=='seller' || $usertype=='all'){
						 if((int)$userInfo['mem_pack']!==1){
						 ?>
						<div class="panel panel-default">
							<div class="panel-heading">
							  <h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse4"><span class="	glyphicon glyphicon-cloud">
								</span>Trade Shows</a>
							  </h4>
							</div>
							<div id="collapse4" class="panel-collapse collapse">
							  <div class="panel-body">
								<table class="table">
								  <tbody>
									<tr>
									  <td>
										<a  href="<?echo $siteurl;?>/add-trade-show">Add New Trade show</a>
									  </td>
									</tr>
									<tr>
									  <td>
										<a href="<?echo $siteurl;?>/manage-trade-show">Manage Trade show</a> 
									  </td>
									</tr>
								  </tbody>
								</table>
							  </div>
							</div>
						</div>	 
					 <?}}?>	
					 					 
						 <div class="panel panel-default">
							<div class="panel-heading">
							  <h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse4-1"><span class="glyphicon glyphicon-pencil">
								</span>News </a>
							  </h4>
							</div>
							<div id="collapse4-1" class="panel-collapse collapse">
							  <div class="panel-body">
								<table class="table">
								  <tbody>
									<tr>
									  <td>
										<a href="<?echo $siteurl;?>/add-news">Add News</a>
									  </td>
									</tr>
									<tr>
									  <td>
										<a href="<?echo $siteurl;?>/manage-news">Manage News</a> 
									  </td>
									</tr>
								  </tbody>
								</table>
							  </div>
							</div>
						  </div>
					 
						 <div class="panel panel-default">
							<div class="panel-heading">
							   <h4 class="panel-title">
								  <a data-toggle="collapse" data-parent="#accordion" href="#collapse5"><span class="glyphicon glyphicon-thumbs-up">
								  </span>My Success Story</a>
							   </h4>
							</div>
							<div id="collapse5" class="panel-collapse collapse">
							   <div class="panel-body">
								  <table class="table">
									 <tbody>
										<tr>
										   <td>
											  <a href="<?echo $siteurl;?>/add-success-story">Add New Success Story</a> <!-- <span class="label label-info">5</span> -->
										   </td>
										</tr>
										<tr>
										   <td>
										   <a href="<?echo $siteurl;?>/manage-success-story">Manage Success Story</a> 
											  <!-- <span class="label label-info">5</span> -->
										   </td>
										</tr>
									 </tbody>
								  </table>
							   </div>
							</div>
						 </div>
						 <div class="panel panel-default">
							<div class="panel-heading">
							   <h4 class="panel-title">
								  <a data-toggle="collapse" data-parent="#accordion" href="#collapse6"><span class="	glyphicon glyphicon-envelope">
								  </span>Mail Box</a>
							   </h4>
							</div>
							<div id="collapse6" class="panel-collapse collapse">
							   <div class="panel-body">
								  <table class="table">
									 <tbody>
										<tr>
										   <td>
											  <a href="<?echo $siteurl;?>/email-compose">Compose Mail</a> <!-- <span class="label label-info">5</span> -->
										   </td>
										</tr>
										<? $inboxnum=$db->get_all("select * from enquiries where to_mail='$uinfo[email]' and del_status!=2"); 
										$inboxcnt=count($inboxnum);
										$sentnum=$db->get_all("select * from enquiries where email='$uinfo[email]' and del_status=0"); 
										$sentcnt=count($sentnum);
										?>
										<tr>
										   <td>
											  <a href="<?echo $siteurl;?>/email-inbox">Inbox</a>  <span class="label label-info"><? echo $inboxcnt; ?></span> 
										   </td>
										</tr>
										<tr>
										   <td>
											  <a href="<?echo $siteurl;?>/email-sent">Sent Items</a>  <span class="label label-info"><? echo $sentcnt; ?></span> 
										   </td>
										</tr>
									 </tbody>
								  </table>
							   </div>
							</div>
						 </div>
						 <div class="panel panel-default">
							<div class="panel-heading">
							   <h4 class="panel-title">
								  <a data-toggle="collapse" data-parent="#accordion" href="#collapse7"><span class="glyphicon glyphicon-cd">
								  </span>Help</a>
							   </h4>
							</div>
							<div id="collapse7" class="panel-collapse collapse">
							   <div class="panel-body">
								  <table class="table">
									 <tbody>
										<tr>
										   <td>
											  <a href="help.php">Help</a> <!-- <span class="label label-info">5</span> -->
										   </td>
										</tr>
									 </tbody>
								  </table>
							   </div>
							</div>
						 </div>
                  </div>
               </div>
            </div>
<?php $cfile = basename($_SERVER['REQUEST_URI']);?>
<script>var call = setTap('<? echo $cfile; ?>');</script>		