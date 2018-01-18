<ol><ul><? $latnews=$db->get_all("select * from news order by id desc limit 3");
        
	for($i=0;$i<count($latnews);$i++){
	  @extract($latnews[$i]);
	  $newsid=$latnews[$i]['id'];
	  $newsname=$latnews[$i]['page_name'];
           $newdesc=$latnews[$i]['description'];
           $uid=$latnews[$i]['user_id'];
	  ?>
          <li style="min-height: 35px;"><a href="news-details.php?id=<? echo $newsid; ?>"><? if(strlen($uid)>50)echo ucwords(substr($uid,0,50)); else echo ucwords($uid);?></a></li>
          <li style="min-height: 35px; text-decoration: underline;"><a href="news-details.php?id=<? echo $newsid; ?>"><? if(strlen($newsname)>50)echo ucwords(substr($newsname,0,50)); else echo ucwords($newsname);?></a></li>
             <li style="min-height: 35px; "><a href="news-details.php?id=<? echo $newsid; ?>"><? if(strlen($newdesc)>50)echo ucwords(substr($newdesc,0,50)); else echo ucwords($newdesc);?></a></li><br /><br />
	  <?
	}
?>
</ol>
 