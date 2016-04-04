<?php 
if (empty($parts[2])){ 
	$parts[2]="main";
}

$get_idrazd=mysql_result(mysql_query("select id from tree where eng_name='{$parts[2]}'"),0,0);

$content_p.='';


  $sql=mysql_query("SELECT * FROM message{$get_idrazd} limit 5");
                            while($row=mysql_fetch_array($sql)){
                            	$content.= "{$row['alltext']}";
                            	
                            }
                            
                            
                            $content .= '<div class="catalog"><ul class="row semicircle nuclear">';
                            $i = 1;
                            //$content .= '<table width="462px" border="1" cellpadding="2" cellspacing="0">';
                            //$content .= '<tr>';
                            $sql2 = mysql_query ( "SELECT * FROM `tree` WHERE pid='428' order by position asc" );
                            while ( $row = mysql_fetch_array ( $sql2 ) ) {
                            		
                            		
                            	if ($i == 5)
                            	{
                            		$content .= '</ul><ul class="row semicircle nuclear">';
                            		$i = 1;
                            	}
                            	if ($i == 4)	$last_li=' class="last"';
                            	$content .= '<li'.$last_li.'>
				<a href="/katalog/'.$row['eng_name'].'/">
				<span class="img-wrp"><img width="500" src="/uploads/'.$row['image'].'" alt=""></span>
				'.$row['name'].'
				</a>
				</li>';
                            	$last_li='';
                            	$i++;
                            }
                            $content .= '</div>';
                         
?>