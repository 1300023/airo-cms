<?php
function tree($parent_id) { //class="folder-open"
	

	$sql = "SELECT * FROM tree where pid=$parent_id ORDER BY position asc";
	//echo $sql;
	$res = mysql_query ( $sql );
	if ($res) {
		while ( $row = mysql_fetch_array ( $res ) ) {
			
			if ($row ['id'] == 1) { // если корневой раздел
				$class = 'class="root"';
			}
			
			if ($row ['pid'] == 1) {
				$class = 'class="close"';
			}
			

			
			$get_count_razdel = mysql_result ( mysql_query ( "SELECT count(*) FROM tree where pid='{$row['id']}'" ), 0, 0 );
			if ($row ['id'] != "1") {
				
				if ($_GET ['pid']) {
				
				}
				
				if ($row ['pid'] != "1") {
					$get_count_razdel_p1 = @mysql_result ( mysql_query ( "SELECT pid FROM tree where id='{$row['id']}'" ), 0, 0 );
					$get_count_razdel_p2 = @mysql_result ( mysql_query ( "SELECT pid FROM tree where id='{$get_count_razdel_p1}'" ), 0, 0 );
					// echo "<script>alert('есть подраздел');</script>";
					// echo " Родитель: {$row['pid']} - {$row['pid']}";
				//	echo " Путь: {$row['id']} - {$get_count_razdel_p1} - {$get_count_razdel_p2}";
					$class = 'class="open"';
				}
				
				if ($row ['id'] == $_GET ['pid']) {
					
				//	echo "<script>alert('123');</script>";
				}
				
				
				
				if ($get_count_razdel == 0) {
					//$class = 'class="open"';
				//$ttr=".Без подразделов.";
				} else {
					//$ttr=".С подразделами.";
					//$class = 'class="open"';
					if ($row ['id'] == $_GET ['pid']) {
						$class = 'class="open"';
					}
				}
			
			}
			
			print "<li id='" . $row ['id'] . "' " . $class . " style='white-space:nowrap;'><span>" . $row ['name'] . "</span>&nbsp;&nbsp;";
			
			if ($row ['id'] != "1") {
				print "<a href='?path=edit&pid={$row['id']}'><img src='plugins/tree/images/page_edit.png' alt='Редактировать' title='Редактировать' align='absmiddle' border='0'></a>";
				if ($_SESSION ['level'] == "0")
					print "&nbsp;<a title='Удалить?' alt='Удалить?' href=\"javascript:if(confirm('Вы уверены что хотите удалить?')) window.location='/admin/?path=moduls&do=del&id={$row['id']}'\"><font color='red'>x</font></a>";
				if (($_SESSION ['level'] == "0") or ($_SESSION ['level'] == "1"))
					print "&nbsp;<a href='/admin/?path=moduls&do=fields&pid={$row['id']}' alt='Редактировать поля' title='Редактировать поля'><font color='green'>*</font></a>";
				
				if ($row ['invisible'] == "0") {
					print "&nbsp; <a href='/admin/?path=moduls&do=invisible&id={$row['id']}'><img src='template/images/show.png' border='0' align='absmiddle' alt='выключить' title='выключить'></a>";
				} else {
					print "&nbsp; <a href='/admin/?path=moduls&do=invisible&id={$row['id']}'><img src='template/images/show_no.png' border='0' align='absmiddle' alt='включить' title='включить'></a>";
				}
			
			}
			
			print "\r\n";
			
			$test = mysql_result ( mysql_query ( "SELECT COUNT(*) from tree where pid={$row['id']}" ), 0, 0 );
			if ($test) {
				print ("<ul>" . "\r\n") ;
				tree ( $row ['id'] );
				print ("</ul>" . "\r\n") ;
			}
			print ("</li>" . "\r\n") ;
		}
	} else {
		echo mysql_errno () . ": " . mysql_error () . " at " . __LINE__ . " line in " . __FILE__ . " file";
	}
}
?>