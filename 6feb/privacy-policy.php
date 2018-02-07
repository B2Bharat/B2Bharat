<?
include "header.php";
?>

    <style>
      .fa{     font-size: 1.5em;}
      .slider input {    display: inline-block;    margin-bottom: 15px;}
    </style>
<?include "include/searchDiv.php";?>

    <div class="container-fulid pdt25" style="background-color:#f5f5f5;">
      <div class="container continr-bg">
        <section id="" class="clearfix contact-us" oncontextmenu="return false;" id="test" onmousedown='return false;' onselectstart='return false;'>
		<div class="corporate-info">
		    <div class="row">
			   <div class="col-md-12">
			       <div class="well">
			        <?$aboutus = $db->singlerec("select privacy from cms where id='1'");?>
					<?echo $aboutus[0];?>
			       </div>
			   </div>
			</div>			
	    </div>

	</section>
        
	  <!--include/buissList.php -->
      <!-- container -->
    </div>
	<style>  
	  .glyphicon {
	margin-right: 10px;
	}
  .section {
  background-color: #fff;
  border-radius: 4px;
  padding: 15px 25px;
  margin-bottom: 0px;
  }
  .adpost-details .agreement label {
  line-height: 28px;
  padding-top: 6px;
  color: #494949;
  margin-bottom: 0px; 
  }
    </style>
<?include "footer.php";?>  

<script>
     $(function() {
        $(this).bind("contextmenu", function(e) {
            e.preventDefault();
        });
    }); </script>