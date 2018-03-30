<? include "admin/AMframe/config.php";
ob_start(); 
$val=isSet($val) ? $val : '' ;
$city = "<option value=''>Select</option>";
$DropDownQry = "SELECT city_auto_id,city_name from city where state_auto_id='$val' and active_status='1' order by city_name asc";
$city .= $drop->get_dropdown($db,$DropDownQry,NULL);
?>
<select class="form-control" name="city" id="city" onchange="errort();">
						<? echo $city;?>
                     </select>
<div id="cityError"></div>

