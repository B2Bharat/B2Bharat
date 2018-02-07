<?
$tpTitle = 'Articles | B2Bharat.com ,Buyer Testimonials,Customers success stories';
$pgDesc = 'B2Bharat main aim is to provide best customer service,so that customer will increase their sales and profit very easily';
$pgKeywords = 'B2Bharat Articles, Customers Feedback, B2Bharat Client Feedback , Buyers Success Stories, Suppliers Feedback, Member Review';
include "header.php";
include "include/searchDiv.php";
	
include "pagination.php";
$rowsPerPage=5;
$limit=limitation(5);
$que="select * from article where id>'1' and active_status='1'"
?>        
<div class="container-fulid pdt25artical" style="background-color:#f5f5f5;">      
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
				 $encid=$com_obj->encid($trade['id']);
				 $perma=strtolower(str_replace(" ", "-",  $trade['name']));
				
				 //print_r( $userdetail);
				 ?>
			 <div class="col-md-12">					       
<div class="well text-center">
				<div class="col-md-12">	
				<div class="col-md-4">
				<img  src="<?echo $siteurl;?>/uploads/article/<?echo $trade['image'];?>">
				</div><div class="col-md-8">
				<h5><a href="<? echo $siteurl; ?>/article-detail/<?php echo $encid;?>/<?php echo $perma;?>"><?echo $trade['name'];?></a></h5>
				<div class="discription">
<?php 
				if(strlen(strip_tags($trade['content']))>500)
				{?>
			<? echo substr( strip_tags($trade['content']),0,500).'...';?>
					<br/><br/><a href="<? echo $siteurl; ?>/article-detail/<?php echo $encid;?>/<?php echo $perma;?>" class="btn btn-global mainreadmore">Read More</a>
				<?php }
				else
				{
					 echo $trade['content'];
				}

				?></div>
				
				
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