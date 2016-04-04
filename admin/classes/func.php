<?
// строку в транслит
function translit($content) {
	$utf2enS = array('А' => 'a', 'Б' => 'b', 'В' => 'v', 'Г' => 'h', 'Ґ' => 'g', 'Д' => 'd', 'Е' => 'e', 'Ё' => 'jo', 'Є' => 'e', 'Ж' => 'zh', 'З' => 'z', 'И' => 'i', 'І' => 'i', 'Й' => 'i', 'Ї' => 'i', 'К' => 'k', 'Л' => 'l', 'М' => 'm', 'Н' => 'n', 'О' => 'o', 'П' => 'p', 'Р' => 'r', 'С' => 's', 'Т' => 't', 'У' => 'u', 'Ў' => 'u', 'Ф' => 'f', 'Х' => 'h', 'Ц' => 'c', 'Ч' => 'ch', 'Ш' => 'sh', 'Щ' => 'sz', 'Ъ' => '', 'Ы' => 'y', 'Ь' => '', 'Э' => 'e', 'Ю' => 'yu', 'Я' => 'ya');
	$utf2enB = array('а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'ґ' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'jo', 'є' => 'e', 'ж' => 'zh', 'з' => 'z', 'и' => 'i', 'і' => 'i', 'й' => 'i', 'ї' => 'i', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o', 'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ў' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c', 'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sz', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu', 'я' => 'ya', '&quot;' => '', '&amp;' => '', 'µ' => 'u', '№' => 'num');
	$content = trim(strip_tags($content));
	$content = strtr($content, $utf2enS);
	$content = strtr($content, $utf2enB);
	$content = preg_replace("/\s+/ms", "_", $content);
	$content = preg_replace("/[ ]+/", "_", $content);
	$content = preg_replace("/[^a-z0-9_\.]+/mi", "", $content);
	return $content;
}

//получить дату
function getdata ($time) {
	$time = date("d.m.Y", $time);
	return $time;
}

//Функция наложения прозрачного png на картинку
function chengeColor($filename,$r,$g,$b,$id) {
 $pic = imagecreatefromjpeg($filename); // Создаём картинку из jpg  файла
 $col2 = imagecolorallocatealpha($pic,$r,$g,$b,30); // Задаём параметры цвета в RGB  и прозрачности от 0 до 127
 imagefilledrectangle($pic,0,0,200,200,$col2); // Задаём параметры накладоваемого фона
 imagepng($pic,"catal_foto/color/pic".$id.".png"); // создаём склеенное изображение png и сохраняем его под именем 
 imageDestroy($pic); // уничтожаем временний файл с созданной картинкой из файла
}

//редирект через JS
function redirect($alert,$url){
	  echo "<script language='JavaScript'>alert('$alert');</script>";
	  echo "<META http-equiv='refresh' content='0; url=$url'> ";
}



//Функции для визуального редактора.
function editor($name,$valuefield=false){
	$oFCKeditor = new FCKeditor('$name') ;
	$oFCKeditor->Height = '500px';
	$oFCKeditor->BasePath = $sBasePath ;
	@$oFCKeditor->Value = $row['$valuefield'];
	$oFCKeditor->Height = '500px';
    $oFCKeditor->Width='100%';
	$oFCKeditor->Create() ;
}


function textarea($name){
	return print "<textarea name='$name' cols='50' rows='2'></textarea>";
}

function sql_insert($table,$sql)
{
	$query="insert into $table values($sql)";
	$result=mysql_query($query);
	echo mysql_error();
}


function mysql_view_table($table,$kolonka1,$kolonka2,$kolonka3)
{
	$result1 = mysql_query("SELECT * FROM $table");
	while ($row = mysql_fetch_array($result1))
	{
		echo "
  <tr>
    <td bgcolor='#EEEEEE'>".$row[$kolonka1]."</td>
    <td bgcolor='#F5F5F5'>".$row[$kolonka2]."</td>
    <td bgcolor='#EEEEEE'>".$row[$kolonka3]."</td>
  </tr>
";
	}
}

function data_del($table,$id) {
	mysql_query("DELETE FROM $table WHERE id=".$_REQUEST['id']."");
	echo mysql_error();
}

function data_update($table,$id){
	mysql_query("UPDATE $table SET title='$uptitle',anons='$upanons',img='$upmyfile_name' WHERE id=".$_REQUEST['id']." LIMIT 1");
	echo $_REQUEST['title']."br".$table."br".$upanons.$id."<br>";
	echo mysql_error();
}

function convert($stroka) {
	$normstr=iconv("KOI8-U", "UTF-8", $stroka);
	return $normstr;
}

function SaveImg($myfile,$myfile_name,$dir,$pdir)
{
	copy ($myfile,$dir.$myfile_name);
	$a=GetImageSize($myfile);

	$W=$a[0];
	$H=$a[1];
	$minW=125;
	$minH=$H*$minW/$W;
	
	$fullW=300;
	$fullH=$H*$fullW/$W;
	//$fullH=$H*$fullW/$W;
	if ($W<$minW or $W<$fullW)
	{
		$minW=$W;
		$fullW=$W;
	}
	$b=@imageCreateTrueColor($minW,$minH);
	//	$w=@imageCreateTrueColor($fullW,($fullW*$W/$H));
	$w=@imageCreateTrueColor($fullW,$fullH);
	$c=@imageCreatefromJpeg("$myfile");

	@imagecopyresampled($b,$c,0,0,0,0,$minW,$minH,$W,$H);
	//($fullW*$W/$H)
	//echo "$minW х $minH <br>";

	@imagecopyresampled($w,$c,0,0,0,0,$fullW,$fullH,$W,$H);

	//echo "$fullW х $fullH<br>";

	@imageJpeg($b,$pdir.$myfile_name);

	@imageJpeg($w,$dir.$myfile_name);



}
function SaveImgCatalog($myfile,$myfile_name,$dir,$pdir)
{
	copy ($myfile,$dir.$myfile_name);
	$a=GetImageSize($myfile);

	$W=$a[0];
	$H=$a[1];
	$minW=160;
	$minH=$H*$minW/$W;
	
	$fullW=250;
	$fullH=$H*$fullW/$W;
	//$fullH=$H*$fullW/$W;
	if ($W<$minW or $W<$fullW)
	{
		$minW=$W;
		$fullW=$W;
	}
	$b=@imageCreateTrueColor($minW,$minH);
	//	$w=@imageCreateTrueColor($fullW,($fullW*$W/$H));
	$w=@imageCreateTrueColor($fullW,$fullH);
	$c=@imageCreatefromJpeg("$myfile");

	@imagecopyresampled($b,$c,0,0,0,0,$minW,$minH,$W,$H);
	//($fullW*$W/$H)
	//echo "$minW х $minH <br>";

	@imagecopyresampled($w,$c,0,0,0,0,$fullW,$fullH,$W,$H);

	//echo "$fullW х $fullH<br>";

	@imageJpeg($b,$pdir.$myfile_name);

	@imageJpeg($w,$dir.$myfile_name);



}


function SaveImgPro($myfile,$myfile_name,$dir,$pdir,$minW,$fullW)
{
	copy ($myfile,$dir.$myfile_name);
	$a=GetImageSize($myfile);

	$W=$a[0];
	$H=$a[1];
	//$minW=125;
	$minH=$H*$minW/$W;

	//$fullW=200;
	$fullH=$H*$fullW/$W;
	//$fullH=$H*$fullW/$W;
	if ($W<$minW or $W<$fullW)
	{
		$minW=$W;
		$fullW=$W;
	}
	$b=@imageCreateTrueColor($minW,$minH);
	//	$w=@imageCreateTrueColor($fullW,($fullW*$W/$H));
	$w=@imageCreateTrueColor($fullW,$fullH);
	$c=@imageCreatefromJpeg("$myfile");

	@imagecopyresampled($b,$c,0,0,0,0,$minW,$minH,$W,$H);
	//($fullW*$W/$H)
	//echo "$minW х $minH <br>";

	@imagecopyresampled($w,$c,0,0,0,0,$fullW,$fullH,$W,$H);

	//echo "$fullW х $fullH<br>";

	@imageJpeg($b,$pdir.$myfile_name);

	@imageJpeg($w,$dir.$myfile_name);



}


function breadpix($id)
{
	$sql="SELECT * FROM categories _categories, categories WHERE categories.cid=$id
			AND categories.cleft BETWEEN _categories.cleft AND _categories.cright
			AND categories.clevel>=_categories.clevel AND _categories.clevel>0 ORDER by _categories.clevel";
	$res=mysql_query($sql);
	$img=" <img src=images/arrow.gif align=middle> ";
	$str="<p class=zag>";

	while($rec=mysql_fetch_array($res))
	{
		$str.='<a href="index.php?action=catalog&id='.$rec[0].'" style="text-decoration:none">'.$rec[1]."</a>".$img;
	}


	//$str="<p class=zag><img src=images/arrow.gif align=middle> <img src=images/arrow.gif align=middle>";
	$str=ereg_replace(" <img src=images/arrow.gif align=middle> $","", $str);
	$str.="</p>";
	return $str;
}



function treen($parent_id){
		global $mysql_prefix;
		$sql = "SELECT * FROM tree where pid=$parent_id ORDER BY position asc";
		$res = mysql_query ($sql);
		
		if($res){
			while($row=mysql_fetch_array($res)){
				
				if ($row['id']==1) {$class='class="root"';} 
				elseif ($row['pid']==1){$class='class="open"';} //open
				else {$class='class="open"';}
			    
				
				$tree=$tree. "<li id='".$row['id']."' ".$class."><span>".$row['name']."</span>&nbsp;&nbsp;";
                $test= mysql_result(mysql_query ("SELECT COUNT(*) from tree where pid={$row['id']}"),0,0);
				if ($row['id']!="1"){
				if ($test){
				if (isset($_GET['idmod']))
							{
							$URL1="?idmod={$_GET['idmod']}&id={$row['id']}";	
							}
							else 
							{
							$URL1="?id={$row['id']}";
							}
                  //$tree=$tree.  "&nbsp;&nbsp;&nbsp;<a href='#' onClick=\"jPrompt('Введите название страницы:', '', 'Добавление страницы','{$row['id']}');\"><img src='../plugins/tree/images/plus.gif' align='absmiddle' border='0' alt='Добавить страницу в папку' title='Добавить страницу в папку'></a>";
 //$tree=$tree.  "<a href='{$URL1}&{$row['id']}'><img src='../plugins/tree/images/page_edit.png' align='absmiddle' border='0' alt='Редактировать страницу' title='Редактировать страницу'></a>";
                      // 1$tree=$tree.  "&nbsp;&nbsp;&nbsp;<a href='#' onClick=\"jConfirm('Вы уверены, что хотите удалить раздел: ".$row['name']."?', 'Удаление раздела','{$row['id']}');\"><img src='../plugins/tree/images/minus.gif' align='absmiddle' border='0' alt='Удалить папку' title='Удалить папку'></a>";
                  if ($row['module_id']==1)
                  {
                  	 $tree=$tree.  "&nbsp;&nbsp;&nbsp;<a href='{$URL1}'><img src='../plugins/tree/images/page_edit.png' align='absmiddle' border='0' alt='Редактировать страницу' title='Редактировать страницу'></a>";
                  }
				
					}else
					{
						if (isset($_GET['idmod']))
							{
							$URL1="?idmod={$_GET['idmod']}&id={$row['id']}";	
							}
							else 
							{
							$URL1="?id={$row['id']}";
							}
				  
				//  $tree=$tree.  "<a href='#' onclick=\"jPrompt('Введите название страницы:', '', 'Добавление страницы','{$row['id']}');\"><img src='../plugins/tree/images/page_add.png' align='absmiddle' border='0' alt='Переместить страницу' title='Добавить страницу'></a>";
				 // $tree=$tree.  "<a href='{$URL1}'><img src='../plugins/tree/images/page_edit.png' align='absmiddle' border='0' alt='Редактировать страницу' title='Редактировать страницу'></a>";
						  
				 // $tree=$tree.  "<a href='#' onClick=\"jConfirm('Вы уверены, что хотите удалить страницу?', 'Удаление страницы','{$row['id']}');\"><img src='../plugins/tree/images/page_delete.png' align='absmiddle' border='0' alt='Удалить страницу' title='Удалить страницу'></a>";
				
                  //$tree=$tree.  "<a href='#{$row['id']}'><img src='../plugins/tree/images/page_remove.png' align='absmiddle' border='0' alt='Переместить страницу' title='Переместить страницу'></a>";
					}
               // }
                }
                else 
                {
                	
                //	$tree=$tree.  "&nbsp;&nbsp;&nbsp;<a href='#' onClick=\"jPrompt('Введите название страницы:', '', 'Добавление страницы','{$row['id']}');\"><img src='../plugins/tree/images/plus.gif' align='absmiddle' border='0' alt='Добавить страницу в папку' title='Добавить страницу в папку'></a>";
                 	
                  
                }	
                
                $tree=$tree.  "\r\n";
				
				$test= mysql_result(mysql_query ("SELECT COUNT(*) from tree where pid={$row['id']}"),0,0);
				if ($test){
				$tree=$tree."<ul>"."\r\n";
				$tree=$tree.treen($row['id']);
				$tree=$tree. "</ul>"."\r\n";
				}
				$tree=$tree."</li>"."\r\n";
			}
		}else{
			echo mysql_errno().": ".mysql_error()." at ".__LINE__." line in ".__FILE__." file";
		}
		
	return $tree;
	}

	
	
	

?>