<?php 
//===============================================================
//Модуль новостей
//===============================================================
	$per_page=10; //Количество новостей на странице

if (empty($parts[2])){
	//Список новостей
	if (isset($_GET['page'])) $page=($_GET['page']-1); else $page=0;
	$start=abs($page*$per_page);
	$q="select * from message{$get_razd_id} ORDER BY id DESC LIMIT $start,$per_page";
	$res=mysql_query($q);
	while($row=mysql_fetch_array($res)) {
	$content.="
	<h1>{$row['name']}</h1>
	{$row['anons']}<br>
	<p><a href='/{$str_get}/{$row['id']}/'>Подробнее</a></p><br>
	<p><b><i>Дата размещения: {$row['data']}</p></i></b><br>
	<hr>";
	}
	$q="SELECT count(*) FROM message{$get_razd_id}";
	$res=mysql_query($q);
	$row=mysql_fetch_row($res);
	$total_rows=$row[0];
	$num_pages=ceil($total_rows/$per_page);
    $content.= "<div align='center'><br>";
	for($i=1;$i<=$num_pages;$i++) {
		if ($i-1 == $page) {
			$content.="Страница:&nbsp;".$i." ";
		} else {
			$content.="Страница:&nbsp;".'<a href="'.$_SERVER['PHP_SELF'].'?admin=news&mode=show&page='.$i.'">'.$i."</a> ";
		}
	}
	$content.= "</div>";
}else{
	//Новость подробнее
	$sql=@mysql_query("select * from message{$get_razd_id} where id='{$parts[2]}'");
    while($row=@mysql_fetch_array($sql)){
	$content.="
	<h1>{$row['name']}</h1>
	<i>{$row['anons']}</i><br>
	{$row['alltext']}";
	$content.="<p><b><i>Дата размещения: {$row['data']}</p></i></b>";
	$content.="<p><a href='javascript:history.back();'><< вернуться</a></p>";
}

}
?>