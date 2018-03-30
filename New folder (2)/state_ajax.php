<? include "admin/AMframe/config.php";
ob_start(); 
$val=isSet($val) ? $val : '' ;
$state = "<option value=''>Select</option>";
$DropDownQry = "SELECT state_id,state_name from states where country_id='$val' order by state_name asc";
$state .= $drop->get_dropdown($db,$DropDownQry,NULL);
?>
<select class="form-control" name="state" id="state" Onchange="return get_city(this.value);">
						<? echo $state;?>
                     </select><div id="stateError"></div>


