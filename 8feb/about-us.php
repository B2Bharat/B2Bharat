<?
    // Define variables for SEO
$tpTitle = 'About Us | B2Bharat.com - India Largest Online B2B Marketplace';
$pgDesc = 'B2Bharat.com is india largest B2B online marketplace,B2Bharat.com offer complete business solutions to the Indian customers through its better online services.';
$pgKeywords = 'About B2Bharat.com, online marketing hub for indian importers, exporters, manufacturers, sellers, buyers, service providers trade partners ,B2Bharat.com offers trade leads, trade offers,buying leads,selling lead to the customer';

include "header.php";
include "include/searchDiv.php";
?>
    <style>
      .fa{     font-size: 1.5em;}
      .slider input {    display: inline-block;    margin-bottom: 15px;}
    </style>

    <div class="container-fulid pdt25" style="background-color:#f5f5f5;">
      <div class="container continr-bg">
	  <h2 oncontextmenu="return false;" id="test" onmousedown='return false;' onselectstart='return false;' ><b>About us</b></h2>
        <div class="section about" oncontextmenu="return false;" id="test" onmousedown='return false;' onselectstart='return false;'>
			<?$aboutus = $db->singlerec("select aboutus from cms where id='1'");?>
			<?echo $aboutus[0];?>
		</div>
		</div>
		<br>
		
		
<?include "footer.php";?>   

				
			
			



	
