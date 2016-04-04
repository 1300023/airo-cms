<?php 
$content.="<h1>Прайс-лист</h1>";
$content.="<table border='1'>";
$content.="<tr>";
$content.="<td><b>артикул</b></td>";
$sql=@mysql_query("select * from fields where id_razdel='{$get_razd_id}' order by id asc");
while($row=mysql_fetch_array($sql)){
		
$content.="<td><b>{$row['name']}</b></td>";
	
}
$content.="</tr>";







$sql=@mysql_query("select * from message{$get_razd_id} order by id asc");
while($row=mysql_fetch_array($sql)){
	$content.="<tr>
<td>{$row['id']}</td><td>{$row['col1']}</td><td>{$row['col2']}</td><td>{$row['col3']}</td><td>{$row['col4']}</td><td>{$row['col5']}</td>
	</tr>";
}
$content.="</table>";
?>