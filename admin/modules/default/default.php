<?php 
echo "<h1>О сайте</h1>";


$sql=mysql_query("SELECT * FROM settings WHERE id='1' limit 1");
while($row=mysql_fetch_array($sql)){
echo "<form action='/admin/index.php?path=settings' method='post'>
<table width='100%' border='0' cellspacing='3' cellpadding='3' class='tables'>
  <tr class='tables'>
    <td width='1px' class='tables' background='/admin/template/img/bg_tables.jpg'  style='background-repeat: repeat-x'>Название сайта</td>
    <td width='100%' class='tables'>{$row['name']}</td>
  </tr>
  <tr>
    <td class='tables' background='/admin/template/img/bg_tables.jpg'  style='background-repeat: repeat-x'>Домен сайта</td>
    <td class='tables'>{$row['domain']}</td>
  </tr>
  <tr class='tables'>
    <td nowrap='nowrap' class='tables' background='/admin/template/img/bg_tables.jpg'  style='background-repeat: repeat-x'>Email Администратора</td>
    <td class='tables'>{$row['email']}</td>
  </tr>
    <tr class='tables'>
    <td nowrap='nowrap' valign='top' class='tables' background='/admin/template/img/bg_tables.jpg'  style='background-repeat: repeat-x'>Ключевые слова</td>
    <td class='tables'>{$row['keywords']}</td>
  </tr>
      <tr class='tables'>
    <td nowrap='nowrap' valign='top' class='tables' background='/admin/template/img/bg_tables.jpg'  style='background-repeat: repeat-x'>Описание сайта</td>
    <td class='tables'>{$row['description']}</td>
  </tr>
  <tr class='tables'>
    <td colspan='2' class='tables'><a href='/admin/index.php?path=settings'><font color='green'>Редактировать</font></a></td>
  </tr>
</table>
</form>";
}

echo "<h1>Отчёты о раскрутке сайта</h1>";
echo "<p>Отчетов по данному сайту не сформировано.</p>";

?>