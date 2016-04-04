<?php
//print_r ( $parts );
function remote_file_exists($url) {
	return ( bool ) preg_match ( '~HTTP/1\.\d\s+200\s+OK~', @current ( get_headers ( $url ) ) );
}







switch ($parts [1]) {
	case "fotogalereya" :
		break;
	default :
		
		switch ($parts [2]) {
			case "povorotnaya_povorotnootkidnaya_furnitura_iz_pvh" :
				
				$sql = @mysql_query ( "select * from message461" );
				while ( $row = @mysql_fetch_array ( $sql ) ) {
					$content .= "
	<h1>{$row['name']}</h1><br>
	{$row['alltext']}<br>
	<br>";
				}
				
				break;
			
			
			default :
				// echo "Все категории";
				// =======================================================
				foreach ( $parts as $key => $item ) {
					if ((! empty ( $item )) and ($item != "")) {
						
						$get_bread_rus2 = @mysql_result ( mysql_query ( "select name from tree where eng_name='{$item}'" ), 0, 0 );
						$bread2 = "{$get_bread_rus2}";
					}
				}
				$content .= "<h1>{$bread2}</h1>";
				
				if (empty ( $parts [2] )) {
					
					$content .= '<div class="catalog"><ul class="row semicircle nuclear">';
					$i = 1;
					$sql2 = mysql_query ( "SELECT * FROM `tree` WHERE pid='428' order by position asc" );
					while ( $row = mysql_fetch_array ( $sql2 ) ) {
						
						if ($i == 5) {
							$content .= '</ul><ul class="row semicircle nuclear">';
							$i = 1;
						}
						if ($i == 4)
							$last_li = ' class="last"';
						$content .= '<li' . $last_li . '>
				<a href="/katalog/' . $row ['eng_name'] . '/">
				<span class="img-wrp"><img width="500" src="/uploads/' . $row ['image'] . '" alt=""></span>
				' . $row ['name'] . '
				</a>
				</li>';
						$last_li = '';
						$i ++;
					}
					$content .= '</div>';
				} else {
					
					$result_url = count ( $parts ) - 2;
					$pos = strpos ( $parts [$result_url], "t_" );
					
					if ($pos === false) {
						$get_razd_id_tree = @mysql_result ( mysql_query ( "SELECT id FROM tree WHERE eng_name='{$parts[$result_url]}'" ), 0, 0 );
						$get_count_tovar = mysql_result ( mysql_query ( "SELECT count( * ) FROM `message{$get_razd_id_tree}`" ), 0, 0 );
					} else {
					}
					
					if ($get_count_tovar == "0") {
						
						$content .= '<div class="catalog"><ul class="row semicircle nuclear">';
						$i = 1;
						$sql2 = mysql_query ( "SELECT * FROM `tree` WHERE pid='{$get_razd_id_tree}' order by position asc" );
						while ( $row = mysql_fetch_array ( $sql2 ) ) {
							if ($i == 5) {
								$content .= '</ul><ul class="row semicircle nuclear">';
								$i = 1;
							}
							if ($i == 4)
								$last_li = ' class="last"';
							
							if ($parts [3] == "") {
								$vertk = "";
							} else {
								$vertk = "{$parts[3]}/";
							}
							
							/*if ($parts [4] == "") {
								$vertk = "";
							} else {
								$vertk = "{$parts[5]}/";   // 09.02.2015
							}*/
							
							//echo "<p>{$vertk}</p>";
							
							$content .= '<li' . $last_li . '>
			<a href="/katalog/' . $parts ['2'] . '/' . $vertk . $row ['eng_name'] . '/">
				<span class="img-wrp"><img width="500" src="/uploads/' . $row ['image'] . '" alt=""></span>
				' . $row ['name'] . '
				</a>
				</li>';
							$last_li = '';
							$i ++;
						}
						
						$content .= '</div>';
						
						$get_opis_tree = @mysql_result ( mysql_query ( "SELECT opis FROM tree WHERE eng_name='{$parts[$result_url]}'" ), 0, 0 );
						
						$content .= "<p>{$get_opis_tree}</p>";
					} else {
						
						$result_url = count ( $parts ) - 2;
						
						$pos = strpos ( $parts [$result_url], "t_" );
						if ($pos === false) {
							
							
							if(($_SERVER['REQUEST_URI']!="/katalog/furnitura_vorne/")and($_SERVER['REQUEST_URI']!="/katalog/moskitnie_setki/")){//трататата
							
							$get_razd_id_tree = @mysql_result ( mysql_query ( "SELECT id FROM tree WHERE eng_name='{$parts[$result_url]}'" ), 0, 0 );
							
							$i = "0";
							$content .= "<div class='listing nuclear'>";
							$sql = @mysql_query ( "select * from message{$get_razd_id_tree} order by position desc" );
							// echo "select * from message{$get_razd_id_tree} order by position desc";
							while ( $row = @mysql_fetch_array ( $sql ) ) {
								if ($i == 1) {
									$last_li = 'class="item"';
								} else {
									$last_li = 'class="item second"';
								}
								$content .= '
							<div ' . $last_li . '>
					
	  							<div class="img-wrp"><a href="t_' . $row ['id'] . '/" class="hd"><img src="http://www.vektor-mk.ru/image.php?image=/uploads/' . $row ['foto'] . '&width=200&height=200&cropratio=1:1?" alt=""></a></div>
	  							<div class="descript-proposal">
	  								<a href="t_' . $row ['id'] . '/" class="hd">' . $row ['title'] . '</a>
	  								<span class="type"</span>
	  										
	  								<span class="qty">Артикул: ' . $row ['article'] . '</span>
	  							</div>
	  						</div>
	  					';
								$last_li = '';
								$i ++;
							}
							$content .= "</div>";
							
							$get_opis_tree = @mysql_result ( mysql_query ( "SELECT opis FROM tree WHERE eng_name='{$parts[$result_url]}'" ), 0, 0 );
							
							$content .= "<p>{$get_opis_tree}</p>";
							
						}
							
							
							
							
							
							/*
							 * $content.= ' <!--<ul class="pager"> <li class="prev"><a href="#">Предыдущая</a></li> <li><a href="#">1</a></li> <li><span>2</span></li> <li><a href="#">3</a></li> <li><a href="#">4</a></li> <li><a href="#">5</a></li> <li>...</li> <li><a href="#">101</a></li> <li class="next"><a href="#">Следующая</a></li> </ul>-->';
							 */
							
							
							
							
							
						} else {
							// echo 'Это товар!';
							// print_r($parts);
							// echo "<img alt='' src=”http://example.com/image.php?image=1111.jpg&width=100&height=100? />";
							$result_url = count ( $parts ) - 3;
							$result_url = $parts [$result_url];
							
							$result_url1 = count ( $parts ) - 2;
							$result_url1 = $parts [$result_url1];
							
							$result_url2 = str_replace ( "t_", "", $result_url1 );
							
							// echo "[{$result_url}]";
							
							$get_razd_id_tree = @mysql_result ( mysql_query ( "SELECT id FROM tree WHERE eng_name='{$result_url}'" ), 0, 0 );
							
							// echo "[{$get_razd_id_tree}]-[{$result_url2}]";
							
							$sql = mysql_query ( "select * from message{$get_razd_id_tree} where id='{$result_url2}'" );
							while ( $row = mysql_fetch_array ( $sql ) ) {
								
								$content .= '<h1>' . $row ['title'] . '</h1>';//Товар - 
								
								$content .= '<div class="product-wrp nuclear">
	  						<div class="view-wrp">
	  							<div class="big-img">
	  								<a href="/img_tovar.php?file=uploads/' . $row ['foto2'] . '" onclick="return hs.expand(this)"><img width="348" src="/uploads/' . $row ['foto2'] . '" alt="" ></a>
	  										<!--   <a href="/uploads/' . $row ['foto2'] . '" onclick="return hs.expand(this)"><img width="348" src="/uploads/' . $row ['foto2'] . '" alt="" ></a>-->
	  				
	  								<a href="/img_tovar.php?file=uploads/' . $row ['foto2'] . '" onclick="return hs.expand(this)" class="zoom"></a>
	  				
	  							</div>
	  							<div class="info">
	  								<p><i><span class="star">*</span>Подробнее о наличии можно узнать по нашему номеру</i></p>
	  								<div class="phone">
	  									<span class="txt">Многоканальный</span>
	  									<div class="number"><span>+7 (495)</span> 991-99-58</div>
	  								</div>
	  							</div>
	  						</div>
	  						<div class="descript-wrp">
	  							<h2>' . $row ['title'] . '</h2>
	  							<span class="qty"><b>Артикул:</b> ' . $row ['article'] . '</span>
	  							<span class="type"><b>Цвет:</b> ' . $row ['color'] . '<br><b>Норма упаковки:</b> ' . $row ['norma'] . '</span>
	  							<h3>Описание:</h3>
	  							<p>' . $row ['alltext'] . '</p>
	  							<!--<a href="#" class="claim">Оформить заказ</a>-->
	  						</div>
	  					</div>
	  					';
							}
						}
					}
				}
				break;
		}
		break;
}









switch($_SERVER['REQUEST_URI']){
	case "/katalog/furnitura_dlya_alyuminievyh_okon_i_dverei/furnitura_dlya_alyuminievogo_okna/evropaz/":
		$sql = @mysql_query ( "select * from message572" );
		while ( $row = @mysql_fetch_array ( $sql ) ) {
			$content .= "
			{$row['alltext']}<br>
			<br>";
		}
		break;
	case "/katalog/furnitura_dlya_alyuminievyh_okon_i_dverei/furnitura_dlya_alyuminievogo_okna/framuzhnyi_mehanizm/":
		$sql = @mysql_query ( "select * from message573" );
		while ( $row = @mysql_fetch_array ( $sql ) ) {
			$content .= "
			{$row['alltext']}<br>
			<br>";
		}
		break;
		case "/katalog/furnitura_vorne/":
			$sql = @mysql_query ( "select * from message461" );
			while ( $row = @mysql_fetch_array ( $sql ) ) {
				$content .= "
				{$row['alltext']}<br>
				<br>";
			}

			break;
			
			case "/katalog/moskitnie_setki/":
				$sql = @mysql_query ( "select * from message575" );
				while ( $row = @mysql_fetch_array ( $sql ) ) {
					$content .= "
					{$row['alltext']}<br>
					<br>";
				}
			
				break;
	default:
		break;
}



















/*
 * > $get_razd_id_tree = @mysql_result ( mysql_query ( "SELECT id FROM tree WHERE eng_name='{$parts['2']}'" ), 0, 0 ); $sql=mysql_query("select * from message{$get_razd_id_tree} limit 1"); while($row=mysql_fetch_array($sql)){ $content.= '<div class="product-wrp nuclear"> <div class="view-wrp"> <div class="big-img"> <a href="/uploads/'.$row['foto'].'" onclick="return hs.expand(this)"><img width="348" src="/uploads/'.$row['foto'].'" alt="" ></a> <a href="/uploads/'.$row['foto'].'" onclick="return hs.expand(this)" class="zoom"></a> </div> <div class="info"> <p><i><span class="star">*</span>Подробнее о наличии можно узнать по нашему номеру</i></p> <div class="phone"> <span class="txt">Многоканальный</span> <div class="number"><span>+7 (495)</span> 991-99-58</div> </div> </div> </div> <div class="descript-wrp"> <h2>'.$row['title'].'</h2> <!--<span class="type">ТКВ-2П</span> <span class="qty">Количество: 31 шт.</span>--> <h3>Описание:</h3> <p>'.$row['alltext'].'</p> <!--<a href="#" class="claim">Оформить заказ</a>--> </div> </div> '; }
 */
				
				
				
				
				
				
				
				
				
				
				
				
				
				
				
		
			/*	if ($i == 2)
				{
					$content .= '</tr><tr>';
					$i = 1;
				}
				$content .= "<td><h1>{$row['name']}</h1>
				<img src='/uploads/{$row['image']}' width='350' border='0' alt='{$row['name']}' title='{$row['name']}' />
				<br>
				<a href='/fotogalereya/{$row['eng_name']}/'></a>
						<!-- {$row['name']}{$row['id']}<img src='/uploads/{$row['pre1']}' alt='' width='150' border='0' title='{$row['name']}' border='0' /> -->";
		
						//foto
						$get_foto1=@mysql_result(mysql_query("select foto from message{$row['id']} where id='1'"),0,0);
						$get_foto2=@mysql_result(mysql_query("select foto2 from message{$row['id']} where id='1'"),0,0);
						$get_foto3=@mysql_result(mysql_query("select foto3 from message{$row['id']} where id='1'"),0,0);
						$get_foto4=@mysql_result(mysql_query("select foto4 from message{$row['id']} where id='1'"),0,0);
		
		
						$content .= "<br>";
							
		
						if(remote_file_exists("http://vektormk.air-host.ru/uploads/{$get_foto1}")){
						if ($get_foto1!="") $content .= "<a href='/uploads/{$get_foto1}' class='highslide' onclick='return hs.expand(this)'><img src='/uploads/{$get_foto1}' width='150'></a> ";
		
						}
		
						if(remote_file_exists("http://vektormk.air-host.ru/uploads/{$get_foto2}")){
						if ($get_foto2!="") $content .= "<a href='/uploads/{$get_foto2}' class='highslide' onclick='return hs.expand(this)'><img src='/uploads/{$get_foto2}' width='150'></a> ";
		
						}
		
						if(remote_file_exists("http://vektormk.air-host.ru/uploads/{$get_foto3}")){
						if ($get_foto3!="") $content .= "<a href='/uploads/{$get_foto3}' class='highslide' onclick='return hs.expand(this)'><img src='/uploads/{$get_foto3}' width='150'></a> ";
		
						}
		
						if(remote_file_exists("http://vektormk.air-host.ru/uploads/{$get_foto4}")){
						if ($get_foto4!="") $content .= "<a href='/uploads/{$get_foto4}' class='highslide' onclick='return hs.expand(this)'><img src='/uploads/{$get_foto4}' width='150'></a> ";
		
						}
								//else{
								//		echo "file not exist!!!";
								//	}
		
		
								//<a href='/uploads/{$get_foto1}' class='highslide' onclick='return hs.expand(this)'><img src='/uploads/{$get_foto1}' width='150'></a>
						//<a href='/uploads/{$get_foto2}' class='highslide' onclick='return hs.expand(this)'><img src='/uploads/{$get_foto2}' width='150'></a>
						//<a href='/uploads/{$get_foto3}' class='highslide' onclick='return hs.expand(this)'><img src='/uploads/{$get_foto3}' width='150'></a>
						//<a href='/uploads/{$get_foto4}' class='highslide' onclick='return hs.expand(this)'><img src='/uploads/{$get_foto4}' width='150'></a>";
		
						$content .= "</td>";
						$i++;
			}
			$content .= '</tr><tr><td> &nbsp;</td></tr>';
		
			$content .= "</table>";*/



/*
switch ($parts[1]){
	case "fotogalereya":

		    $content.="<h1>Фотогалерея</h1>";
		    	
		    	
		    if (empty($parts[2])){
		    		
		    	$i = 1;
		    	$content .= '<table width="462px" border="1" cellpadding="2" cellspacing="0">';
		    	$content .= '<tr>';
		    	$sql2 = mysql_query ( "SELECT * FROM `tree` WHERE pid='378'" );
		    	while ( $row = mysql_fetch_array ( $sql2 ) ) {
		    
		    		if ($i == 2)
		    		{
		    			$content .= '</tr><tr>';
		    			$i = 1;
		    		}
		    		$content .= "<td><h1>{$row['name']}</h1>
		    		<img src='/uploads/{$row['image']}' width='350' border='0' alt='{$row['name']}' title='{$row['name']}' />
		    		<br>
		    		<a href='/fotogalereya/{$row['eng_name']}/'></a>
		    		<!-- {$row['name']}{$row['id']}<img src='/uploads/{$row['pre1']}' alt='' width='150' border='0' title='{$row['name']}' border='0' /> -->";
		    		
		    		//foto
		    		$get_foto1=@mysql_result(mysql_query("select foto from message{$row['id']} where id='1'"),0,0);
		    		$get_foto2=@mysql_result(mysql_query("select foto2 from message{$row['id']} where id='1'"),0,0);
		    		$get_foto3=@mysql_result(mysql_query("select foto3 from message{$row['id']} where id='1'"),0,0);
		    		$get_foto4=@mysql_result(mysql_query("select foto4 from message{$row['id']} where id='1'"),0,0);
		    
		    		
		    		$content .= "<br>";
		 

		    		if(remote_file_exists("http://mastmarket.air-host.ru//uploads/{$get_foto1}")){
		    			if ($get_foto1!="") $content .= "<a href='/uploads/{$get_foto1}' class='highslide' onclick='return hs.expand(this)'><img src='/uploads/{$get_foto1}' width='150'></a> ";
		    		
		    		}
		    		
		    		if(remote_file_exists("http://mastmarket.air-host.ru//uploads/{$get_foto2}")){
		    			if ($get_foto2!="") $content .= "<a href='/uploads/{$get_foto2}' class='highslide' onclick='return hs.expand(this)'><img src='/uploads/{$get_foto2}' width='150'></a> ";
		    		
		    		}
		    		
		    		if(remote_file_exists("http://mastmarket.air-host.ru//uploads/{$get_foto3}")){
		    			if ($get_foto3!="") $content .= "<a href='/uploads/{$get_foto3}' class='highslide' onclick='return hs.expand(this)'><img src='/uploads/{$get_foto3}' width='150'></a> ";
		    		
		    		}
		    		
		    		if(remote_file_exists("http://mastmarket.air-host.ru//uploads/{$get_foto4}")){
		    			if ($get_foto4!="") $content .= "<a href='/uploads/{$get_foto4}' class='highslide' onclick='return hs.expand(this)'><img src='/uploads/{$get_foto4}' width='150'></a> ";
		    		
		    		}
		    		//else{
		    	//		echo "file not exist!!!";
		    	//	}		    		
	
		    		
		    		//<a href='/uploads/{$get_foto1}' class='highslide' onclick='return hs.expand(this)'><img src='/uploads/{$get_foto1}' width='150'></a> 
		    		//<a href='/uploads/{$get_foto2}' class='highslide' onclick='return hs.expand(this)'><img src='/uploads/{$get_foto2}' width='150'></a> 
		    		//<a href='/uploads/{$get_foto3}' class='highslide' onclick='return hs.expand(this)'><img src='/uploads/{$get_foto3}' width='150'></a> 
		    		//<a href='/uploads/{$get_foto4}' class='highslide' onclick='return hs.expand(this)'><img src='/uploads/{$get_foto4}' width='150'></a>";
		    		
		    		$content .= "</td>";
		    		$i++;
		    	}
		    	$content .= '</tr><tr><td> &nbsp;</td></tr>';
		    
		    	$content .= "</table>";
		    		
		    }else{
		    	
		    $get_id=mysql_result(mysql_query("select id from tree where eng_name='{$parts['2']}'"),0,0);
		    
		    //echo $get_id;
		    
		    
		    $sql=mysql_query("select * from message{$get_id}");
		    while($row=mysql_fetch_array($sql)){
		    $content .= "{$row['alltext']}";
		    }
		    
		    }
		    break;
		break;
		
		case "produkciya":
			
			if ($parts[2]=="ograzhdeniya_i_perila_iz_nerzhaveyuszei_stali"){
			//==========================================================================	
				if (! empty ( $parts [3] )) {
					$dop_h = mysql_result ( mysql_query ( "select name from tree where eng_name='{$parts['2']}'" ), 0, 0 );
					$dop_hh = " - {$dop_h}";
				}
				$content .= "<h1>Ограждения и перила из нержавеющей стали{$dop_hh}</h1>";
				
				if (empty ( $parts [3] )) {
						
					$i = 1;
					$content .= '<table width="462px" border="1" cellpadding="2" cellspacing="0">';
					$content .= '<tr>';
					$sql2 = mysql_query ( "SELECT * FROM `tree` WHERE pid='382'" );
					while ( $row = mysql_fetch_array ( $sql2 ) ) {
				
						if ($i == 3) {
							$content .= '</tr><tr>';
							$i = 1;
						}
						$content .= "<td>
						<a href='/produkciya/{$row['eng_name']}/'><img src='/uploads/{$row['image']}' width='150' border='0' alt='{$row['name']}' title='{$row['name']}' /></a>
						<br>
						<a href='/produkciya/{$row['eng_name']}/'>{$row['name']}</a>
						<!-- {$row['name']}{$row['id']}<img src='/uploads/{$row['pre1']}' alt='' width='150' border='0' title='{$row['name']}' border='0' /> -->
				
				
						</td>";
						$i ++;
					}
					$content .= '</tr>';
			$content .= "</table>";
		} else {
						
					$get_id = mysql_result ( mysql_query ( "select id from tree where eng_name='{$parts['3']}'" ), 0, 0 );
						
					// echo $get_id;
						
					$sql = mysql_query ( "select * from message{$get_id}" );
					while ( $row = mysql_fetch_array ( $sql ) ) {
					$content .= "{$row['alltext']}";
					}
					}
				
				
			//==========================================================================
			}elseif($parts[2]=="nerzhaveyuszaya_stal"){
				//==========================================================================
				if (! empty ( $parts [3] )) {
					$dop_h = mysql_result ( mysql_query ( "select name from tree where eng_name='{$parts['2']}'" ), 0, 0 );
					$dop_hh = " - {$dop_h}";
				}
				$content .= "<h1>Нержавеющая сталь{$dop_hh}</h1>";
				
				if (empty ( $parts [3] )) {
				
					$i = 1;
					$content .= '<table width="462px" border="1" cellpadding="2" cellspacing="0">';
					$content .= '<tr>';
					$sql2 = mysql_query ( "SELECT * FROM `tree` WHERE pid='389'" );
					while ( $row = mysql_fetch_array ( $sql2 ) ) {
				
						if ($i == 3) {
							$content .= '</tr><tr>';
							$i = 1;
						}
						$content .= "<td>
						<a href='/produkciya/{$row['eng_name']}/'><img src='/uploads/{$row['image']}' width='150' border='0' alt='{$row['name']}' title='{$row['name']}' /></a>
						<br>
						<a href='/produkciya/{$row['eng_name']}/'>{$row['name']}</a>
								<!-- {$row['name']}{$row['id']}<img src='/uploads/{$row['pre1']}' alt='' width='150' border='0' title='{$row['name']}' border='0' /> -->
				
				
								</td>";
								$i ++;
					}
					$content .= '</tr>';
					$content .= "</table>";
				} else {
				
				$get_id = mysql_result ( mysql_query ( "select id from tree where eng_name='{$parts['3']}'" ), 0, 0 );
				
				// echo $get_id;
				
				$sql = mysql_query ( "select * from message{$get_id}" );
				while ( $row = mysql_fetch_array ( $sql ) ) {
				$content .= "{$row['alltext']}";
						}
						}
			
				//==========================================================================
			}else{ //
		if (! empty ( $parts [2] )) {
			$dop_h = mysql_result ( mysql_query ( "select name from tree where eng_name='{$parts['2']}'" ), 0, 0 );
			$dop_hh = " - {$dop_h}";
		}
		$content .= "<h1>Продукция{$dop_hh}</h1>";
		
		if (empty ( $parts [2] )) {
			
			$i = 1;
			$content .= '<table width="462px" border="1" cellpadding="2" cellspacing="0">';
			$content .= '<tr>';
			$sql2 = mysql_query ( "SELECT * FROM `tree` WHERE pid='377' order by position asc" );
			while ( $row = mysql_fetch_array ( $sql2 ) ) {
				
				if ($i == 3) {
					$content .= '</tr><tr>';
					$i = 1;
				}
			//	if ($row['eng_name']=="ograzhdeniya_i_perila_iz_nerzhaveyuszei_stali"){ $set_select=" style='background-color:#fcff00;'";}else{$set_select=" style=''";}
				
				if ($row['eng_name']=="ograzhdeniya_i_perila_iz_nerzhaveyuszei_stali"){ $set_select=" style='font-weight: bold;'";}else{$set_select=" style=''";}
							
				$content .= "<td>
		<a href='/produkciya/{$row['eng_name']}/'><img src='/uploads/{$row['image']}' width='150' border='0' alt='{$row['name']}' title='{$row['name']}' /></a>
		<br>
		<a href='/produkciya/{$row['eng_name']}/' {$set_select}>{$row['name']}</a>
		<!-- {$row['name']}{$row['id']}<img src='/uploads/{$row['pre1']}' alt='' width='150' border='0' title='{$row['name']}' border='0' /> -->
		
		
</td>";
				$i ++;
			}
			$content .= '</tr>';
			$content .= "</table>";
		} else {
			
			$get_id = mysql_result ( mysql_query ( "select id from tree where eng_name='{$parts['2']}'" ), 0, 0 );
			
			// echo $get_id;
			
			$sql = mysql_query ( "select * from message{$get_id}" );
			while ( $row = mysql_fetch_array ( $sql ) ) {
				$content .= "{$row['alltext']}";
			}
		}
			}
			break;
	default:
		$content .= "123";
		break;
	
}


*/


/*
if($parts[1]!="fotogalereya"){
	$content.="<h1>Фотогалерея</h1>";

if (empty($parts[2])){
	$ttt=count($parts)-2;
	
	$get_h1=mysql_result(mysql_query("SELECT name FROM tree where id={$get_razd_id} ORDER BY id desc"),0,0);
	$get_p=mysql_result(mysql_query("select * from tree where eng_name='{$parts[2]}'"),0,0);
	$get_p2=mysql_result(mysql_query("select * from tree where eng_name='{$parts[1]}'"),0,0);
	$get_page=@mysql_result(mysql_query("select * from tree where eng_name='{$parts[$ttt]}'"),0,0);
	$get_titles=@mysql_result(mysql_query("select name from message{$get_page}"),0,0);
	$content.="<table width='100%'  cellspacing='5' cellpadding='5'>";
	$sql=mysql_query("select * from message{$get_page} order by id DESC");
	while($row=@mysql_fetch_array($sql)){
		$content.="
		<tr>
		<td colspan='2'><h1>{$row['name']}</h1></td>
		</tr>
		<tr>
		<td colspan='2'>
		<img src='/uploads/{$row['foto2']}' alt='' title='' />
		
		</td>
		</tr>
		<tr>
		<td valign='top' width='1px'>
		<!--<img src='/uploads/{$row['foto']}' width='108'>-->
		<a href='/uploads/{$row['foto2']}' class='highslide' onclick='return hs.expand(this)'>
		<img src='/uploads/{$row['foto']}' width='150' alt='' title='' /></a>
		</td>
		<td valign='top'>
		<b>Описание сайта:</b>
		{$row['alltext']}<br>
		
		<b>Перечень выполненных работ:</b> <br>
		";
		
		
		
		$content.=nl2br($row['proivowork']);
		
		$content.="<br><br><b>Год выполнения работы:</b> {$row['proizvworkgod']}<br>
		
		<p>
		<b></b> {$row['tematika']}
		</p>
		
		<p>
		<b></b> <noindex><a href='{$row['saiturl']}' target='_blank'>{$row['saiturl']}</a></noindex>
		</p>
		
		<a href='{$row['id']}/' alt='{$row['name']} - {$row['proivowork']}' title='{$row['name']} - {$row['proivowork']}'>Подробнее о работе \"{$row['name']}\"</a>
		</td>
		</tr>
		<tr>
		<td colspan='2' bgcolor='' height='1px'></td>
		</tr>
		<tr>
		<td colspan='2'> 
			<table width='100%' height='1'>
    <tr>
    <td background='/templates/demo/img/2_1.jpg' height='1'><img src='/templates/demo/img/2_1.jpg' width='17' height='5' /></td>
    </tr>
    </table>
		</td>
		</tr>
		
		";
	}
	$content.="</table>";
	

}else{
	
	
	//echo $parts[2];
	
	
	
	$content.="<table width='100%'>";
	$sql=mysql_query("select * from message373 where id='{$parts[2]}'");
	while($row=@mysql_fetch_array($sql)){
		$content.="
		<tr>
		<td colspan='2'><h1>{$row['name']}</h1></td>
		</tr>
		<tr>
		<td valign='top' width='1px'>
		<!--<img src='/uploads/{$row['foto']}' width='108'>-->
		<a href='/uploads/{$row['foto2']}' class='highslide' onclick='return hs.expand(this)'>
		<img src='/uploads/{$row['foto2']}' width='400' alt='' title='' /></a>
		</td>
		<td valign='top'>
		{$row['alltext']}<br>
		{$row['proivowork']}<br>
		Год: <i>{$row['proizvworkgod']}</i>
<a href='/saity/'>Вернуться</a>
		</td>
		</tr>
		<tr>
		<td colspan='2' bgcolor='' height='1px'></td>
		</tr>
		";
		}
		$content.="</table>";
	
	
	
}











}else{
	




}
*/


?>