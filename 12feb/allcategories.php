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
$sql="select category_name,id,cat_img from category where parent_id='0' and id=$rprid order by id desc";
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
<div style="margin-left: 35%;">
   <a class="" href="<?echo $siteurl."/classifieds-categories-list/$maincat/$sbcatnam1"?>">
     <h5>        <?  $imgpath= "admin/uploads/category/$tmpimag";
							    if(file_exists($imgpath)){
								    if($tmpimag!="") {echo "<img src='/$imgpath' class='' >";}
									else {echo "<img src='/admin/uploads/category/noimage.jpg' class='mr10 zm-in' >";}
								}else{
									echo "<img src='/admin/uploads/category/noimage.jpg' class='mr10 zm-in' >";
								}
								
							?>						</h5>

<h4><p><?php echo $_GET['$catname']; ?></p></h4>
</div>
<section>
    


 <div class="panel-body pr_wrap">
           
      
                                                            

    <?php
    $i=1;
   
    
  
    foreach ($subcatg_main as $mctot_oi) {
            $sbcatnam1_oi = strtolower(str_replace(' ', '-', $mctot_oi['cat_name']));
            
            $sburl = $siteurl."/classifieds-categories-list/$maincat/$sbcatnam1_oi;";
     ?>
   
        <div style="width:20%;float:left; border: solid black 1px; margin: 1%">
   <p style="text-align: center;"><a href="<?php  echo $sburl  ?>"><?php echo  $sbcatnam1_oi; ?></a></p>
    <?php 
    
        $image = strtolower(str_replace(' ', '-', $mctot_oi['cat_img']));

       

    
    
    
        $imgpath = "admin/uploads/category/$image";
        if (file_exists($imgpath)) {
            if ($image != "") {
                echo "<img src='/$imgpath' class='' >";
            } else {
                echo "<img src='/admin/uploads/category/noimage.jpg' class='mr10 zm-in' >";
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