<?
$tpTitle = 'Register in B2Bharat.com to Buy and Sell across Indian Country.';
$pgDesc = 'Join B2Bharat.com to find Indian Buyers and suppliers in one Place,where you can Sell and Buy your product ,so Donot Be Busy Do Business Easy in B2Bharat.com';
$pgKeywords = 'Register in B2Bharat, Join us B2Bharat.com, online marketing hub for indian importers, exporters, manufacturers, sellers, buyers, service providers trade partners ,B2Bharat.com offers trade leads.';

include "header.php";
include "include/searchDiv.php";

$mempacks = $db->get_all_asso("select * from membership where active_status='1'");


?>
 

    <div class="container-fulid pdt25" style="background-color:#f5f5f5;">
      <div class="container continr-bg">
        
        <div class="col-sm-9 col-md-12">
          <div class="adpost-details">
            <div class="well">
              <div class="section slider">
			  
			    <div class="row">
				    <div class="table-responsive">
					     <table class="table table-striped brdr" style="width:100%">
						    <tbody>
							    <tr>
								    <td style="width:16.67%" class="my_planHeader my_plan1">
									 <div class="my_planTitle">									    
									   Information
									  </div>
									</td>
									<?foreach($mempacks as $mpack){?>
									<td style="width:16.67%" class="my_planHeader my_plan1">
									  <div class="my_planTitle">
									    <input type="radio" name="membership" value="free"> 
									    <?echo ucfirst($mpack['name']);?>
									  </div>
										<div class="my_planPrice"><?echo "<span style='color:#fffff;'>".$mpack['base_price_afdis']."</span> / <strike style='color:red'>".$mpack['max_price']."</strike> $PS_Crncy";?></div>
									</td>
									<?}?>
									
								</tr>
								<tr class="my_planFeature">
								   <td>Valid For</td>
								   <?foreach($mempacks as $mpack){?>
								   <td class="plan-detail"><?echo ((int)$mpack['package_renewal']===0)?"Never expire":$mpack['package_renewal'].' Days';?></td>
								   <?}?>
								</tr>
								
								<tr class="my_planFeature">
								   <td>No.of Product can post</td>
								   <?foreach($mempacks as $mpack){?>
								   <td class="plan-detail"><?echo ((int)$mpack['max_no_products']===0)?"Unlimited":$mpack['max_no_products'];?></td>
								   <?}?>
								</tr>
								
								<tr class="my_planFeature">
								   <td>No.of Selling leads</td>
								   <?foreach($mempacks as $mpack){?>
								   <td class="plan-detail"><?echo ((int)$mpack['max_no_selling']===0)?"Unlimited":$mpack['max_no_selling'];?></td>
								   <?}?>
								</tr>
								
								<tr class="my_planFeature">
								   <td>No.of Buying Leads</td>
								   <?foreach($mempacks as $mpack){?>
								   <td class="plan-detail"><?echo ((int)$mpack['max_no_buying']===0)?"Unlimited":$mpack['max_no_buying'];?></td>
								   <?}?>
								</tr>
								
								<tr class="my_planFeature">
								   <td>Display Company Profile</td>
								   <?foreach($mempacks as $mpack){?>
								   <td class="plan-detail"><i class="<?echo ($mpack['dis_profile']=='yes')?'fa fa-check-circle yes':'fa fa-times-circle no';?>"></i></td>
								   <?}?>
								</tr>
								
								<tr class="my_planFeature">
								   <td>Send / Receive message</td>
								   <?foreach($mempacks as $mpack){?>
								   <td class="plan-detail"><i class="<?echo ($mpack['send_receive']=='yes')?'fa fa-check-circle yes':'fa fa-times-circle no';?>"></i></td>
								   <?}?>
								</tr>
								
								<tr class="my_planFeature">
								   <td>Appear on Product showcase</td>
								   <?foreach($mempacks as $mpack){?>
								   <td class="plan-detail"><i class="<?echo ($mpack['product_show_gallery']=='yes')?'fa fa-check-circle yes':'fa fa-times-circle no';?>"></i></td>
								   <?}?>
								</tr>
								
								<tr class="my_planFeature">
								   <td>Publishing trade shows</td>
								   <?foreach($mempacks as $mpack){?>
								   <td class="plan-detail"><i class="<?echo ($mpack['pub_tradeshow']=='yes')?'fa fa-check-circle yes':'fa fa-times-circle no';?>"></i></td>
								   <?}?>
								</tr>
								
								<tr class="my_planFeature">
								   <td>Priority listing</td>
								   <?foreach($mempacks as $mpack){?>
								   <td class="plan-detail"><i class="<?echo ($mpack['priority_listing']=='yes')?'fa fa-check-circle yes':'fa fa-times-circle no';?>"></i></td>
								   <?}?>
								</tr>
								
								<tr class="my_planFeature text-center">
								   <td></td>
								<?foreach($mempacks as $mpack){?>   
								   <td class="plan-detail">
								      <a href="<?echo $siteurl;?>/register-field?plan=<?echo $com_obj->encid($mpack['id']);?>" type="button" class="btn view-more-btn-3">Select</a>
								   </td>
								<?}?>  
								</tr>
							</tbody>
						 </table>
						 <!-- <div class="text-center col-md-12">
						     <a href="#" type="button" class="btn view-more-btn-3">Upgrade</a>
						 </div> -->
					</div>
				</div>
			  
			  
			    
            </div>
          </div>
        </div>
        
      </div>
	  
	  <!-- include/buissList.php -->
	  
      <!-- container -->
    </div>
<?include "footer.php";?>    