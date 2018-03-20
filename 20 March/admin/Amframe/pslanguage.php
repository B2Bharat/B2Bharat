<?
@session_start();
$lang=isset($_SESSION['LANGID'])?$_SESSION['LANGID']:'';
if($lang=="" || $lang==0){
	$PS_Crncy = "INR";
	$lang_title = "b2b";
	/* Toggle navigation */
	$lang_abooutus = "About Us";
	$lang_merchantaccount = "Merchant Account";
	$lang_tradeshows = "Trade Shows";
	$lang_successstory = "Success Story";
	$lang_help = "Help";
	/* header list */
	$lang_select = "Select";
	$lang_langu = "Language";
	$lang_ads= "Add Your Product";
	$lang_login= "Login";
	$lang_logout= "Logout";
	$lang_signin= "Sign In";
	$lang_reg="Register";
	/* menu list */
	$lang_home = "Home";
	$lang_clasi = "classifieds";
	$lang_prod= "Products";
	$lang_comp = "Companies";
	$lang_suppliers = "Seller";
	$lang_buyers = "Buyers";
	$lang_bl = "Buying Leads";
	$lang_sl = "Selling Leads";
	/*index*/
	$lang_latest = "LATEST"; 
	$lang_popular = "POPULAR";
	$lang_browse = "BROWSE";
	$lang_category = "CATEGORIES";
	$lang_more = "more";
	$lang_our_partners = "Our Partners";
	$lang_trade = "Trading";
	$lang_secure = "Secure";
	$lang_support = "Support";
	$lang_easy = "Easy";
	$lang_success = "SUCCESS";
	$lang_story = "STORY";
	/*footer*/
	$lang_quik = "Quick";
	$lang_links = "Links";
	$lang_top = "Top";
	$lang_follow = "Follow us on";
	$lang_newsletter = "Newsletter";
	$lang_contact = "Contact Us";
	$lang_careers = "Careers";
	$lang_allcities = "All Cities";
	$lang_advert = "Advertise With Us";
	$lang_fb = "Facebook";
	$lang_twt = "Twitter";
	$lang_google = "Google";
	$lang_youtube = "youtube";	
}
if($lang==1){
	$PS_Crncy = "$";
	$lang_title = "B2B سيناريو الذكية";
	/* Toggle navigation */
	$lang_abooutus = "معلومات عنا";
	$lang_merchantaccount = "حساب التاجر";
	$lang_tradeshows = "المعارض التجارية";
	$lang_successstory = "قصة نجاح";
	$lang_help = "مساعدة";
	/* header list */
	$lang_select = "اختار";
	$lang_langu = "لغة";
	$lang_ads= "أضف إعلانك";
	$lang_login= "تسجيل الدخول";
	$lang_logout= "خروج";
	$lang_signin= "تسجيل الدخول";
	$lang_reg="تسجيل";
	/* menu list */
	$lang_home = "الصفحة الرئيسية";
	$lang_clasi = "إعلانات مبوبة";
	$lang_prod= "المنتجات";
	$lang_comp = "الشركات";
	$lang_suppliers = "الموردين";
	$lang_buyers = "المشترين";
	$lang_bl = "طلبات الشراء";
	$lang_sl = "عروض البيع";
	/*index*/
	$lang_latest = "المرحومين"; 
	$lang_popular = "شعبي";
	$lang_browse = "تصفح";
	$lang_category = "الفئات";
	$lang_more = "أكثر";
	$lang_our_partners = "شركائنا";
	$lang_trade = "تجارة";
	$lang_secure = "آمنة";
	$lang_support = "الدعم";
	$lang_easy = "سهل";
	$lang_success = "نجاح";
	$lang_story = "قصة";
	/*footer*/
	$lang_quik = "كويك";
	$lang_links = "الروابط";
	$lang_top = "أعلى";
	$lang_follow = "اتبعنا";
	$lang_newsletter = "النشرة الإخبارية";
	/*footer*/
	$lang_quik = "كويك";
	$lang_links = "الروابط";
	$lang_top = "أعلى";
	$lang_follow = "اتبعنا";
	$lang_newsletter = "اتصل بنا";
	$lang_contact = "اتصل بنا";
	$lang_careers = "وظائف";
	$lang_allcities = "جميع المدن";
	$lang_advert = "أعلن معنا";
	$lang_fb = "فيس بوك";
	$lang_twt = "تغريد";
	$lang_google = "جوجل";
	$lang_youtube = "موقع YouTube";
}
?>