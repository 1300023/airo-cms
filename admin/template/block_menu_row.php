<?php
echo ' <table width="1" border="0" cellspacing="3" cellpadding="7"><tr>';



switch ($_GET['path']){
//	case "edit":
	//	echo "<td width='1' nowrap='nowrap'><img src='/admin/template/img/icon_add.jpg' width='14' height='16' align='absmiddle' /> <a href='/admin/?path=edit&act=edit_razdel&pid={$_GET['pid']}'>�������������� �������</a></td>";
	//	echo "<td width='1' nowrap='nowrap'><img src='/admin/template/img/icon_add.jpg' width='14' height='16' align='absmiddle' /> <a href='/admin/?path=edit&act=edit_list&pid={$_GET['pid']}'>����������</a></td>";
	//    echo "<td width='1' nowrap='nowrap'><img src='/admin/template/img/icon_add.jpg' width='14' height='16' align='absmiddle' /> <a href='/admin/?path=edit&act=edit_add&pid={$_GET['pid']}'>�������� ������</a></td>";
	//	break;
	
	case "edit":
		echo "<td width='180' width='1' nowrap='nowrap'><img src='/admin/template/img/icon_add.jpg' width='14' height='16' align='absmiddle' /> <a href='/admin/?path=edit&act=edit_razdel&pid={$_GET['pid']}'>�������������� �������</a></td>";
		echo "<td width='120' width='1' nowrap='nowrap'><img src='/admin/template/img/icon_add.jpg' width='14' height='16' align='absmiddle' /> <a href='/admin/?path=edit&act=edit_list&pid={$_GET['pid']}'>����������</a></td>";
		echo "<td width='200' width='1' nowrap='nowrap'><img src='/admin/template/img/icon_add.jpg' width='14' height='16' align='absmiddle' /> <a href='/admin/?path=edit&act=edit_add&pid={$_GET['pid']}'>�������� ������</a></td>";
		break;
	
	default:
		break;
}



/*
                  <td width="1" nowrap="nowrap"><img src="/admin/template/img/icon_add.jpg" width="14" height="16" align="absmiddle" /> <a href="#">�������� �������</a></td>
                  <td><img src="/admin/template/img/icon_add_cat.jpg" width="14" height="14" align="absmiddle" /> <a href="#">�������� ������</a></td>
                  <!-- <td><img src="/admin/template/img/icon_edit.jpg" width="14" height="16" align="absmiddle" /> <a href="#">������������� ������</a></td>
                  <td><img src="/admin/template/img/icon_del.jpg" width="14" height="16" align="absmiddle" /> <a href="#">������� ������</a></td>
                  <td><img src="/admin/template/img/icon_file.jpg" width="16" height="16" align="absmiddle" /> <a href="#">�������</a></td> -->
*/
                  
                  
                  
                  
                  echo '</tr></table>';

?>

