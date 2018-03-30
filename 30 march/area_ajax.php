<? include "admin/AMframe/config.php";
ob_start(); 
$val=isSet($val) ? $val : '' ;
$area = "<option value=''>Select</option>";
$DropDownQry = "SELECT 	area_auto_id,area_name from area where 	city_auto_id='$val' and active_status='1' order by area_name asc";
$area .= $drop->get_dropdown($db,$DropDownQry,NULL);
?>
<select class="form-control" name="=area" id="area" onchange="errort();">
						<? echo $area;?>
                     </select>
<div id="cityError"></div>
