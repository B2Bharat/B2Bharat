<?php include "header.php";
include "include/searchDiv.php";
include "include/useronly.php";
$uinfo = $db->singlerec("select * from register where id='$user_id'");
$acn = isset($acn)?$acn:'';
$msg="";
if($acn=='addsuc'){
$msg="<h4 style='color:limegreen'>Successfully Added..!!!</h4>";
}else if($acn=='upd'){
$nid = isset($nid)?$com_obj->decid(addslashes($nid)):'0';
$_SESSION['n_id'] = $nid;
$news_info = $db->singlerec("select * from news where id ='$nid'");
}else{
$_SESSION['n_id'] = '';	
}
include "news-update.php";
?>
<link rel="stylesheet" href="assets/css/jquery-ui.min.css" />
    <div class="container-fulid pdt25" style="background-color:#f5f5f5;">
      <div class="container continr-bg">
        <?php include "include/profile-left.php";?> 
        <div class="col-sm-9 col-md-9">
          <div class="adpost-details">
            <div class="well">
			<center><?echo $msg;?></center>
              <div class="section">
                    
                    <form role="form" action="" method="POST" enctype="multipart/form-data" onsubmit="return addnews_valid();">
                          <h4>General Information</h4>
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Page Name <span class="required">*</span></label>
                            <div class="col-sm-9">
                              <input type="text" name="page_name" class="form-control" id="page_name" placeholder="" value="<?echo isset($news_info['page_name'])?$news_info['page_name']:'';?>">
                            </div>
                          </div>
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Date </label>
                            <div class="col-sm-9">
                              <div class="input-group input-group-sm">
										<input type="text" name="crcdt" id="datepicker" class="form-control" value="<?echo isset($news_info['crcdt'])?$news_info['crcdt']:'';?>" style="font-size: 14px;height: 40px;"/>
										<span class="input-group-addon">
											<i class="ace-icon fa fa-calendar"></i>
										</span>
								    </div>							  
							  <!--<input type="date" name="crcdt" class="form-control" id="crcdt" placeholder="" value="<?echo isset($news_info['crcdt'])?$news_info['crcdt']:'';?>">-->
                            </div>
                          </div>
						  
						  
                          <div class="row form-group model-name">
                            <label class="col-sm-3 label-title">Select Group <span class="required">*</span></label>
                            <div class="col-sm-9">
							<?php 
						     $group_id = isset($news_info['group_id'])?$news_info['group_id']:'';?>
                               <select class="form-control" name="group_id" id="group_id">
							  <option value="">Select</option>
								<?php echo $drop->get_dropdown($db,"select id,group_name from allgroups where status='1' AND type='news'",$group_id);?>
                              </select>
                            </div>
                          </div>
						  
						  
						  <div class="row form-group model-name">
                            <label class="col-sm-3 label-title">Select Category <span class="required">*</span></label>
                            <div class="col-sm-9">
                              <?php 
						     $category_id = isset($news_info['category_id'])?$news_info['category_id']:'';?>
                               <select class="form-control" name="category_id" id="subcat">
							  <option value="">Select</option>
								<?php echo $drop->get_dropdown($db,"select id,category_name from allcategory where  	active_status='1' AND type='news'",$category_id);?>
                              </select>
                            </div>
                          </div>

						  <div class="row form-group add-image">
                            <label class="col-sm-3 label-title">Upload Thumbnail picture</label>
                            <div class="col-sm-9">
							<div class="col-xs-6">
                               <div class="upload-section">
                                <label class="upload-image" for="upload-image-one" style="width:40%">
									<input type="file" id="upload-image-one" name="image" accept="image/*" onchange="img_validate('upload-image-one',300,300,1,1,'img_div')"/>
                                </label>										
                              </div>
							  <p>Image size should be less than 1MB and Image type should be JPEG,PNG,GIF,BMP or ICO</p>
							  </div>
							<div class="col-xs-6 row">							  
							  <?$image = isset($news_info['image'])?$news_info['image']:'';?>
							      <img src="uploads/news/<?echo $image;?>" id="img_div" width="100" height="80" <?if($image==''){?>style='display:none;'<?}?>>
							</div>
                            </div>
                          </div>
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Content <span class="required">*</span></label>
                            <div class="col-sm-9">
                              <textarea name="description" id="description" class="form-control" rows="5"><?echo isset($news_info['description'])?$news_info['description']:'';?>
							  </textarea>
                            </div>
                          </div>
						  
						  <!--<h4>Meta Information</h4>
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Meta Title </label>
                            <div class="col-sm-9">
                              <input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="" value="<?echo isset($news_info['meta_title'])?$news_info['meta_title']:'';?>">
                            </div>
                          </div>
						  
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Meta Keywords </label>
                            <div class="col-sm-9">
                              <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" placeholder="" value="<?echo isset($news_info['meta_keywords'])?$news_info['meta_keywords']:'';?>">
                            </div>
                          </div>
						  
						  <div class="row form-group add-title">
                            <label class="col-sm-3 label-title">Meta Description </label>
                            <div class="col-sm-9">
                              <textarea name="meta_description" id="meta_description" class="form-control" rows="5"><?echo isset($news_info['meta_description'])?$news_info['meta_description']:'';?></textarea>
                            </div>
                          </div>-->
						  
						  
						  
						  <div class="row form-group text-center add-title">
							<input type="hidden" name="newssubmit" value="newssubmit">
                            <input type="submit" name="submit" class="btn btn-primary next-step" value="Save">
                          </div>
						  
                        <div class="clearfix"></div>
                    </form>
              </div>
            </div>
          </div>
        </div>
		
		<!-- include/buissList.php -->
		
      </div>
      <!-- container -->
    </div>

	<script>
	  $(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

        var $target = $(e.target);
    
        if ($target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        $active.next().removeClass('disabled');
        nextTab($active);

    });
    $(".prev-step").click(function (e) {

        var $active = $('.wizard .nav-tabs li.active');
        prevTab($active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}
	  </script>
    <style>
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
	<script src="assets/js/jquery-2.1.4.min.js"></script>
<script src="assets/js/jquery-ui.min.js"></script>
<script src="assets/js/jquery.ui.touch-punch.min.js"></script>

<script type="text/javascript">
			jQuery(function($) {
			
				$( "#datepicker" ).datepicker({
					showOtherMonths: true,
					selectOtherMonths: false,
					//isRTL:true,
			
					
					/*
					changeMonth: true,
					changeYear: true,
					
					showButtonPanel: true,
					beforeShow: function() {
						//change button colors
						var datepicker = $(this).datepicker( "widget" );
						setTimeout(function(){
							var buttons = datepicker.find('.ui-datepicker-buttonpane')
							.find('button');
							buttons.eq(0).addClass('btn btn-xs');
							buttons.eq(1).addClass('btn btn-xs btn-success');
							buttons.wrapInner('<span class="bigger-110" />');
						}, 0);
					}
			*/
				});
			
			
				//override dialog's title function to allow for HTML titles
				$.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
					_title: function(title) {
						var $title = this.options.title || '&nbsp;'
						if( ("title_html" in this.options) && this.options.title_html == true )
							title.html($title);
						else title.text($title);
					}
				}));
			
				$( "#id-btn-dialog1" ).on('click', function(e) {
					e.preventDefault();
			
					var dialog = $( "#dialog-message" ).removeClass('hide').dialog({
						modal: true,
						title: "<div class='widget-header widget-header-small'><h4 class='smaller'><i class='ace-icon fa fa-check'></i> jQuery UI Dialog</h4></div>",
						title_html: true,
						buttons: [ 
							{
								text: "Cancel",
								"class" : "btn btn-minier",
								click: function() {
									$( this ).dialog( "close" ); 
								} 
							},
							{
								text: "OK",
								"class" : "btn btn-primary btn-minier",
								click: function() {
									$( this ).dialog( "close" ); 
								} 
							}
						]
					});
			
					/**
					dialog.data( "uiDialog" )._title = function(title) {
						title.html( this.options.title );
					};
					**/
				});
			
			
				$( "#id-btn-dialog2" ).on('click', function(e) {
					e.preventDefault();
				
					$( "#dialog-confirm" ).removeClass('hide').dialog({
						resizable: false,
						width: '320',
						modal: true,
						title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Empty the recycle bin?</h4></div>",
						title_html: true,
						buttons: [
							{
								html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; Delete all items",
								"class" : "btn btn-danger btn-minier",
								click: function() {
									$( this ).dialog( "close" );
								}
							}
							,
							{
								html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Cancel",
								"class" : "btn btn-minier",
								click: function() {
									$( this ).dialog( "close" );
								}
							}
						]
					});
				});
			
			
				
				//autocomplete
				 var availableTags = [
					"ActionScript",
					"AppleScript",
					"Asp",
					"BASIC",
					"C",
					"C++",
					"Clojure",
					"COBOL",
					"ColdFusion",
					"Erlang",
					"Fortran",
					"Groovy",
					"Haskell",
					"Java",
					"JavaScript",
					"Lisp",
					"Perl",
					"PHP",
					"Python",
					"Ruby",
					"Scala",
					"Scheme"
				];
				$( "#tags" ).autocomplete({
					source: availableTags
				});
			
				//custom autocomplete (category selection)
				$.widget( "custom.catcomplete", $.ui.autocomplete, {
					_create: function() {
						this._super();
						this.widget().menu( "option", "items", "> :not(.ui-autocomplete-category)" );
					},
					_renderMenu: function( ul, items ) {
						var that = this,
						currentCategory = "";
						$.each( items, function( index, item ) {
							var li;
							if ( item.category != currentCategory ) {
								ul.append( "<li class='ui-autocomplete-category'>" + item.category + "</li>" );
								currentCategory = item.category;
							}
							li = that._renderItemData( ul, item );
								if ( item.category ) {
								li.attr( "aria-label", item.category + " : " + item.label );
							}
						});
					}
				});
				
				 var data = [
					{ label: "anders", category: "" },
					{ label: "andreas", category: "" },
					{ label: "antal", category: "" },
					{ label: "annhhx10", category: "Products" },
					{ label: "annk K12", category: "Products" },
					{ label: "annttop C13", category: "Products" },
					{ label: "anders andersson", category: "People" },
					{ label: "andreas andersson", category: "People" },
					{ label: "andreas johnson", category: "People" }
				];
				$( "#search" ).catcomplete({
					delay: 0,
					source: data
				});
				
				
				//tooltips
				$( "#show-option" ).tooltip({
					show: {
						effect: "slideDown",
						delay: 250
					}
				});
			
				$( "#hide-option" ).tooltip({
					hide: {
						effect: "explode",
						delay: 250
					}
				});
			
				$( "#open-event" ).tooltip({
					show: null,
					position: {
						my: "left top",
						at: "left bottom"
					},
					open: function( event, ui ) {
						ui.tooltip.animate({ top: ui.tooltip.position().top + 10 }, "fast" );
					}
				});
			
			
				//Menu
				$( "#menu" ).menu();
			
			
				//spinner
				var spinner = $( "#spinner" ).spinner({
					create: function( event, ui ) {
						//add custom classes and icons
						$(this)
						.next().addClass('btn btn-success').html('<i class="ace-icon fa fa-plus"></i>')
						.next().addClass('btn btn-danger').html('<i class="ace-icon fa fa-minus"></i>')
						
						//larger buttons on touch devices
						if('touchstart' in document.documentElement) 
							$(this).closest('.ui-spinner').addClass('ui-spinner-touch');
					}
				});
			
				//slider example
				$( "#slider" ).slider({
					range: true,
					min: 0,
					max: 500,
					values: [ 75, 300 ]
				});
			
			
			
				//jquery accordion
				$( "#accordion" ).accordion({
					collapsible: true ,
					heightStyle: "content",
					animate: 250,
					header: ".accordion-header"
				}).sortable({
					axis: "y",
					handle: ".accordion-header",
					stop: function( event, ui ) {
						// IE doesn't register the blur when sorting
						// so trigger focusout handlers to remove .ui-state-focus
						ui.item.children( ".accordion-header" ).triggerHandler( "focusout" );
					}
				});
				//jquery tabs
				$( "#tabs" ).tabs();
				
				
				//progressbar
				$( "#progressbar" ).progressbar({
					value: 37,
					create: function( event, ui ) {
						$(this).addClass('progress progress-striped active')
							   .children(0).addClass('progress-bar progress-bar-success');
					}
				});
			
				
				//selectmenu
				 $( "#number" ).css('width', '200px')
				.selectmenu({ position: { my : "left bottom", at: "left top" } })
					
			});
		</script>	
<?php include "footer.php";?>
<script>
function addnews_valid(){
	var Err=0;	
	if(!checkLength( $("#page_name").val(),50) ){$("#page_name").focus(); swal('Required!','Name should be with in 1 to 50 latters!','error'); Err++;}
	else if(isEmpty( $("#group_id").val()) ){$("#group_id").focus(); swal('Required!','Group cannot be empty!','error'); Err++;}
	else if(isEmpty( $("#subcat").val()) ){$("#subcat").focus(); swal('Required!','Category cannot be empty!','error'); Err++;}
	else if(isEmpty( $("#description").val()) ){$("#description").focus(); swal('Required!','Description cannot be empty!','error'); Err++;}
		
	if(Err===0){return true;}else{return false;}
	
}
</script>