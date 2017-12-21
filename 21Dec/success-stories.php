<?
$tpTitle = 'B2Bharat.com - Success Stories';
$pgDesc = 'B2Bharat.com - Success Stories';
$pgKeywords = 'B2Bharat - Success Stories';

include "header.php";
include "include/searchDiv.php";
	
include "pagination.php";
$rowsPerPage=5;
$limit=limitation(5);
$que="select * from success_stories where status='1'"
?>        
<div class="container-fulid pdt25" style="background-color:#f5f5f5;">      
<div class="container continr-bg">        
<section id="" class="clearfix contact-us">		
<div class="corporate-info">				
<div class="row">					
<div class="pd20">					   
<div class="col-md-2">					   
</div>					   
						   							
<?		
																		

$trades=$db->get_all_asso($que . $limit);


		     foreach($trades as $trade)
			 {
				 
				 
				 $userdetail=$db->get_all_asso("select * from register where id=".$trade['user_id']);
				
				 //print_r( $userdetail);
				 ?>
			 <div class="col-md-12">					       
<div class="well text-center" >
				<div class="col-md-12">	
				<div class="col-md-4">
				<img  src="<?echo $siteurl;?>/uploads/success/<?echo $trade['story_photo'];?>">
				</div><div class="col-md-8">
				<h5><?echo $trade['story_title'];?></h5>
				<div class="discription"><?echo $trade['story_details'];?></div>
				<div class="postedby"><h6><?echo $trade['story_name'];?></h6><? echo $userdetail[0]['fname']." ".$userdetail[0]['lname'];?></div>
				
				</div>
				</div>
				</div>

</div>
		<?	 }

?>																																			  			<div class="row">
							<div class="col-md-12 ">
								<? $db->insertrec(getPagingQuery1($que, $rowsPerPage, "")); ?>
								<nav class="pagination-wrapper">
								   <? echo $pagingLink = getPagingLink1($que,$rowsPerPage,"",$db); ?>
								</nav>
							</div>
						</div>			   

</div>
</div><!-- row -->
</div>	
</section>        	  <!-- include/buissList.php -->	        <!-- container -->    
</div>
<?include "footer.php";?>