<?php  
//include "admin/AMframe/config.php";
include "admin/AMframe/config.php";
//include "./AMframe/config.php";

define('MERCHANT_KEY', 'hDkYGPQe');// testing detail
//define('MERCHANT_KEY', 'aLipYnVe'); //live detail

define('SALT', 'yIEkykqEH3'); // testing detail

//define('SALT', 'tdlAlc2anT');  // live detail 



define('PAYU_BASE_URL', 'https://test.payu.in');    //Testing url
//define('PAYU_BASE_URL', 'https://secure.payu.in');  //actual URL
define('SUCCESS_URL', 'http://newsite.com/Payumoney/success1.php');  //have complete url
define('FAIL_URL', 'http://newsite.com/Payumoney/failure1.php');    //add complete url 
//$BL_all = $db->get_all_asso("select * from buying_leads $filter order by id DESC LIMIT 20");
//print_r($BL_all);die();

$userid= $_SESSION['user'];
 $sql="select email,mobile from  register where id=". $_SESSION['user'];
 $sql = $db->get_all_asso("select * from register  where id=$userid");
 
 //print_r($sql);die();

        $tmparray=get_all_asso($sql);
        print_r($tmparray);
 $email = $_SESSION['pay_user']; die();
$mobile = $_SESSION['pay_plan_id'];
$firstName = 'Adam';
$lastName = 'Gill';
$totalCost = '10.00';


$productprice=$product_price;
$item_number=$_SESSION['pay_user'].'-'.$_SESSION['pay_plan_id'];
$return_url=$siteurl."/Payumoney/success1.php?tidd=$x_ordid";
$cancel=$siteurl."/Paymoney/failure1.php?tidd=$x_ordid";
$item_name = $_SESSION['pay_plan_name'];


$hash         = '';
//Below is the required format need to hash it and send it across payumoney page. UDF means User Define Fields.
//$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
$hash_string = MERCHANT_KEY."|".$txnid."|".$totalCost."|"."productinfo|".$firstName."|".$email."|||||||||||".SALT;
$hash = strtolower(hash('sha512', $hash_string));
$action = PAYU_BASE_URL . '/_payment'; 

?>
<form action="<?php echo $action; ?>" method="post" name="payuForm" id="payuForm" style="display: none">
    <input type="hidden" name="key" value="<?php echo MERCHANT_KEY ?>" />
    <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
    <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
    <input name="amount" type="number" value="<?php echo $totalCost; ?>" />
    <input type="text" name="firstname" id="firstname" value="<?php echo $firstName; ?>" />
    <input type="email" name="email" id="email" value="<?php echo $email; ?>" />
    <input type="text" name="phone" value="<?php echo $mobile; ?>" />
    <textarea name="productinfo"><?php echo "productinfo"; ?></textarea>
    <input type="text" name="surl" value="<?php echo SUCCESS_URL; ?>" />
    <input type="text" name="furl" value="<?php echo  FAIL_URL?>"/>
    <input type="text" name="service_provider" value="payu_paisa"/>
    <input type="text" name="lastname" id="lastname" value="<?php echo $lastName ?>" />
</form>
<script type="text/javascript">
    var payuForm = document.forms.payuForm;
    payuForm.submit();
</script>