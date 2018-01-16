<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<style type="text/css">
    ul{
        padding: 0;
        list-style: none;
        background: #f2f2f2;
    }
    ul li{
        display: inline-block;
        position: relative;
        line-height: 21px;
        text-align: left;
    }
    ul li a{
        display: block;
        padding: 8px 25px;
        color: #333;
        text-decoration: none;
    }
    ul li a:hover{
        color: #fff;
        background: #939393;

    }
    ul li ul.dropdown{
        min-width: 100%;
        min-height: 50% /* Set width of the dropdown */

        background: #f2f2f2;
        display: none;
        position: absolute;
        z-index: 999;
        left: 0;
    }
    ul li:hover ul.dropdown{
        display: block;
         /* Display the dropdown */
    }
    ul li ul.dropdown li{
        display: block;
    }
</style>
</head>
<body>



<!-- <?
 $productInfo = $db->singlerec("select prod_name from product ");
 if($productInfo['prod_name']=="")
 {
 	$productInfo['prod_name']="No Company name";
       }
    
    ?>-->
    
    
<?

$userInfo = $db->singlerec("select * from register where id = '$userid'");
$memInfo = $db->singlerec("select * from membership where id = '".$userInfo['mem_pack']."'");
$isComthere = $memInfo['dis_profile'];
if($isComthere=='yes'){
?>

<?$ctinfo = $db->singlerec("select * from company where user_id = '$userid'");

if(file_exists("uploads/company/logo/".$ctinfo['logo'])){
$logourl =  "$siteurl/uploads/company/logo/".$ctinfo['logo'];	
}else{
$logourl =  "$siteurl/uploads/company/logo/noimage.jpg";
}
if($ctinfo['name']=="")
{
	$ctinfo['name']="No Company name";
}

?>

<div class="ad-profile section">	
	<div class="user-profile">
		<div class="user-images">
			<img src="<?echo $logourl;?>" width=100 height=100 alt="User Images" class="img-responsive">
		</div>
		<div class="user">
			<h2><?echo ucfirst($ctinfo['name']);?> <!-- <a href="#"></a> --></h2>
			<h3><?echo ucfirst($ctinfo['city']);?></h3>
		</div>
		<div class="favorites-user">
			 
			 <?
			 $mem_id = $db->singlerec("select mem_pack from register where id='$userid'");
			 $mempack = $db->singlerec("select name from membership where id='".$mem_id[0]."'");
			 ?>
			 
			<div class="my-ads">
				<a href="#"><img src="<?echo $siteurl;?>/assets/images/<?echo $com_obj->setBadge($mem_id[0]);?>"><small><?echo ucwords($mempack[0]);?></small><small>Since  <?echo date('M-Y',strtotime($ctinfo['create_date']));?></small></a>
			</div>
			<div class="favorites">
				<a href="#"><i class="fa green-icon fa-check-square-o" aria-hidden="true"></i><small>Verified</small></a>
			</div>
		</div>								
	</div><!-- user-profile -->
	<ul class="user-menu">
		<li><a href="<?echo $siteurl;?>/company-detail/<?echo strtolower(str_replace(' ','-',$ctinfo['name']));?>/<?echo $com_obj->encid($ctinfo['id']);?>">Home Page</a></li>

		<li><a href="<?echo $siteurl;?>/company-profile/<?echo strtolower(str_replace(' ','-',$ctinfo['name']));?>/<?echo $com_obj->encid($ctinfo['id']);?>">Company Profile</a></li>

		<li><a href="<?echo $siteurl;?>/product-list/<?echo strtolower(str_replace(' ','-',$ctinfo['name']));?>/<?echo $com_obj->encid($ctinfo['user_id']);?>">Product List</a>
               
<!--                <ul style="background-color: red;" class="dropdown">
                <li><a href="#">paint</a></li>
                  <li><a href="#">Bitumen Paint</a></li>
                <li><a href="#">Black Bituminous Paint</a></li>
                <li><a href="#">Structural Fabrication</a></li> 
            </ul>-->
		</li>
		<li><a href="<?echo $siteurl;?>/selling-leads-list/<?echo strtolower(str_replace(' ','-',$ctinfo['name']));?>/<?echo $com_obj->encid($ctinfo['user_id']);?>">Selling Offers</a></li>
		<li><a href="<?echo $siteurl;?>/buying-leads-list/<?echo strtolower(str_replace(' ','-',$ctinfo['name']));?>/<?echo $com_obj->encid($ctinfo['user_id']);?>">Buying Offers</a></li>
		<!--<li><a href="#">Send Inquiry</a></li>-->
		<li><a href="<?echo $siteurl;?>/company-profile/<?echo strtolower(str_replace(' ','-',$ctinfo['name']));?>/<?echo $com_obj->encid($ctinfo['id']);?>">Contact Us</a></li>
	</ul>			
</div>
<?}else{?>
<!--<hr/>
<center><h2>Free User</h2></center>
<hr/>-->
<?}?>

</body>
</html>