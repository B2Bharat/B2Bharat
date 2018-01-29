
<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<meta http-equiv="expires" content="Sun, 01 Jan 2019 00:00:00 GMT"/>
<meta http-equiv="pragma" content="no-cache" />
<?include "admin/AMframe/config.php";

include "include/captcha.php";
/* If condition by Abhishek kandari */
//if ($_SERVER['REQUEST_METHOD'] === 'GET') /* If condition by Abhishek kandari */
//{
	$_SESSION['captcha'] = simple_php_captcha();
//}

//@session_start();
?>
<!DOCTYPE html>
	<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <!--Tags added for SEO : need to added in all requried files -->
<!--	<title><?php echo $tpTitle ?></title>
    <meta name="description" content="<?php echo $pgDesc ?>"></meta>
    <meta name="keywords" content="<?php echo $pgKeywords ?>"></meta>-->

	<!--<title>B2Bharat.com - Online B2B Market Place, Indian Exporters, Manufacturers, Suppliers Business Directory.</title>-->
	<link href="<? echo $siteurl; ?>/assets/css/font-awesome.css" rel="stylesheet">
	<link href="<? echo $siteurl; ?>/assets/css/style.css" rel="stylesheet">
	<link href="<? echo $siteurl; ?>/assets/css/jquery.bxslider.css" rel="stylesheet">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	  <link rel="stylesheet" href="<? echo $siteurl; ?>/assets/css/bootstrap.min.css" >
      <link rel="stylesheet" href="<? echo $siteurl; ?>/assets/css/font-awesome.min.css">
      <link rel="stylesheet" href="<? echo $siteurl; ?>/assets/css/icofont.css">
	  <link rel="stylesheet" href="<? echo $siteurl; ?>/assets/css/sweetalert.css">
      <link rel="stylesheet" href="<? echo $siteurl; ?>/assets/css/owl.carousel.css">
      <link rel="stylesheet" href="<? echo $siteurl; ?>/assets/css/slidr.css">
	  <link rel="stylesheet" href="<? echo $siteurl; ?>/assets/css/animate.css">
      <link rel="stylesheet" href="<? echo $siteurl; ?>/assets/css/main.css">
      <link id="preset" rel="stylesheet" href="<? echo $siteurl; ?>/assets/css/presets/preset1.css">
      <link rel="stylesheet" href="<? echo $siteurl; ?>/assets/css/responsive.css">
	  <link rel="stylesheet" href="<? echo $siteurl; ?>/assets/css/vertical_menu_basic.css">
      <!-- font -->
      <!--link href='https://fonts.googleapis.com/css?family=Ubuntu:400,500,700,300' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Signika+Negative:400,300,600,700' rel='stylesheet' type='text/css'-->
      <!-- icons -->
      <link rel="icon" href="<? echo $siteurl; ?>/assets/images/<?echo $frontend_favicon;?>">
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<? echo $siteurl; ?>/assets/images/ico/apple-touch-icon-144-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<? echo $siteurl; ?>/assets/images/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<? echo $siteurl; ?>/assets/images/ico/apple-touch-icon-72-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="57x57" href="<? echo $siteurl; ?>/assets/images/ico/apple-touch-icon-57-precomposed.png">
	    <script src="<? echo $siteurl; ?>/assets/js/jquery.min.js"></script>
	  <script src="<? echo $siteurl; ?>/assets/js/sweetalert.min.js"></script>
	    <script type='text/javascript' src='<? echo $siteurl; ?>/assets/js/jquery.hoverIntent.minified.js'></script>
      <script type='text/javascript' src='<? echo $siteurl; ?>/assets/js/jquery.dcverticalmegamenu.1.1.js'></script>
      <script type="text/javascript">
         $(document).ready(function($){
          	$('#mega-1').dcVerticalMegaMenu({
          		rowItems: '5',
          	});
          });
      </script>
	</head>	
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

<!-- Include all compiled plugins (below), or include individual files as needed -->

	<body>
<!--Google -Fonts--> 

<!--Font-awsome--> 

<!--section---------Start-------header------>	

	<header>
	  <div class="container-fluid">
		<div class="container">
		  <div class="row">
			<div class="header_sec_wrapper">
			  <div class="colmd-3">
				<div class="logo_sec"><a href="<? echo $siteurl; ?>/index"><img src="<? echo $siteurl; ?>/assets/images/<?echo $sitelogo;?>" alt="Logo"></a></div>
			  </div>
			  <div class="colmd-9">
				<div class="header_icon_social">
				  <div class="icon_head">
				  <a href="https://www.facebook.com" target="_blank" class="facebook" title="Facebook"><span><i class="fa fa-facebook"></i></span></a>
				  <a href="http://www.twitter.com" target="_blank" class="twitter" title="Twitter"><span><i class="fa fa-twitter"></i></span></a> 
				  <a href="https://plus.google.com" target="_blank" class="googleplus" title="Google Plus"><span><i class="fa fa-google-plus"></i></span></a> <a href="https://www.youtube.com" target="_blank" class="youtube" title="You Tube"><span><i class="fa fa-youtube"></i></span></a></div>
				</div> 
				<div class="help_us">
				  <p>Help | 91-8928131130</p>
				</div>
				<div class="welcome_sec_right">
				  <nav class="">
				  
				  <!-- Brand and toggle get grouped for better mobile display -->
				  <div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				  </div>
				  
				  <!-- Collect the nav links, forms, and other content for toggling -->
				  <div class="" id="">
					<ul class="">
					<?
					if(empty($_SESSION['user'])){
						?>
						<li><a href="<? echo $siteurl; ?>/sellers-sell">Sell On B2Bharat</a> </li>
					    <li><a href="<? echo $siteurl; ?>/register"> Join Free</a></li>
					    <li><a href="<? echo $siteurl; ?>/login">Sign In</a></li>
					<?
					}else{
					?>
						<li><a href="<? echo $siteurl; ?>/profile">Hello! <? echo @ucfirst($_SESSION['username']); ?></a> </li>
					    <li><a href="<? echo $siteurl; ?>/add-product"><? echo $lang_ads;?></a> </li>
					    <li><a href="<? echo $siteurl; ?>/register"> Join Free</a></li>
					    <li><a href="<? echo $siteurl; ?>/logout">Logout</a></li>
                    <?					
					}
					?>
					  
					</ul>
				  </div>
				  <!-- /.navbar-collapse --> 
				  
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</header>
<!--section---------close-------header------> 
<!--section---------Start-------NAvigation------>
	<nav class="top-nav">
	  <div class="container">
		<nav class="navbar navbar-default">
	  <div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>
		  <a class="navbar-brand" href="<?echo $siteurl;?>/index"><i class="fa fa-home"></i></a> 
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		  <ul class="nav navbar-nav">
			<li class="active"><a href="<?echo $siteurl;?>/classifieds"><?echo $lang_clasi;?> <span class="sr-only">(current)</span></a></li>
			<li style="display: block;" class=" "><a  	href="<?echo $siteurl;?>/product-list" title=""><?echo $lang_prod;?></a> </li>
			<li style="display: block;" class=" "><a href="<?echo $siteurl;?>/company-list" title=""><?echo $lang_comp;?></a> </li>
			<li style="display: block;" class=" "><a  href="<?echo $siteurl;?>/sellers" title=""><?echo $lang_suppliers;?></a> </li>
			<li style="display: block;" class=" "><a  href="<?echo $siteurl;?>/buyers" title=""><?echo $lang_buyers;?></a> </li>
			<li style="display: block;" class=" "><a  href="<?echo $siteurl;?>/buying-leads-list" title=""><?echo $lang_bl;?></a> </li>
			<li style="display: block;" class=" "><a  href="<?echo $siteurl;?>/selling-leads-list" title=""><?echo $lang_sl;?></a> </li>
			
		  </ul>
		  
		  
		</div><!-- /.navbar-collapse -->
	  </div><!-- /.container-fluid -->
	</nav>
	  </div>
	</nav>
<!--section---------Close-------NAvigation------> 




<!--section---------START-------Search------>	
         <div class="container">
            <div class="row">
               <!-- banner -->
			   <?php 
			   if (strpos($_SERVER['PHP_SELF'],'index.php')!== false) 
				  {
					  $class="";
				  }
				  else
				  {
					  $class="bannerinner";
				  }
			   
			   ?>
               <div class="col-sm-12">
                  <div class="banner <?php echo $class;?>">
				
				  <?php $getnewprod1=$db->get_all_asso("SELECT `id`,`category_name`,`parent_id` FROM category WHERE parent_id=0  AND category_name !='' group by category_name  ORDER BY category_name ASC LIMIT 12");
				  
				  
				 
				  
				  ?>

				  <div class="cate_Wrpper classwer">
				  <?php

				  if (strpos($_SERVER['PHP_SELF'],'index.php')!== false) 
				  {
				  }
				  else
				  {?>
				   <a href="#" class="btn btn-primary btn-buying allcateg"> All Categories <i class="fa fa-angle-double-down"></i></a>
				    <div id="jsmenuwrap" class="innercat" style="display:none"> 
			
               <div class="dcjq-vertical-mega-menu" >
                  <ul id="mega-2" class="menu">
				  
                     
					 
					 <?php foreach($getnewprod1 as $tesrt1)
					 {
						 $getnewprod_sub1=$db->get_all_asso("select `id`,`category_name`,`parent_id` from category where parent_id=".$tesrt1['id']." AND category_name !='' ORDER BY category_name ASC LIMIT 6");
						 $encid=$com_obj->encid($tesrt1['id']);
						 $perma=strtolower(str_replace(" ", "-",  $tesrt1['category_name']));
						 ?>
					 <li id="menu-item-1" class="mainitemc">
                       <a href="<?echo $siteurl;?>/classifieds-categories-list/<?echo str_replace(' ','-',strtolower($tesrt1['category_name']));?>"><i class="fa fa-hand-o-right "></i> <?php echo $tesrt1['category_name'];?>
					   
					    <?php if(!empty($getnewprod_sub1))
						{
							echo '<i class="fa fa-angle-double-right "></i>';
						}
						else
						{
						}?>
					   
					   
					   </a>
						
						<?php if(!empty($getnewprod_sub1))
						{?>
						<div class="subsub">
                        <ul>
						<?php foreach($getnewprod_sub1 as $hyut1)
						 {
							 
							  $getnewprod_sub_sub1=$db->get_all_asso("select `id`,`cat_name` from sub_category where sub_cat_id=".$hyut1['id']." AND cat_name !='' ORDER BY cat_name ASC LIMIT 6");
							 ?>
                           <li id="menu-item-4">
                              <a href="<?echo $siteurl;?>/classifieds-categories-list/<?echo str_replace(' ','-',strtolower($hyut1['category_name']));?>"><h4><?php echo $hyut1['category_name'];?></h4></a>
                              <ul>
							  <?php foreach($getnewprod_sub_sub1 as $subsub1)
							{?>
							 
                                 <li id="menu-item-19"><a href="<?echo $siteurl;?>/classifieds-categories-list/<?echo str_replace(' ','-',strtolower($subsub1['cat_name']));?>"><?php echo $subsub1['cat_name'];?></a></li>
                                 
							<?php }?>
							<li id="menu-item-view">
							<?php echo "<a class='view-more-cats' href='$siteurl/category-details/$encid/$perma' class='btn btn-global'>View More</a>";?>
							</li>
                              </ul>
                           </li>
                           
						   	 <?php }?>
                        </ul>
					</div>
						<?php }?>
                     </li>
					 
					 
					 <?php }?>
					 
                     
                     <li>
                        <a href="<?echo $siteurl;?>/classifieds">View All Categories </a>
                     </li>
                  </ul>
               </div>
            </div>
				  <?php }?>
				  <a href="<?echo $siteurl;?>/add-buying-offer" class="btn btn-primary btn-buying"><i class="fa fa-link"></i> Post Buying Leads</a>
				  </div>
				  
                     <!-- banner-form -->
                     <div class="banner-form banner-form-full">
                        <form action="<? echo $siteurl; ?>/product-list" method="post">
							 
							     <input style="margin-left:20px;" type="text" class="form-control" name="MS_Key" placeholder="Enter Product Name" value="<? echo @$MS_Key ?>">
							 <lable class="om"><select style="display:none" class="dropdown form-control category-dropdown input-lg" name="MS_Categ" onChange="chkcat(this.value);">
									<option value="">Select Category</option>
									<?
									$categ = isset($categ)?$categ:'';
									echo $drop->get_dropdown($db,"select id,category_name from category where parent_id='0' and dis_status='1' group by category_name order by category_name asc",$categ);
									?>
							  </select></lable>
                              <lable class="om1"> <select style="display:none" class="dropdown form-control category-dropdown input-lg" name="MS_SCateg" id="MS_SCateg" onChange="chkcat1(this.value);">
									<option value="">Subcategory</option>
                                </select> </lable>							
							    <select class="dropdown form-control category-dropdown input-lg" name="MS_Country" style="display:none;">
									<option value="">Select Country</option>
									<?
									
									$MS_Country = isset($MS_Country)?$MS_Country:'';
									echo $drop->get_dropdown($db,"select id,nicename from countries where active_status='1' order by id",$MS_Country);
									?>
							  </select>							
							 
                       
						   <button type="submit" class="form-control" name="Main_Srch" value="Search"><span class="glyphicon glyphicon-search" style="color:white;"></span> Search</button>
                        </form>
                     </div>
                     <!-- banner-form -->	
                  </div>
               </div>
               <!-- banner -->
            </div>
            <!-- row -->	
            <!-- featureds -->
         </div>

<!--section---------Close-------Search------>