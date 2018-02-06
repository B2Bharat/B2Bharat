<!--<ol><ul><? $latnews=$db->get_all("select * from news order by id desc limit 3");
        
	for($i=0;$i<count($latnews);$i++){
	  @extract($latnews[$i]);
	  $newsid=$latnews[$i]['id'];
	  $newsname=$latnews[$i]['page_name'];
           $newdesc=$latnews[$i]['description'];
           $uid=$latnews[$i]['user_id'];
	  ?>
         
<li style="min-height: 35px; text-decoration: underline;"><a href="news-details.php?id=<? echo $newsid; ?>"><? if(strlen($newsname)>50)echo ucwords
                (substr($newsname,0,50)); else echo ucwords($newsname);?></a></li>
             <li style="min-height: 35px; "><a href="news-details.php?id=<? echo $newsid; ?>">
                     <? if(strlen($newdesc)>50)echo ucwords(substr($newdesc,0,50)); else echo ucwords($newdesc);?></a></li><br /><br />
	  <?
	}
?>
</ol>-->
 


<div class="block block-story success_pad">
		<div class="panel panel-default">
                    
          <div id="cbp-qtrotator" class="cbp-qtrotator">
            <div class="cbp-qtcontent cbp-qtcurrent" style="transition: opacity 700ms ease;">
			
			
        <?$latnews=$db->get_all("select * from news order by id desc limit 3");
	for($i=0;$i<count($latnews);$i++){
	  @extract($latnews[$i]);
	  $newsid=$latnews[$i]['id'];
	  $newsname=$latnews[$i]['page_name'];
           $newdesc=$latnews[$i]['description'];
           $uid=$latnews[$i]['user_id'];
	  ?>

        <div class="desc"><h5><a href="news-details.php" title=""><? if(strlen($newsname)>50)echo ucwords
                (substr($newsname,0,50)); else echo ucwords($newsname);?></a></h5>
                                                                       
                
                 
                 
                  <span><a href="news-details.php" title=""><?if(strlen($newdesc)>50)echo ucwords
                (substr($newdesc,0,50)); else echo ucwords($newdesc);?></h5></div>
                        
			  </div>
            
             
			 <? } ?>
                                                
			

			
<!--                 <div class="text-center"> <a href="<?echo $siteurl;?>/news-list" class="btn btn-global">More News <i class="fa fa-arrow-right"></i></a> </div>-->
            </div>
            <hr>
            <span class="cbp-qtprogress" style="transition: width 9000ms linear; width: 100%;"></span></div>
        </div