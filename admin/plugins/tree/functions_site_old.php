<?php
function url($id) {

	$path = "";
	$sql = mysql_query ( "select pid,eng_name from tree where id='{$id}'" );
	while ( $row = mysql_fetch_array ( $sql ) ) {
		$path .= "/{$row['eng_name']}";
		if ($row ['pid'] > 1)
			$path .= url ( $row ['pid'] );
	}
	return $path;
}

function reurl($id) {
	$text = url ( $id );
	$mass = explode ( "/", $text );
	$count = count ( $mass );
	$path = "";
	for($i = 0; $i <= $count; $i ++) {
		if (! empty ( $mass [$count - $i] ))
			$path .= "{$mass[$count-$i]}/";
	}
	return $path;

}

function tree($parent_id, $get_razd) {
	$text = "";
	$sql = "SELECT * FROM tree where invisible=0 and pid=$parent_id ORDER BY position asc";
	$res = mysql_query ( $sql );
	if ($res) {
		while ( $row = mysql_fetch_array ( $res ) ) {
			
			$get_pid = mysql_result ( mysql_query ( "select pid from tree where id='{$get_razd}'" ), 0, 0 );
			$get_pid_pid = mysql_result ( mysql_query ( "select pid from tree where id='{$get_pid}'" ), 0, 0 );
			$get_pid_pid_pid = mysql_result ( mysql_query ( "select pid from tree where id='{$get_pid_pid}'" ), 0, 0 );
			
			if ($row ['id'] == 1) {
				$class = 'class="root"';
			} elseif ($row ['id'] == $get_pid_pid_pid) {
				$class = 'class="open"';
			} elseif ($row ['id'] == $get_pid_pid) {
				$class = 'class="open"';
			} elseif ($row ['id'] == $get_pid) {
				$class = 'class="open"';
			} elseif ($row ['pid'] == 1) {
				$class = 'class="close"';
			} else {
				$class = '';
			}
			
			$test = mysql_result ( mysql_query ( "SELECT COUNT(*) from tree where pid={$row['id']}" ), 0, 0 );
			
			$text .= "<li id='" . $row ['id'] . "' " . $class . "><span><a href='/" . reurl ( $row ['id'] ) . "' class='main_link'>" . $row ['name'] . "</a></span>&nbsp;&nbsp;";
			
			$text .= "\r\n";
			
			if ($test) {
				$text .= ("<ul>" . "\r\n");
				$text .= tree ( $row ['id'], $get_razd );
				$text .= ("</ul>" . "\r\n");
			}
			$text .= ("</li>" . "\r\n");
		}
	} else {
		echo mysql_errno () . ": " . mysql_error () . " at " . __LINE__ . " line in " . __FILE__ . " file";
	}
	return $text;
}
?>