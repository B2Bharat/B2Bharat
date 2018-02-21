/* function BL_validate(){
    var ch1 = $("#ch1");
    var ch2 = $("#ch2");
    var ch3 = $("#ch3");
    var ch4 = $("#ch4");
    var ch5 = $("#ch5");
    var maincat = $("#maincat");
    var subcat = $("#subcat");
    var name = $("#BL_off_name");
    var ex_date = $("#BL_ex_date");
    var key1 = $("#BL_key1");
	var key2 = $("#BL_key2");
    var key3 = $("#BL_key3");
    var key4 = $("#BL_key4");
    var desc = $("#BL_desc");
    var subject = $("#BL_subject");
    var C_code = $("#BL_C_code");
    //var C_desc = $("#C_desc");
    var d_price = $("#d_price");
    var BL_buy_capacity = $("#BL_buy_capacity");
    var cc4 = $("#cc4");
	var hr1 = $("#hr1");
    var hr2 = $("#hr2");
    var hr3 = $("#hr3");
    var wr1 = $("#wr1");
    var wr2 = $("#wr2");
    var wr3 = $("#wr3");
    var cc1 = $("#cc1");
    var cc2 = $("#cc2");
    var cc3 = $("#cc3");
    var cc4 = $("#cc4");	
}
function SL_validate(){
}*/

function COM_validate(){
jQuery('input:invalid').css('border', '1px solid red');	
var inCount = parseInt(jQuery('input:invalid').length);
	if(inCount > 0){
		sweetAlert("Required!","Required(*) fields can't be empty!","error");
		return false;
	}else{
		return true;
	}
}

//validate buying leads
$("#btn-bl1").click(function(){
	var Err=0;
	
	if(isEmpty($("#maincat").val())){swal('Required!','Select main category!','error'); Err++;}
	else if(isEmpty($("#subcat").val())){swal('Required!','Select sub category!','error'); Err++;}
	
	if(Err===0){
		var $active = $('.wizard .nav-tabs li.active');
		$active.next().removeClass('disabled');
		nextTab($active);
	}
	
});

$("#btn-bl2").click(function(){
	var Err=0;
	
	if(!checkLength( $("#BL_off_name").val(),50) ){$("#BL_off_name").focus(); swal('Required!','Name should be 1 to 50 latters','error'); Err++;}
	else if(isEmpty( $("#BL_ex_date").val()) ){$("#BL_ex_date").focus(); swal('Required!','Date cannot be empty','error'); Err++;}
	else if(isEmpty( $("#BL_key1").val()) ){$("#BL_key1").focus(); swal('Required!','Keywords cannot be empty','error'); Err++;}
	//else if(isEmpty( $("#BL_key2").val()) ){$("#BL_key2").focus(); swal('Required!','Keywords cannot be empty','error'); Err++;}
	//else if(isEmpty( $("#BL_key3").val()) ){$("#BL_key3").focus(); swal('Required!','Keywords cannot be empty','error'); Err++;}
	//else if(isEmpty( $("#BL_key4").val()) ){$("#BL_key4").focus(); swal('Required!','Keywords cannot be empty','error'); Err++;}
	//else if(isEmpty( $("#BL_key4").val()) ){$("#BL_key5").focus(); swal('Required!','Keywords cannot be empty','error'); Err++;}
	else if(!$('#img_div').is(":visible")){swal('Required!','Product image1 is missing','error'); Err++;}
	else if(!$('#img_div2').is(":visible")){swal('Required!','Product image2 is missing','error'); Err++;}
	else if(!$('#img_div3').is(":visible")){swal('Required!','Product image3 is missing','error'); Err++;}
	else if(!$('#img_div4').is(":visible")){swal('Required!','Product image4 is missing','error'); Err++;}
	else if(!$('#img_div5').is(":visible")){swal('Required!','Product image5 is missing','error'); Err++;}
	else if(!checkLength( $("#BL_desc").val(),500) ){$("#BL_desc").focus(); swal('Required!','Description should be 1 to 500 latters','error'); Err++;}
	else if(!checkLength( $("#BL_subject").val(),50) ){$("#BL_desc").focus(); swal('Required!','Title/subjec should be 1 to 50 latters','error'); Err++;}
	
	if(Err===0){
		var $active = $('.wizard .nav-tabs li.active');
		$active.next().removeClass('disabled');
		nextTab($active);
	}
	
});

$("#btn-bl3").click(function(){
	var Err=0;
	
	//if(isEmpty( $("#BL_C_code").val()) ){$("#BL_C_code").focus(); swal('Required!','Select currency code','error'); Err++;}
	if(isEmpty($("#BL_d_price").val()) ){$("#BL_d_price").focus(); swal('Required!','Desired price cannot be empty!','error'); Err++;}
	else if(isEmpty($("#BL_quantity").val()) ){$("#BL_deli_duration").focus(); swal('Required!','Expected Duration of Delivery cannot be empty!','error'); Err++;}
	else if(isEmpty($("#BL_deli_duration").val()) ){$("#BL_deli_duration").focus(); swal('Required!','Expected Duration of Delivery cannot be empty!','error'); Err++;}	
	else if(isEmpty($("#BL_buy_capacity").val()) ){$("#BL_buy_capacity").focus(); swal('Required!','Maximum Buying Capacity cannot be empty!','error'); Err++;}
	else if(!ischeckedany("BL_shipping_terms")){swal('Required!','Accepted Delivery Terms should be selected!','error'); Err++;}
	//else if(!isselectedany("BL_shipping_terms")){swal('Required!','Payment Method cannot be empty!','error'); Err++;}
	
	
	
	if(Err===0){
		var $active = $('.wizard .nav-tabs li.active');
		$active.next().removeClass('disabled');
		nextTab($active);
	}

});

function btn_bl5(){
	var Err=0;
	
	if(isEmpty( $("#BL_buss_group").val()) ){$("#BL_buss_group").focus(); swal('Required!','Select business group','error'); Err++;}
	else if(!ischeckedany("ready_to_publish")){swal('Required!','Ready to Publish?','error'); Err++;}
	if(Err===0){return true;}else{return false;}
}

// selling leads validation

$("#btn-sl1").click(function(){
	var Err=0;
	
	if(isEmpty($("#maincat").val())){swal('Required!','Select main category!','error'); Err++;}
	else if(isEmpty($("#subcat").val())){swal('Required!','Select sub category!','error'); Err++;}
	
	if(Err===0){
		var $active = $('.wizard .nav-tabs li.active');
		$active.next().removeClass('disabled');
		nextTab($active);
	}
});

$("#btn-sl2").click(function(){
	var Err=0;
	
	if(!checkLength($("#SL_off_name").val(),50) ){$("#SL_off_name").focus(); swal('Required!','Offer name should be between 1 to 50 letters ','error'); Err++;}
	else if(isEmpty($("#SL_ex_date").val())){$("#SL_ex_date").focus(); swal('Required!','Date cannot be empty!','error'); Err++;}
	else if(isEmpty($("#SL_ex_date").val())){$("#SL_ex_date").focus(); swal('Required!','Date cannot be empty!','error'); Err++;}
	else if(isEmpty( $("#SL_key1").val()) ){$("#SL_key1").focus(); swal('Required!','Keywords cannot be empty','error'); Err++;}
	//else if(isEmpty( $("#SL_key2").val()) ){$("#SL_key2").focus(); swal('Required!','Keywords cannot be empty','error'); Err++;}
	//else if(isEmpty( $("#SL_key3").val()) ){$("#SL_key3").focus(); swal('Required!','Keywords cannot be empty','error'); Err++;}
	//else if(isEmpty( $("#SL_key4").val()) ){$("#SL_key4").focus(); swal('Required!','Keywords cannot be empty','error'); Err++;}
	//else if(isEmpty( $("#SL_key4").val()) ){$("#SL_key5").focus(); swal('Required!','Keywords cannot be empty','error'); Err++;}
	//else if(isEmpty( $("#SL_key4").val()) ){$("#SL_key5").focus(); swal('Required!','Keywords cannot be empty','error'); Err++;}
	else if(!$('#img_div').is(":visible")){swal('Required!','Product image1 is missing','error'); Err++;}
	else if(!$('#img_div2').is(":visible")){swal('Required!','Product image2 is missing','error'); Err++;}
	else if(!$('#img_div3').is(":visible")){swal('Required!','Product image3 is missing','error'); Err++;}
	else if(!$('#img_div4').is(":visible")){swal('Required!','Product image4 is missing','error'); Err++;}
	else if(!$('#img_div5').is(":visible")){swal('Required!','Product image5 is missing','error'); Err++;}
	else if(!checkLength($("#SL_bf_desc").val(),300) ){$("#SL_bf_desc").focus(); swal('Required!','Brief Description should be between 1 to 300 letters ','error'); Err++;}
	else if(!checkLength($("#SL_det_desc").val(),500) ){$("#SL_det_desc").focus(); swal('Required!','Detailed Description should be between 1 to 500 letters ','error'); Err++;}
	else if(!checkLength($("#SL_subject").val(),50) ){$("#SL_det_desc").focus(); swal('Required!','Title / subjec should be between 1 to 50 letters ','error'); Err++;}
	
	if(Err===0){
		var $active = $('.wizard .nav-tabs li.active');
		$active.next().removeClass('disabled');
		nextTab($active);
	}
});

$("#btn-sl3").click(function(){
	var Err=0;
	
	
	//if(isEmpty($("#SL_C_code").val())){$("#SL_C_code").focus(); swal('Required!','Select Currency Locale!','error'); Err++;}
	if(isEmpty($("#SL_base_price").val())){$("#SL_base_price").focus(); swal('Required!','Base Price cannot be empty!','error'); Err++;}
	else if(isEmpty($("#SL_max_price").val())){$("#SL_max_price").focus(); swal('Required!','Max Price cannot be empty!','error'); Err++;}
	else if(isEmpty($("#SL_quantity").val())){$("#SL_quantity").focus(); swal('Required!','Min orders Quantity cannot be empty!','error'); Err++;}
	else if(isEmpty($("#SL_size").val())){$("#SL_size").focus(); swal('Required!','Size cannot be empty!','error'); Err++;}
	else if(isEmpty($("#SL_deli_duration").val())){$("#SL_deli_duration").focus(); swal('Required!','Duration of Delivery cannot be empty!','error'); Err++;}
	else if(!ischeckedany("SL_shipping_terms")){swal('Required!','Accepted Delivery Terms should be selected!','error'); Err++;}
	
	if(Err===0){
		var $active = $('.wizard .nav-tabs li.active');
		$active.next().removeClass('disabled');
		nextTab($active);
	}
});

function btn_sl5(){
	var Err=0;
	
	if(isEmpty( $("#SL_other").val()) ){$(SL_other).focus(); swal('Required!','Select business group','error'); Err++;}
	else if(!ischeckedany("ready_to_publish")){swal('Required!','Ready to Publish?','error'); Err++;}
	else if(!ischeckedany("SL_negotiable")){swal('Required!','Is price negotiable?','error'); Err++;}
	
	if(Err===0){return true;}else{return false;}
	
	
}

//add product

$("#btn-p1").click(function(){
	var Err=0;

	if(isEmpty($("#maincat").val())){swal('Required!','Select main category!','error'); Err++;}
	else if(isEmpty($("#subcat").val())){swal('Required!','Select sub category!','error'); Err++;}
	
	if(Err===0){
		var $active = $('.wizard .nav-tabs li.active');
		$active.next().removeClass('disabled');
		nextTab($active);
	}
});


$("#btn-p2").click(function(){
	var Err=0;	
	var phone = $("#unit_price").val();
	var maxprice=$("#max_price").val();
	var currentunit=$("#size_val").val();
	var minorderq=$("input[name=ord_quan]").val();
	
	$date = Date.parse( $("#datepicker").val() );
	
	
 
	
	/* if(isEmpty($("#curren_unit").val())){$("#curren_unit").focus(); swal('Required!','Select Currency Locale!','error'); Err++;} */
	if(isEmpty($("#unit_price").val())){$("#unit_price").focus(); swal('Required!','Unit price cannot be empty!','error'); Err++;}
	else if(!phone.match(/^\d+$/)){$("#unit_price").focus(); swal('Required!','Unit price must be number!','error'); Err++;}
	else if(isEmpty($("#max_price").val())){$("#max_price").focus(); swal('Required!','Max price cannot be empty!','error'); Err++;}
	else if(!maxprice.match(/^\d+$/)){$("#max_price").focus(); swal('Required!','Max price must be number!','error'); Err++;}
	else if(!currentunit.match(/^\d+$/) && currentunit!=''){$("#size_val").focus(); swal('Required!','Current unit must be number!','error'); Err++;}
	else if(!minorderq.match(/^\d+$/) && minorderq!=''){$("#ord_quan").focus(); swal('Required!','Minimum order quantity  must be number!','error'); Err++;}
	else if(isNaN($date) == true && $("#datepicker").val()!=''){$("#datepicker").focus(); swal('Required!','Time to expire  must be date!','error'); Err++;}
	else if($("#datepicker").val().length<5){$("#datepicker").focus(); swal('Required!','Time to expire  must be date!','error'); Err++;}
	//else if(isEmpty($("#minb_price").val())){$("#minb_price").focus(); swal('Required!','minimum base price cannot be empty!','error'); Err++;}
	else if(!ischeckedany("nego")){swal('Required!','Is price negotiable?','error'); Err++;}
		
	if(Err===0){
		var $active = $('.wizard .nav-tabs li.active');
		$active.next().removeClass('disabled');
		nextTab($active);
	}
});


$("#btn-p3").click(function(){
	
	var Err=0;
	
	if($('#img_div').attr('src')==''){swal('Required!','Product image1 is missing','error'); Err++;}
	else if($('#img_div2').attr('src')==''){swal('Required!','Product image2 is missing','error'); Err++;}
	else if($('#img_div3').attr('src')==''){swal('Required!','Product image3 is missing','error'); Err++;}
	else if($('#img_div4').attr('src')==''){swal('Required!','Product image4 is missing','error'); Err++;}
	else if($('#img_div5').attr('src')==''){swal('Required!','Brochure image is missing','error'); Err++;}
	
	if(Err===0){
		var $active = $('.wizard .nav-tabs li.active');
		$active.next().removeClass('disabled');
		nextTab($active);
	}
});

$("#btn-p4").click(function(){
	var Err=0;
	
	if(!checkLength($("#prod_name").val(),40) ){$("#prod_name").focus(); swal('Required!','Product name should be between 1 to 40 letters ','error'); Err++;}
        else if(!checkLength($("#prod_group_name").val(),40) ){$("#prod_group_name").focus(); swal('Required!','Product Group name should be between 1 to 40 letters ','error'); Err++;}
	else if(isEmpty($("#prod_no").val())){$("#prod_no").focus(); swal('Required!','Product Number!','error'); Err++;}
        else if(isNaN($("#prod_no").val())){$("#prod_no").focus(); swal('Required!','Accepts digits upto 10','error'); Err++;}
	else if(!ischeckedany("publish")){swal('Required!','Ready To Publish?','error'); Err++;}
	else if(isEmpty($("#key1").val())){$("#key1").focus(); swal('Required!','All four fields are required!','error'); Err++;}
	else if(isEmpty($("#key2").val())){$("#key2").focus(); swal('Required!','All four fields are required!','error'); Err++;}
	else if(isEmpty($("#key3").val())){$("#key3").focus(); swal('Required!','All four fields are required!','error'); Err++;}
	else if(isEmpty($("#key4").val())){$("#key4").focus(); swal('Required!','All four fields are required!','error'); Err++;}
    
       else if(!checkLength($("#d_des").val(),6000) ){$("#d_des").focus(); swal('Required!','Detailed Description should be between 1 to 6000 letters ','error'); Err++;}
       
	
	
	
	
	
	if(Err===0){
		var $active = $('.wizard .nav-tabs li.active');
		$active.next().removeClass('disabled');
		nextTab($active);
	}
});

$("#btn-p5").click(function(){
	var Err=0;
	
	var cap=$("#max_capacity").val();
	if(isEmpty($("#max_capacity").val())){$("#max_capacity").focus(); swal('Required!','Enter maximum buying capacity!','error'); Err++;}
	else if(!cap.match(/^\d+$/)){$("#max_capacity").focus(); swal('Required!','Maximum supply capacity must be number!','error'); Err++;}
//	else if(isEmpty($("#sh_terms").val())){$("#sh_terms").focus(); swal('Required!','Shipping terms cannot be empty!','error'); Err++;}
	
	
	if(Err===0){
		var $active = $('.wizard .nav-tabs li.active');
		$active.next().removeClass('disabled');
		nextTab($active);
	}
});


//company manage validation

$("#btn-mc1").click(function(){

	var Err=0;
		
	if(!checkLength($("#com_name").val(),50)){$("#com_name").focus(); swal('Required!','Company name should be with in 1-60 letters!','error'); Err++;}
	else if(!checkLength($("#store_name").val(),60)){$("#store_name").focus(); swal('Required!','Store name should be with in 1-60 letters!','error'); Err++;}
	else if(!ischeckedany("COM_type")){swal('Required!','Select company type!','error'); Err++;}
	else if(isEmpty($("#country").val())){$("#country").focus(); swal('Required!','Select country!','error'); Err++;}
	else if(isEmpty($("#state").val())){$("#state").focus(); swal('Required!','State cannot be empty!','error'); Err++;}
	else if(isEmpty($("#city").val())){$("#city").focus(); swal('Required!','City cannot be empty!','error'); Err++;}
	else if($.isEmptyObject($("#buss_type").val())){swal('Required!','Business type cannot be empty!','error');  Err++;}
          else if($.isEmptyObject($("#zip_code").val())){swal('Required!','Post code cannot be empty!','error');  Err++;}
        else if($.isEmptyObject($("#COM_lowner").val())){swal('Required!','Add contact person cannot be empty!','error');  Err++;}
        else if(!checkLength($("#street").val(),110)){$("#street").focus(); swal('Required!','address should be with in 1-110 letters!','error'); Err++;}

	if(Err===0){
		var $active = $('.wizard .nav-tabs li.active');
		$active.next().removeClass('disabled');
		nextTab($active);
	}
});



$("#btn-mc2").click(function(){
	var Err=0;
		
	
    if (!checkLength($("#gst_no").val(), 60)) {
       $("#gst_no").focus();
       swal('Required!', 'GST No should be with in 60 characters!', 'error');
      Err++;
    } else if (!checkLength($("#pan_no").val(), 60)) {
        $("#pan_no").focus();
       swal('Required!', 'PAN No. should be with in 60 characters!', 'error');
        Err++;}
    else if (!checkLength($("#COM_intro").val(), 1000)) {
        $("#COM_intro").focus();
       swal('Required!', ' Company Brief Description should be with in 1000 characters!', 'error');
        Err++;}
    else if (!checkLength($("#company_policy").val(), 9000)) {
        $("#company_policy").focus();
       swal('Required!', ' Company Detailed Description should be with in 9000 characters!', 'error');
        Err++;}
     else if (!checkLength($("#prod_portfolio").val(), 2000)) {
        $("#prod_portfolio").focus();
       swal('Required!', 'Product Portfolio should be with in 2000 characters!', 'error');
        Err++;}
    
    
//    } else if (!checkLength($("#reg_no").val(), 60)) {
//        $("#reg_no").focus();
//        swal('Required!', 'Registration No. should be with in 60 characters!', 'error');
//        Err++;} 
//    else if (!checkLength($("#reg_auth").val(), 60)) {
//        $("#reg_auth").focus();
//        swal('Required!', 'Registration Auhority should be with in 60 characters!', 'error');
//        Err++;
//   } else if (!checkLength($("#cin_no").val(), 60)) {
//        $("#cin_no").focus();
//        swal('Required!', 'CIN No. should be with in 60 characters!', 'error');
//        Err++;
//    } else if (!checkLength($("#tan_no").val(), 60)) {
//        $("#tan_no").focus();
//      swal('Required!', 'TAN No should be with in 60 characters!', 'error');
//        Err++;
//    } else if (!checkLength($("#service_tax_no").val(), 60)) {
//        $("#service_tax_no").focus();
//        swal('Required!', 'Service Tax No. should be with in 60 characters!', 'error');
//        Err++;
//    } 
//    else if (!checkLength($("#excise_reg_no").val(), 60)) {
//        $("#excise_reg_no").focus();
//        swal('Required!', 'Excise Reg.No should be with in 60 characters!', 'error');
//        Err++;
//    } else if (!checkLength($("#vat_no").val(), 60)) {
//        $("#vat_no").focus();
//        swal('Required!', 'TIN/VAT No. should be with in 60 characters!', 'error');
//        Err++;
//    } else if (!checkLength($("#dgft_no").val(), 60)) {
//        $("#dgft_no").focus();
//        swal('Required!', 'DGFT/E No. should be with in 60 characters!', 'error');
//        Err++;
//    } else if (!checkLength($("#cst_no").val(), 60)) {
//        $("#cst_no").focus();
//        swal('Required!', 'CST No. should be with in 60 characters!', 'error');
//        Err++;
//    } else if (!checkLength($("#ssimsme_no").val(), 60)) {
//        $("#ssimsme_no").focus();
//        swal('Required!', 'SSI/MSME No. should be with in 60 characters!', 'error');
//        Err++;
//    } else if (!checkLength($("#epf_no").val(), 60)) {
//        $("#epf_no").focus();
//        swal('Required!', 'EPF No should be with in 60 characters!', 'error');
//        Err++;
//    } else if (!checkLength($("#esi_no").val(), 60)) {
//        $("#esi_no").focus();
//        swal('Required!', 'ESI No. should be with in 60 characters!', 'error');
//        Err++;
//    } else if (!checkLength($("#sct_no").val(), 60)) {
//        $("#sct_no").focus();
//        swal('Required!', 'SCT No. should be with in 60 characters!', 'error');
//        Err++;
//    } else if (!checkLength($("#dnb_no").val(), 60)) {
//        $("#dnb_no").focus();
//        swal('Required!', 'DNB No.should be with in 60 characters!', 'error');
//        Err++;
//    } else if (!checkLength($("#rbi_no").val(), 60)) {
//        $("#rbi_no").focus();
//        swal('Required!', 'RBI No. should be with in 60 characters!', 'error');
//        Err++;
//    } else if (!checkLength($("#fssai_liscene_no").val(), 60)) {
//        $("#fssai_liscene_no").focus();
//        swal('Required!', 'FSSAI-LISCENE No should be with in 60 characters!', 'error');
//        Err++;
//    } else if (!checkLength($("#nsic_no").val(), 60)) {
//        $("#nsic_no").focus();
//        swal('Required!', 'NSIC No. should be with in 60 characters!', 'error');
//        Err++;
//    }
    
    //else if (!checkLength($("#sst_no").val(), 60)) {
      //  $("#sst_no").focus();
      //  swal('Required!', 'SST No. should be with in 60 characters!', 'error');
       // Err++;
   // }
//    else if (isEmpty($("#off_size").val())) {
//        $("#off_size").focus();
//        swal('Required!', 'Select office size!', 'error');
//        Err++;}
   //}
   // else if (isEmpty($("#start_yr").val())) {
//        $("#start_yr").focus();
//        swal('Required!', 'Company start date missing!', 'error');
//        Err++;
//    } else if (!checkLength($("#policy").val(), 2000)) {
//        $("#policy").focus();
//        swal('Required!', 'Company policy should be with in 2000 letters!', 'error');
//        Err++;
//    } else if (isEmpty($("#terms").val())) {
//        $("#terms").focus();
//        swal('Required!', 'Company terms cannot be empty!', 'error');
//        Err++;
//    }


	
	if(Err===0){
		var $active = $('.wizard .nav-tabs li.active');
		$active.next().removeClass('disabled');
		nextTab($active);
	}
});


$("#btn-mc3").click(function(){
	var Err=0;
		
	if(!checkLength($("#main_product").val(),60)){$("#main_product").focus(); swal('Required!','Main product 1 should be with in 1-60 letters!','error'); Err++;}
        else if (!checkLength($("#main_product2").val(), 60)) {
        $("#main_product2").focus();
       swal('Required!', 'Main product 2 should be with in 1-60 letters', 'error');
        Err++;}
     else if (!checkLength($("#main_product3").val(), 60)) {
        $("#main_product3").focus();
       swal('Required!', 'Main product 3 should be with in 1-60 letters', 'error');
        Err++;}
     else if (!checkLength($("#main_product4").val(), 60)) {
        $("#main_product4").focus();
       swal('Required!', 'Main product 4 should be with in 1-60 letters', 'error');
        Err++;}
    else if(isEmpty($("#avg_lead_time").val())){$("#avg_lead_time").focus(); swal('Required!','Average lead time missing!','error'); Err++;}
	//else if(isEmpty($("#plimit").val())){$("#plimit").focus(); swal('Required!','Production limit missing!','error'); Err++;}
	//else if(isEmpty($("#flocation").val())){$("#flocation").focus(); swal('Required!','Factory location missing!','error'); Err++;}
	//else if($.isEmptyObject($("#compliance").val())){swal('Required!','Select compliance maintaining!','error'); Err++;}
	//else if(isEmpty($("#percentage").val())){$("#percentage").focus(); swal('Required!','Select Export Percentage!','error'); Err++;}
	//else if(!ischeckedany("COM_acpt_order")){swal('Required!','Select accept order yes/no!','error'); Err++;}
	//else if(!ischeckedany("COM_trade_show")){swal('Required!','Select planned to attend tradeshow yes/no!','error'); Err++;}
	
	if(Err===0){
		var $active = $('.wizard .nav-tabs li.active');
		$active.next().removeClass('disabled');
		nextTab($active);
	}
});


$("#btn-mc4").click(function(){
	var Err=0;
	
	var select_check=$("input[name='COM_ap_currency[]']:checked");
	//var select_check1=$("input[name='COM_ad_terms[]']:checked");
	 //var select_check2=$("input[name='COM_pay_method[]']:checked");
	
	var select_check3=$("input[name='COM_language[]']:checked");
	//var select_check4=$("input[name='COM_certificate[]']:checked");
        
	//if(isEmpty($("#an_sales").val())){$("#an_sales").focus(); swal('Required!','Select Annual Sales Volume!','error'); Err++;}
	
    if(select_check.length==0){
	swal('Required!','Select Accepted Payment Currency!','error'); Err++;
	}
	
    //else if(select_check1.length==0){
	//swal('Required!','Select Accepted Delivery Terms!','error'); Err++;
	//}
	
   // else if(select_check2.length==0){
	//swal('Required!','Select Payment Method!','error'); Err++;
	//}
	
    else if(select_check3.length==0){
	swal('Required!','Select Spoken Language!','error'); Err++;
	}
	
    //else if(select_check4.length==0){
	//swal('Required!','Select Company Certification!','error'); Err++;
	//}
	
	
	
	if(Err===0){
		var $active = $('.wizard .nav-tabs li.active');
		$active.next().removeClass('disabled');
		nextTab($active);
	}
	
});



function btn_mc5(){
	var Err=0;
	
	if(isEmpty( $("#buss_group").val()) ){$("#buss_group").focus(); swal('Required!','Select Your Group !','error'); Err++;}
        else if(isEmpty($("#com_cat1").val())){$("#com_cat1").focus(); swal('Required!','company category cannot be empty!','error'); Err++;}
	//else if($.isEmptyObject($("#com_cat").val())){ swal('Required!','Select company category!','error'); Err++;}
	//else if(!checkLength( $("#cat_title").val(),50) ){$("#cat_title").focus(); swal('Required!','Company category title should be with in 1 to 50 letters!','error'); Err++;}
	//else if(!$('#img_div1').is(":visible")){swal('Required!','Company logo is missing','error'); Err++;}
	//else if(!$('#img_div2').is(":visible")){swal('Required!','Company avatar is missing','error'); Err++;}
	//else if(!$('#img_div3').is(":visible")){swal('Required!','Company banner is missing','error'); Err++;}
	
	if(Err===0){return true;}else{return false;}
	
	return false;
	
}

// add tradeshow start
function btn_trd_show(){
	var Err=0;	
	if(!checkLength( $("#show_name").val(),50) ){$("#show_name").focus(); swal('Required!','Name should be with in 1 to 50 letters!','error'); Err++;}
	else if(!checkLength( $("#brief_title").val(),100) ){$("#brief_title").focus(); swal('Required!','Brief title should be with in 1 to 100 letters!','error'); Err++;}
	else if(!checkLength( $("#brief_title").val(),100) ){$("#brief_title").focus(); swal('Required!','Brief title should be with in 1 to 100 letters!','error'); Err++;}
	else if(isEmpty( $("#event_startsd").val()) ){$("#event_startsd").focus(); swal('Required!','Event start date cannot be empty!','error'); Err++;}
	else if(isEmpty( $("#event_startst").val()) ){$("#event_startst").focus(); swal('Required!','Event start time cannot be empty!','error'); Err++;}
	else if(isEmpty( $("#event_endsd").val()) ){$("#event_endsd").focus(); swal('Required!','Event end date cannot be empty!','error'); Err++;}
	else if(isEmpty( $("#event_endst").val()) ){$("#event_endst").focus(); swal('Required!','Event end time cannot be empty!','error'); Err++;}
	else if(isEmpty( $("#street").val()) ){$("#street").focus(); swal('Required!','street cannot be empty!','error'); Err++;}
	else if(isEmpty( $("#state").val()) ){$("#state").focus(); swal('Required!','state cannot be empty!','error'); Err++;}
	else if(isEmpty( $("#city").val()) ){$("#city").focus(); swal('Required!','city cannot be empty!','error'); Err++;}	
	else if(isEmpty( $("#postal_code").val()) ){$("#postal_code").focus(); swal('Required!','postal code cannot be empty!','error'); Err++;}	
	else if(isEmpty( $("#organized_by").val())){$("#organized_by").focus(); swal('Required!','organized by missing!','error'); Err++;}	
	else if(!$('#img_div1').is(":visible")){swal('Required!','Logo is missing','error'); Err++;}
	else if(isEmpty($("#phone").val())){$("#phone").focus(); swal('Required!','Phone number is missing!','error'); Err++;}	
	else if(isEmpty( $("#brief_address").val()) ){$("#brief_address").focus(); swal('Required!','brief address cannot be empty!','error'); Err++;}	
	else if(isEmpty( $("#venue").val()) ){$("#venue").focus(); swal('Required!','venue cannot be empty!','error'); Err++;}	
	else if(!$('#img_div2').is(":visible")){swal('Required!','Photo show is missing','error'); Err++;}
	else if(isEmpty($("#exhibition_floor").val())){$("#exhibition_floor").focus(); swal('Required!','Exhibition Floor cannot be empty!','error'); Err++;}	
	else if(isEmpty($("#total_size").val())){$("#total_size").focus(); swal('Required!','Total Size cannot be empty!','error'); Err++;}	
	else if(isEmpty($("#industry_focus").val())){$("#industry_focus").focus(); swal('Required!','Industry Focus cannot be empty!','error'); Err++;}	
	else if(isEmpty($("#product_focus").val())){$("#product_focus").focus(); swal('Required!','product focus cannot be empty!','error'); Err++;}	
	else if(isEmpty($("#theme_of_show").val())){$("#theme_of_show").focus(); swal('Required!','Theme of show is missing!','error'); Err++;}	
	else if(isEmpty($("#general_information").val())){$("#general_information").focus(); swal('Required!','general information is missing!','error'); Err++;}	
	
	if(Err===0){return true;}else{return false;}
	
}

$('#addproct').keypress(function(event){

    if ((event.keyCode == 10) || (event.keyCode == 13))
	{		
       event.preventDefault();
		return false;
	
	}

  });




function nextTab(elem) {
	//alert(elem);
	
			$(elem).next().find('a[data-toggle="tab"]').click();
		}
function prevTab(elem) {
			$(elem).prev().find('a[data-toggle="tab"]').click();
		}
 
 
//register validation

/* $("#btn-reg").click(function(){
	var Err=0;
		
	
	if(isEmpty($("#pack").val())){$("#pack").focus(); swal('Required!','Select membership pack!','error'); Err++;}
	else if(isEmpty($("#fname").val())){$("#fname").focus(); swal('Required!','first name missing','error'); Err++;}
	else if(isEmpty($("#lname").val())){$("#lname").focus(); swal('Required!','last name missing','error'); Err++;}
	

	if(Err===0){
		var $active = $('.wizard .nav-tabs li.active');
		$active.next().removeClass('disabled');
		nextTab($active);
	}
});

$("#btn-reg1").click(function(){
	var Err=0;
		
	
	if(!isEmail($("#email").val())){$("#email").focus(); swal('Required!','invalid email! email should be like example@xyz.com!','error'); Err++;}
	else if(isEmpty($("#pass").val())){$("#pass").focus(); swal('Required!','password missing','error'); Err++;}
	
	else if(($("#pass").val().length<5)){$("#pass").focus(); swal('Too short!','password should be at least 6 letters!','error'); Err++;}
	
	else if(isEmpty($("#cpass").val())){$("#cpass").focus(); swal('Required!','re-enter password missing','error'); Err++;}
	else if($("#pass").val()!=$("#cpass").val()){$("#cpass").focus(); swal('Required!','re-enter password missmatch','error'); Err++;}
	else if($("#pass").val()!=$("#cpass").val()){$("#cpass").focus(); swal('Required!','re-enter password missmatch','error'); Err++;}
	

	if(Err===0){
		var $active = $('.wizard .nav-tabs li.active');
		$active.next().removeClass('disabled');
		nextTab($active);
	}
});


$("#btn-reg2").click(function(){
	var Err=0;
		
	if(isEmpty($("#mobile").val())){$("#mobile").focus(); swal('Required!','mobile number missing!','error'); Err++;}
	else if(isEmpty($("#addr").val())){$("#addr").focus(); swal('Required!','Address missing!','error'); Err++;}
	else if(isEmpty($("#postal").val())){$("#postal").focus(); swal('Required!','postal code missing!','error'); Err++;}
	else if(isEmpty($("#country").val())){$("#country").focus(); swal('Required!','select country!','error'); Err++;}
	else if(isEmpty($("#country").val())){$("#country").focus(); swal('Required!','select country!','error'); Err++;}
	else if(isEmpty($("#state").val())){$("#state").focus(); swal('Required!','state is missing!','error'); Err++;}
	else if(isEmpty($("#city").val())){$("#city").focus(); swal('Required!','city is missing!','error'); Err++;}
	
	if(Err===0){
		var $active = $('.wizard .nav-tabs li.active');
		$active.next().removeClass('disabled');
		nextTab($active);
	}
});
 
function btn_reg3(){
	var Err=0;
	if(isEmpty($("#cpt").val())){$("#cpt").focus(); swal('Required!','Enter captcha!','error'); Err++;}
	
	if(Err===0){return true;}else{return false;}
}  */