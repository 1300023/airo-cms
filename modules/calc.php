<?php 


$content.= "<h1>����������� ��������� �����</h1>

<h1>������ ��������� �����</h1>

<form action='' method='post' id='frmCreateCheckboxRange' onSubmit='return false;'>


		<div id='formContent'>

			<table width='600' border='0' cellpadding='3' cellspacing=' 'class='tab_border'>
                	<tr>
					
                    <th width='20'>&nbsp;</th>
					<th colspan='2' align='left'>������������</th>

					<th width='88'>���������</th>

					<th width='93'>�����</th>
				</tr>
                
              <tr>
					<td colspan='5' align='center'><h3><br>
				    ����� � �������</h3></td>
			  </tr>

                    	 <tr>

					<td align='center'><input type='checkbox' name='qty_item_1' id='qty_item_1' value='1'></td>
                     <td width='17'><div class='tTip' id='cloud1' title='����������� ������ ������������ ��������� �� ���������. ���� ����������� 12 �������, ����� ���� ��� ����� ����� ���������� ����� �� ����������� 12 �������. �������� ����������� ��� �� ���������� ����, ��� � �� ����������� ����.'><img src='/images/icon_info.gif' width='16' height='16'></div></td>
				   <td width='334'>����� (.ru/���)</td>
				  
				   <td align='center' nowrap id='price_item_1'>500 ���.</td>
					<td align='center' nowrap id='total_item_1'>500 ���.</td>
				</tr>

                
                      	 <tr>

					<td align='center'><input type='checkbox' name='qty_item_1' id='qty_item_1' value='1'></td>
                     <td><div class='tTip' id='cloud2' title='������� � ��� �����, ��� ��������� ����� ������ �����. ������� ��������������� �� 12 �������. �������� � ���� ��������� PHP � MySQL, �����  200 ��������. ������� , ������������ � ����������.'><img src='/images/icon_info.gif' width='16' height='16'></div></td>
				   <td>������� (�� 3 ��/���)</td>
				  
				   <td align='center' nowrap id='price_item_1'>2500 ���.</td>
					<td align='center' nowrap id='total_item_1'>2500 ���.</td>
				</tr>

                
                
    	       <tr>

					<td colspan='5' align='center'><h3><br>
				    ������ �����</h3></td>
			  </tr>
              
              
               	 <tr>
					<td align='center'>
                      <label><input type='radio' name='qty_item_1' id='qty_item_1' value='1'></label>
                   </td>

                   <td><div class='tTip' id='cloud3' title='������� ������ � ������������ ����������. � ������� �������� � �������. '><img src='/images/icon_info.gif' width='16' height='16'></div></td>

				   <td>������� ������</td>
				   
				   <td align='center' nowrap id='price_item_1'>3500 ���.</td>
					<td align='center' nowrap id='total_item_1'>12000 ���..</td>
				</tr>
                   	 <tr>
					<td align='center'>

                      <label><input type='radio' name='qty_item_1' id='qty_item_1' value='1'></label>

                   </td>
                   <td><div class='tTip' id='cloud4' title='��������� ������ � ��� ������ �����, ������������ �� ������ ������-���� ����������� �������.'><img src='/images/icon_info.gif' width='16' height='16'></div></td>
				   <td>��������� ������</td>
				   
				   <td align='center' nowrap id='price_item_1'>7000 ���.</td>
					<td align='center' nowrap id='total_item_1'>12000 ���.</td>
				</tr>

                     	 <tr>

					<td align='center'>
                      <label><input type='radio' name='qty_item_1' id='qty_item_1' value='1'></label>
                   </td>
                   <td><div class='tTip' id='cloud5' title='������������ ������ � ���������� � ����������� ������������� ������ ��� ������ ����� ������������ ������ �� ���������� ���������.'><img src='/images/icon_info.gif' width='16' height='16'></div></td>
				   <td>������������ ������</td>
				   
				   <td align='center' nowrap id='price_item_1'>12000 ���.</td>
					<td align='center' nowrap id='total_item_1'>12000 ���.</td>

				</tr>
                     	 <tr>
                     	   <td align='center'><input type='checkbox' name='qty_item_4' id='qty_item_4' value='1'></td>
                     	   <td><div class='tTip' id='cloud5' title='������� � ���������� �������� ��� ������ ����� ��� �������� (����� ��������� ��� ������ �������, �������� � �� ).'><img src='/images/icon_info.gif' width='16' height='16'></div></td>
                     	   <td>�������</td>
                     	   <td align='center' nowrap id='price_item_1'>6000 ���.</td>
                     	   <td align='center' nowrap id='total_item_1'>6000 ���.</td>

           	           </tr>
                
                
                      <tr>
					<td colspan='5' align='center'><h3><br>
				    ������� �����</h3></td>
			  </tr>
              
                       <tr>
					<td align='center'><input type='text' name='qty_item_pole_4' id='qty_item_4' value='0' size='2'></td>
                    	<td><div class='tTip' id='cloud16' title='������� ������� �������� �����, ������ �� ������. '><img src='/images/icon_info.gif' width='16' height='16'></div></td>

					<td>������� ������</td>
				
					<td align='center' id='price_item_2'>1500 ���.</td>
					<td align='center' id='total_item_2'>1500 ���.</td>
				</tr>
                
               	<tr>
					<td colspan='5' align='center'><h3><br>
				    ��������� �����</h3></td>

			  </tr>



			
                
				<tr>
					<td align='center'><input name='qty_item_1' type='checkbox' id='qty_item_1' value='1' disabled checked></td>
                    <td><div class='tTip' id='cloud6' title='��������� AIR.CMS � ��������� � ��������� ������� ���������� ������. � ��������� ��������������� ����������� � ������������ ������. '><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td><strong>��������� AIR.CMS<br> (���� - ������� ���������� ������)</strong></td>
					
					<td align='center' id='price_item_1'>3500 ���.</td>

					<td align='center' id='total_item_1'>3500 ���.</td>
				</tr>

				<tr>
					<td align='center'><input type='checkbox' name='qty_item_2' id='qty_item_2' value='1'></td>
					<td><div class='tTip' id='cloud7' title='������ ��������� �����. '><img src='/images/icon_info.gif' width='16' height='16'></div></td>
                    <td>�������</td>
					
					<td align='center' id='price_item_2'>1800 ���.</td>

					<td align='center' id='total_item_2'>1800 ���.</td>
				</tr>
                
               <tr>
					<td align='center'><input type='checkbox' name='qty_item_3' id='qty_item_3' value='1'></td>
                    <td><div class='tTip' id='cloud8' title='������ ��������� �������. ���������� ����������� ����� ���������� �������� (WYSIWYG - ���������� �� What You See Is What You Get, ����. ��� ������, �� � ��������.).'><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td>�������</td>
					
					<td align='center' id='price_item_2'>4000 ���.</td>

					<td align='center' id='total_item_2'>4000 ���.</td>
			  </tr>
				
                <tr>
					<td align='center'><input type='checkbox' name='qty_item_4' id='qty_item_4' value='1'></td>
                    <td><div class='tTip' id='cloud9' title='������ �����������. ��������� �������������� �������� ��� �������� �������.'><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td>�����������</td>
					
					<td align='center' id='price_item_2'>4000 ���.</td>

					<td align='center' id='total_item_2'>4000 ���.</td>
				</tr>
                
                            <tr>
					<td align='center'><input type='checkbox' name='qty_item_4' id='qty_item_4' value='1'></td>
                    <td><div class='tTip' id='cloud10' title='������ ��������.'><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td>�������</td>
					
					<td align='center' id='price_item_2'>5000 ���.</td>

					<td align='center' id='total_item_2'>5000 ���.</td>
				</tr>
                
                                          <tr>
					<td align='center'><input type='checkbox' name='qty_item_4' id='qty_item_4' value='1'></td>
                    <td><div class='tTip' id='cloud11' title='������ �������� �����. '><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td>����� �������� �����</td>
					
					<td align='center' id='price_item_2'>1500 ���.</td>

					<td align='center' id='total_item_2'>1500 ���.</td>
				</tr>
                
                 <tr>
					<td align='center'><input type='checkbox' name='qty_item_4' id='qty_item_4' value='1'></td>
                    <td><div class='tTip' id='cloud12' title='������ �������� ��������. �������� ����������� �������� � ��� ��������. '><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td>�������</td>
					
					<td align='center' id='price_item_2'>10000 ���.</td>

					<td align='center' id='total_item_2'>10000 ���.</td>
				</tr>
                
                 <tr>
					<td align='center'><input type='checkbox' name='qty_item_4' id='qty_item_4' value='1'></td>
                    <td><div class='tTip' id='cloud13' title='������ �����-����. '><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td>�����</td>
					
					<td align='center' id='price_item_2'>6000 ���.</td>

					<td align='center' id='total_item_2'>6000 ���.</td>
				</tr>
                
                <tr>
					<td align='center'><input type='checkbox' name='qty_item_4' id='qty_item_4' value='1'></td>
                    <td><div class='tTip' id='cloud14' title='������ ����� ������. '><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td>������</td>
					
					<td align='center' id='price_item_2'>2000 ���.</td>

					<td align='center' id='total_item_2'>2000 ���.</td>
				</tr>
                
                                                <tr>
					<td align='center'><input type='checkbox' name='qty_item_4' id='qty_item_4' value='1'></td>
                    <td><div class='tTip' id='cloud14' title='������ ������&����� (FAQ). '><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td>FAQ</td>
					
					<td align='center' id='price_item_2'>2000 ���.</td>

					<td align='center' id='total_item_2'>2000 ���.</td>
				</tr>
				
                                <tr>
					<td align='center'><input type='checkbox' name='qty_item_4' id='qty_item_4' value='1'></td>
                    <td><div class='tTip' id='cloud14' title='������ �������������� �� ����� �����. '><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td>������ '��������������'</td>
					
					<td align='center' id='price_item_2'>6000 ���.</td>

					<td align='center' id='total_item_2'>6000 ���.</td>
				</tr>
                

               <tr>
					<td colspan='5' align='center'><h3><br>
				    ����� ����������</h3></td>
			  </tr>
                
                
                 <tr>

					<td align='center'><input type='text' name='qty_item_pole_4' id='qty_item_4' value='0' size='2'></td>

                    <td><div class='tTip' id='cloud15' title='��������� �� ������� ����������.'><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td>������� ������ (�������). ���� � ��������� �������� ���������.</td>
					
					<td align='center' id='price_item_2'>80 ���.</td>
					<td align='center' id='total_item_2'>80 ���.</td>
				</tr>
                
                        <tr>

					<td align='center'><input type='text' name='qty_item_pole_4' id='qty_item_4' value='0' size='2'></td>

                    	<td><div class='tTip' id='cloud16' title='��������� �� ������� ����������.'><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td>�������� - ��������� �������� ������� �4</td>
				
					<td align='center' id='price_item_2'>100 ���.</td>
					<td align='center' id='total_item_2'>100 ���.</td>
				</tr>
              
                
              <!--  <tr>
					<td colspan='5' align='center'><h3><br>

				    ������� � �����������</h3></td>
			  </tr>
                
                <tr>
					<td align='center'><input type='checkbox' name='qty_item_4' id='qty_item_4' value='1'></td>
                    <td><div class='tTip' id='cloud17' title='�������. � �������. ������� �� �������? '><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td>����� ����������� '������'</td>
					
					<td align='center' id='price_item_2'>3900 ���.</td>

					<td align='center' id='total_item_2'>3900 ���.</td>
				</tr>
                
                
                <tr>
					<td align='center'><input type='checkbox' name='qty_item_4' id='qty_item_4' value='1'></td>
                    <td><div class='tTip' id='cloud18' title='�������. � �������. ������� �� �������? '><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td>�������� ������ ������.������</td>
					
					<td align='center' id='price_item_2'>3900 ���.</td>

					<td align='center' id='total_item_2'>3900 ���.</td>
				</tr>-->

                
                
				<tr>
					<td colspan='4' align='right'>
						<strong>����� ��������� �������:</strong>

					</td>
					<td align='center' nowrap bgcolor='#99CC00' id='grandTotal' style='color:white;'>

					</td>
				</tr>

			</table>
	  </div>

</form><br>
� ������ ����� ����������� �������� � �������� ������!
";
?>