<? include "header.php"; ?>            
<!--===================================================-->            
<!--END NAVBAR-->            
<div class="boxed">                
	<!--CONTENT CONTAINER-->                
	<!--===================================================-->                
	<div id="content-container">                    
		<? include "header_nav.php"; ?>                    
		<div class="pageheader">                        
			<h3><i class="fa fa-users"></i> User Management </h3>                        
			<div class="breadcrumb-wrapper">                            
				<span class="label">You are here:</span>                            
				<ol class="breadcrumb">                                
					<li> <a href="welcome.php"> Home </a> </li>                                
					<li class="active">User Management</li>                           
				</ol>                        
			</div>                    
		</div>
		<?$act = isSet($act) ? $act : '' ; 
		$id = isSet($id) ? $id : '' ;
		$upd = isSet($upd) ? $upd : '' ;
		$status = isSet($status) ? $status : '' ;
		$publish = isSet($publish) ? $publish : '' ;
		$Message = isSet($Message) ? $Message : '' ;
		if($act == "del") {	
			if($userimages !="noimage.jpg"){		
				$RemoveImage = "../uploads/user_images/$userimages";		
				@unlink($RemoveImage);	}    
				$db->insertrec("delete from register where id='$id'");	
				$db->insertrec("delete from company where user_id='$id'");
				
				echo "<script>location.href='user.php?act=del1'</script>";    
				@header("location:user.php?act=del1");    exit ;}
				if($status == "1") {    
					$db->insertrec("update register set active_status='0' where id='$id'");	
					echo "<script>location.href='user.php?act=sts'</script>";    
					@header("location:user.php?act=sts");    exit ;}
					else if($status == "0") {   
						$db->insertrec("update register set active_status='1' where id='$id'");	
						echo "<script>location.href='user.php?act=sts'</script>";    
						@header("location:user.php?act=sts");    exit ;
					}
					if($publish == "yes") {    
						$db->insertrec("update register set publish='no' where id='$id'");	
						echo "<script>location.href='user.php?act=sts'</script>";    
						@header("location:user.php?act=sts");    exit ;
					}
					else if($publish == "no") {    
						$db->insertrec("update register set publish='yes' where id='$id'");	
						echo "<script>location.href='user.php?act=sts'</script>";   
						@header("location:user.php?act=sts");    exit ;
					}
					$GetRecord=$db->get_all("select * from register where id !=0 order by id desc");
					if(count($GetRecord)==0)    
						$Message="No Record found";$disp = "";
					for($i = 0 ; $i < count($GetRecord) ; $i++) {   
						@extract($GetRecord[$i]);   
						$idvalue = $GetRecord[$i]['id'];
						$email=$GetRecord[$i]['email'];	
						$mobile=$GetRecord[$i]['mobile'];	
						$crcdt=$GetRecord[$i]['crcdt'];	
						$user_role=$GetRecord[$i]['user_role'];	
						$publish=$GetRecord[$i]['publish'];	
						$user_rolen=$db->Extract_Single("select role from user_role where id ='$user_role'");
						$type=$GetRecord[$i]['user_type'];
						if($type==1) 
							$userType="seller";
						else if($type==2)
							$userType="buyer";
						else if($type==3)
							$userType="service";
						else $userType="all";

						$slno = $i + 1 ;    
						if($active_status == '0'){        
							$DisplayStatus = $GT_InActive;		
							$Title = "Active";		
							$status_active = "Deactive";		
							$EditLink = "<a class='btn btn-default' >
							<i class='fa ><font color='red'>--</font></i></a>";	
						}	  

						else if($active_status == '1'){        
							$DisplayStatus = $GT_Active;		
							$Title = "Deactive";		
							$status_active = "Active";		
							$EditLink = "<a href='user_role.php?upd=2&id=$idvalue'
							 title='Edit' class='btn btn-default' ><i class='fa fa-edit'></i></a>";	
						}	 
						if($publish == 'no'){       
							$DisplayStatus1 = $GT_InActive;		
							$Title1 = "Publish";		
							$status_active1 = "Deactive";	
						}	   
						else if($publish == 'yes'){        
							$DisplayStatus1 = $GT_Active;		
							$Title1 = "Unpublish";		
							$status_active1 = "Active";	
						}    
						$disp .="<tr>				
						<td>$slno</td>								
						<td  align='left'>$email</td>				
						<td  align='left'>$fname</td>	
                                                <td  align='left'>$lname</td>	
                                                 <td  align='left'>$company_name</td>	
						<td  align='left'>$user_rolen</td>
						<td  align='left'>$userType</td>						
						<td  align='left'>$crcdt</td>				
						<td width='20%'>				
							<div class='btn-group btn-group-xs'>				
								<a href='user.php?id=$idvalue&status=$active_status' title='$Title' class='btn btn-default' data-toggle='tooltip'>$DisplayStatus</a>										$EditLink					<a href='user.php?id=$idvalue&act=del' onclick='return confirmmain()' class='btn btn-default' title='Delete' data-toggle='tooltip'>$GT_Delete</a>				
							</div>				
						</td>			
					</tr>";
				}
				if($act == "del1")    
					$Message = "<font color='green'><b>Deleted Successfully</b></font>" ;
				else if($act == "upd")   
					$Message = "<font color='green'><b>Updated Successfully</b></font>" ;
				else if($act == "add")   
					$Message = "<font color='green'><b>Added Successfully</b></font>" ;
				else if($act == "sts")    
					$Message = "<font color='green'><b>Status Changed Successfully</b></font>" ;
				?>                    <!--Page content-->                    
				<!--===================================================-->                   
				<div id="page-content">                        
					<!-- Basic Data Tables -->                       
					<!--===================================================-->                       
					<div class="panel">         
                                            <a class="btn btn-info" href="welcome.php">Back</a>
						<div class="panel-heading">                                
							<h3 class="panel-title">User Management <?echo $Message;?></h3>
						</div>                            
						<div class="panel-body">							
							<div class="col-sm-12 text-right">
								<a class="btn btn-info" href="user_role.php?upd=1">Add New</a>
							</div>                                
							<table id="demo-dt-basic" class="table table-striped table-bordered">                                   
								<thead>                                        
									<tr>											
										<th>Sr. No.</th>											
										<th>Username/Email</th>											
										<th> First Name</th>
                                                                                <th>Last Name</th>
                                                                                 <th>Company Name</th>
                                                                                
										<th>User Roles</th>

										<th>User Type</th>
										
										<th>Register Date</th>																			
										<th class='cntrhid'>Action</th>                                       
									</tr>                                    
								</thead>  

								<tbody><?echo $disp; ?></tbody>                                
							</table>                           
						</div>                       
					</div>                    
				</div>                   
				<!--===================================================-->                    <!--End page content-->                
			</div>               
			<!--===================================================-->                
			<!--END CONTENT CONTAINER-->			
			<? include "leftmenu.php"; ?>	           
		</div>
		<? include "footer.php"; ?>