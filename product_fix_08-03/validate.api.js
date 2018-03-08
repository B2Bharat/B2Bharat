$(document).ready(function(){
	//$( document ).tooltip();
	$('.password').keyup(function() {
    $('#note').html(checkStrength($('.password').val())); });

});

function checkStrength(password) {
	var strength = 0;
	if (password.length < 6) {
	$('#note').removeClass();
	$('#note').addClass('short');
	return '&nbsp;&nbsp;too short&nbsp;&nbsp;';
	}

	if (password.length > 7) {strength += 1;}
	// If password contains both lower and uppercase characters, increase strength value.
	if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {strength += 1;}
	// If it has numbers and characters, increase strength value.
	if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) {strength += 1;}
	// If it has one special character, increase strength value.
	if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {strength += 1;}
	// If it has two special characters, increase strength value.
	if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) {strength += 1;}
	// Calculated strength value, we can return messages
	// If value is less than 2
	if (strength < 3) {
	$('#note').removeClass();
	$('#note').addClass('weak');
	return '&nbsp;&nbsp;weak&nbsp;&nbsp;';
	} else if (strength == 3) {
	$('#note').removeClass();
	$('#note').addClass('good');
	return '&nbsp;&nbsp;good&nbsp;&nbsp;';
	} else {
	$('#note').removeClass();
	$('#note').addClass('strong');
	return '&nbsp;&nbsp;strong&nbsp;&nbsp;';
	}
}

//validate functions

function isEmpty(val){ //compulsury
	if(val.length === 0 || val=="undefiend"){return true;}else{return false;}    
}
function checkLength(val,size){ //compulsury
//	if(val.length <= size && val.length !== 0){return true;}else{return false;}
return true;
}

function ischeckedany(name){
	if($('input[name='+name+']:checked').length<=0){return false;}else{return true;}
}
function isselectedany(name){
	if($('input[name^='+name+']:selected').length<=0){return false;}else{return true;}
}


function isTextOnly(val){ //text with white sapces
	if(val.match(/^[a-zA-Z ]*$/)){return true;}else{return false;} 
}

function isText(val){ // text should be includes
	if ((val.match(/^[a-z ]*$/) || val.match(/^[A-Z ]*$/) || val.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/))) {
		return true;
		}
	else{
		return false;
		}	
}

function isEmail(val){ // email
	if (val.match(/^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/)) {
		return true;
		}
	else{
	return false;
		}	
}

function isUrl(val){ // email
	if (val.match(/(http|ftp|https):\/\/[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/)) {
		return true;
		}
	else{
		return false;
		}	
}

function isPassword(arg) {
	var strength = 0;

	if (arg.length >= 6) {strength +=1 ;} else{return false;}
	// If password contains both lower and uppercase characters, increase strength value.
	if (arg.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {strength +=1;}
	// If it has numbers and characters, increase strength value.
	if (arg.match(/([0-9])/)) {strength +=1;}
	// If it has one special character, increase strength value.
	if (arg.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {strength +=1;}
	// If it has two special characters, increase strength value.
	if (arg.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) {strength += 1;}

	if(strength > 1){return true;}else{return false;}

}

function isChecked(obj){
	if(obj.is(':checked')){return true;}
	else{return	false;}			
}

function isSelected(obj){
	if(obj.val()!= 'select'){return true;}
	else{return	false;}			
}