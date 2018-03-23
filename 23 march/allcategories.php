<?
include "header.php";
include "include/searchDiv.php";
$srch = isset($srch)?$srch:'';
$filter="";
if($srch){ $filter .="where category_title like '%$srch%'"; }
$BL_all = $db->get_all_asso("select * from buying_leads $filter order by id DESC LIMIT 20");
$GetRecordimg=$db->singlerec("select * from manage_ad where id='1'");
$home_left = $GetRecordimg['home_left'];
$home_bottom1 = $GetRecordimg['home_bottom1'];
$home_bottom2 = $GetRecordimg['home_bottom2'];

include "pagination.php";
$rowsPerPage=$Prod_RecPerPage;
$limit=limitation($Prod_RecPerPage);
$rprid = isset($arid)?$com_obj->decid(addslashes($arid)):'';
$sql="select category_name,id,cat_img from category where parent_id='0' and id=$rprid order by id asc";
$dd=$_GET['arid'];

$subcatg_main=$db->get_all_asso("select * from sub_category where sub_cat_id='$dd' order by cat_name asc ");
//print_r($subcatg_main);
 //print_r($subcatg_main);
$sbcatnam1=$_GET['$catname'];
//print_r($_GET);die;

$subcatg_main1=$db->get_all_asso("select * from category where id='$dd' ");
$tmpimag=$subcatg_main1[0]['cat_img'];
 $maincat= $_SESSION['selected_category'];

?>
<section >

<div style="margin-left: 35%;text-align; font-weight: bold;">
   <a  class=""  href="<?echo $siteurl.'/classifieds-categories-list/$maincat/$sbcatnam1'?>">
     <h5 class="center"> <?  $imgpath= "admin/uploads/category/$tmpimag";
					  if(file_exists($imgpath)){
					   if($tmpimag!="") {echo "<img src='/$imgpath' class='' >";}
						else {echo "<img src='/admin/uploads/category/noimage.jpg' class='mr10 zm-in' style='margin-left:66px;' >";}
						}else{
	 echo "<img src='/admin/uploads/category/noimage.jpg' class='mr10 zm-in' style='margin-left: 66px;'  >";
					}
								
				?>						</h5>

      <h2 style="text-align; font-weight: bold;margin-left: 40px;"><p><?php echo ucwords($_GET['$catname']); ?></p></h2>
</div>
    


 <div class="panel-body pr_wrap" style="margin-left:119px;  ">
           
      
                                                            

    <?php
    $i=1;
   
    
  
    foreach ($subcatg_main as $mctot_oi) {
         $sbcatnam1_oi = ucwords($mctot_oi['cat_name']);
            
            $sburl = $siteurl."/classifieds-categories-list/$maincat/$sbcatnam1_oi;";
     ?>
   
        <div class="cat"  style="width:25%;float:left;  border: 1px solid thistle ;" >
    <p style="text-align; font-weight: bold;"><a style="font-weight: bold; margin-left: 63px;" href="<?php  echo $sburl  ?>"><?php echo $sbcatnam1_oi; ?></a></p>
    <?php 
    
        $image = strtolower(str_replace(' ', '-', $mctot_oi['cat_img']));

        $imgpath = "admin/uploads/category/$image";
        if (file_exists($imgpath)) {
            if ($image != "") {
                echo "<div style=''height:140px; width:140px;'><img src='/$imgpath' class='' width='200' height='200' style='height:120px; width:120px; margin-left: 73px; '></div>";
            } else {
                echo "<img src='/admin/uploads/category/noimage.jpg' style='height:120px; width:120px;' class='mr10 zm-in' >";
            }
        } else {
            echo "<img src='/admin/uploads/category/noimage.jpg' class='mr10 zm-in' >";
           
        }
         echo ' <p></p></div>';
		 
		 $i++;
    }
    
  
    ?>
          
</div>

     
</section>
<?include "footer.php";?>