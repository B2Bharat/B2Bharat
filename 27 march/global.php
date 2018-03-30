<?
//Array For active and non active 
$GT_timings=array("","Quaterly","Halfyearly","Annual","weekly","Two Months once","Monthly Once","Custom");
//Array For active and non active 
$GT_acc_type=array("","Savings","Current");
//Array For active and non active 
$GT_act=array("","Activestatus","Deactivestatus");

//Array For Gender
$GT_Gender=array("","Male","Female");
//Array For Gender
$Sky_WorkStatus=array("","Completed","Pending","Follow Up","Document Pending","Client Not Response");

//Array For Userlevel
$GT_Userlevel=array("","1","2","3","4","5","6","7","8","9");

//Array For Payment Method
$GT_Pay_Mthd=array("","Cash","Cheque","Online Transfer");

//Array For Cheque Status
$GT_Chq_Status=array("","On Hold","Presented","Passed","Returned");

//Array For Database Status
$SKY_Status=array("","Active","Inactive");

//Array For Package type
$SKY_Pckg=array("","Free","Basic","Silver","Gold","Platinum");

//Array For st
$SKY_St=array("","Yes","No");

//Array For payment
$SKY_regfess=array("","Paid","Not Paid");

//Array For payment
$SKY_Paymode=array("","Cash","Cheque","NEFT","Card");

//Array For payment
$SKY_Trastyp=array("","Paid","Free");

//Array For Numerical and Alphabetic List
$AM_Num_Alph_List=array("","0","1","2","3","4","5","6","7","8","9","A","B","C","D","E","F", "G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");

//Array For Account Category
$SKY_Acc=array("","Staff","Client");

//Array For month
$ZION_Month=array("","1","2","3","4","5","6","7","8","9","10","11","12");

//Array For year
$ZION_Year=array("","2014","2015","2016","2017","2018","2019","2020","2021","2022","2023","2024","2025","2026","2027","2028","2029","2030","2031","2032","2033","2034","2035","2036","2037","2038","2039","2040","2041","2042","2043","2044","2045","2046","2047","2048","2049","2050","2051","2052","2053","2054","2055","2056","2057","2058","2059","2060");

//Array For Yes / No
$SKY_YN=array("","Yes","No");

//Array For photo id
$SKY_Ph=array("","Enclosed","Verified");

//Array For SKY_Tyre
$SKY_Tyre=array("","Good","Bad","Average");

//Array For photo id
$SKY_Ph=array("","Enclosed","Verified");

//Array For tyre
$SKY_Custype=array("","Dealer","Individual");

//Array For battery
$SKY_Battery=array("","Working","Non Working");

//Array For Plot Status
$GT_Plot_St=array("Available","Booked");

//Array For zone
$SKY_Zone=array("","Normal","Warning","Blocked");


//Array For zone
$SKY_Work_St=array("","Not Fix","Fixed");


//Array For zone
$SKY_Salutaion=array("","Mr","Mrs","Ms","Dr");

//Array For zone
$PSM_Marital_St=array("","Single","Married","Divorced","Widowed");

//Array For zone
$PSM_Addr=array("","Home","Office","Others");

//Array For zone
$PSM_Relation=array("","Parent","Spouse","Child","In law","Sibling","Friend");

//Array For zone
$PSM_Days=array("","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday");

//Array For Time
$PSM_Time=array("Open 24 Hours","00:00","00:30","01:00","01:30","02:00","02:30","03:00","03:30","04:00","04:30","05:00","05:30","06:00","06:30","07:00","07:30","08:00","08:30","09:00","09:30","10:00","10:30","11:00","11:30","12:00","12:30","13:00","13:30","14:00","14:30","15:00","15:30","16:00","16:30","17:00","17:30","18:00","18:30","19:00","19:30","20:00","20:30","21:00","21:30","22:00","22:30","23:00","23:30","Closed");

//Array for Payment mode
 $PSM_Paymode=array("","Cash","Master Card","Visa Card","Debit Cards","Money Orders","Cheques","Credit Card","Travelers Cheque","Financing Available","American Express Card","Diners Club Card");
  
//alphabetical order 
$PSM_Alphabet=array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
 
 //Array For label 
$PS_Label=array("","For Individual Applicant","For Corporate Introducer Applicant","Charges Information","For Individual","For Corporate");

 //Array For Introducer
$PS_Introducer=array("","Introducer","Referral","Associate","Senior Associate");

 //Array For Approve 1
$PS_Approv1=array("","Approved","Reject");

//Array For Approve 2
$PS_Approv2=array("","Approved","Pre-Approved","Reject");

//Array For department
$PS_Dept=array("","Clerk","HOD");

//Array For Branchs for ID
$PS_Branch=array("","MYS","MYM");

//Array For Day
$PS_DayCal=array("","Daily","Weekly","Monthly");

//Array For Day
$PS_Paymode=array("","E-Wallet","Manual");

//Array For store support
$PS_StorSupport=array("","Not support (default)","Support through comments");
$PS_StorSupkey=array("","Not support","through comments");

//Array For Day
$PS_ResponseTime=array("","1 business day","7 business day","10 business day");

//Array For Notification action
$PS_NotifyAct=array("","Like","Comment","Follow","Cart","Sale");

//Array For Membership
$PS_Membership=array("free"=>array("exclusive","non-exclusive"),"membership"=>array("silver","gold","platinum"));

//Array 
$PS_buylead_category=array("","Business Service","Distributor");

//Array Status
$PS_St=array("","Approval","Pending");

//Array Sale Qty
$PS_Qty=array("","10","15","20","30","40","50","60","70","80","90","100","above 100");

$PS_enq_res = array("Account","Affiliate question","Billing","Copyright complaint","License question","Password help","Report a bug","Shop owner questions","Technical question","Other");

$PSH_Terms=array("FOB","CIF","CNF","CAT","Others");

$PS_Negot=array("Yes","No");
//Array User Type
$PS_UserType=array("","Seller","Buyer","Service","Both");  
//Array business group in BL (buying leads)

$buss_group = array("1"=>"Allow all members (including free members) to contact me.",
					"2"=>"Only PRO members (only premium members) may contact me.",
					"3"=>"Allow all contact only through your Inquiry Service.");
										
$Related_items = array("1"=>"product1","2"=>"product2","3"=>"product3");
					   
//Array Type or status
$PS_Type=array("New","Used","Refurbished","Stocklot","In Stock");  
//Array payment method
$PS_paymentmethod=array("","T/T","L/C","D/A","D/P","Western Union","Money Gram","PayPal","Cash/Cheque","Other");  

//Array payment method newly created
$paymenttype =array("T/T","L/C","D/A","D/P","Western Union","Money Gram","PayPal","Cash/Cheque","Other");

//Array Shipping Terms
$PS_shipping=array("","FOB","CIF","CNF","CAT","Others");  
//Array Iam a
$PS_Im=array("Buyer","Seller","Both");
//Array Office Size
//$PS_office=array("210 to 300 meter,500  to 1000 Sq. Ft.");
//Array  total employes
$PS_totemp=array("0 to 5","5 to 10","10 to 50","50 to 100","100 to 200","200 to 500","500 to 1000","More than 1000");
//Array Annual Revenue
$PS_annrevenue=array("Up to Rs.50 Lakh","Rs.50 Lakh – 1 Crore","Rs. 1 – 2 Crore","Rs. 2 – 5 Crore","Rs. 5 – 10 Crore","Rs.10 – 20 Crore","Rs. 20 – 50 Crore","Rs. 50 – 100 Crore","Rs. 100 – 500 Crore","Rs. 500 – 1000 Crore","More than Rs. 1000 Crore");
$Comp_offc_Size=array("100 to 500 Sq. Ft","500  to 1000 Sq. Ft.","1000  to 5000 Sq. Ft.","5000 to 10000 Sq. Ft.","More Than 10000 Sq. Ft.");

//Array Main Export Markets
$PS_exportmarket=array(",","North America","Eastern Europe","Africa","Middle East","Eastern Asia","Northern Europe","South Asia","Oceania");  
//Array Compliance
$PS_compliance=array("Regularity compliances","Safety and security","CSR (Corporate Social Responsibility)","Registrar of Companies","New Companies Act.","Contract Labor (Regulation and Abolition) Act","Environment (Protection) Act.");
//Array Export Percentage
$PS_percentage=array("1","2","3","4","5","6","7","8","9","10");
//Array Annual Sales Volume
$PS_annsales=array("","Below US$ 1 Million","US$ 1 Million to US$ 2Million");
//Array Accepted Payment Currency
$PS_paycurrency=array("","JPY","USD","EUR","CAD","AUD","HKD","GBP","CNY","INR");
//Array Accepted Delivery Terms
$PS_delivery=array("","CFR","CIF","EXW","FAS","CIP","FCA","CPT","DEQ","DDP","DAF","DDU","Express Delivery","Others");
//Array Spoken Language
$PS_spoken=array("","Hindi","English","Urdu","Panjabi","Bengali","gujarati","marathi","Kannad","Telugu","Tamil","Malayalam","Germen","Russian","Spanish","French","Chinese","Japenese","Korean","Portuaguese","Arabic","Dutch","Italian","Polish","Parsian","Thai");
//Array Company Certification
$PS_certificate=array("HACCP","ISO 9001:2000","QS-9000","ISO 14001:2004","ISO/TS 16949","SA8000","ISO 17799","OHSAS 18001","TL 9000","CMM","IEEE","ANSI","Other Certification");
//Array Language
$PS_Lang=array("English ","Arabic Oman");
//Array State TIN Number
$PS_TIN=array("AN"=> 35,"AP"=> 28,"AD"=> 37,"AR"=> 12,"AS"=> 18,"BH"=> 10,"CH"=> 04,"CT"=> 22,"DN"=> 26,"DD"=> 25,"DL"=> 07,"GA"=> 30,"GJ"=> 24,"HR"=> 06,"HP"=> 02,"JK"=> 01,"JH"=> 20,"KA"=> 29,"KL"=> 32,"LD"=> 31,"MP"=> 23,"MH"=> 27,"MN"=> 14,"ME"=> 17,"MI"=> 15,"NL"=> 13,"OR"=> 21,"PY"=> 34,"PB"=> 03,"RJ"=> 08,"SK"=> 11,"TN"=> 33,"TS"=> 36,"TR"=> 16,"UP"=> 09,"UT"=> 05,"WB"=> 19);


//Enquiry form

$enq_supplier_location=array("Local","Anywhere India","Outide India");

$enq_Requirement_urgency=array("Immidiate","After one month");

$enq_Requirement_frequency=array("one time","Regular");
$currency_value=array("INR","USD");
$enq_Requirement_purchase=array("Reselling","End Use","Raw Material");



//add buying offer and selling offer

$pref_supplier_location=array("Local","Anywhere India","Outide India");
$Requirement_urgency=array("Immidiate","After one month");
$Requirement_frequency=array("one time","Regular");
$Requirement_purpose=array("Reselling","End Use","Raw Material");



$GT_RecPerPage = 25;
$GT_Apnt_No = 1;
$percentage_single_post = 250;
$PSMaster1 = 2;
$PSMaster2 = 1;
$PSMaster3 = 3;
$PSMaster4 = 4;
$fixPercentage = 10;
$Prod_RecPerPage = 15;
?>  