<?php 


$content.= "<h1>Калькулятор стоимости услуг</h1>

<h1>Оценка стоимости сайта</h1>

<form action='' method='post' id='frmCreateCheckboxRange' onSubmit='return false;'>


		<div id='formContent'>

			<table width='600' border='0' cellpadding='3' cellspacing=' 'class='tab_border'>
                	<tr>
					
                    <th width='20'>&nbsp;</th>
					<th colspan='2' align='left'>Наименование</th>

					<th width='88'>Стоимость</th>

					<th width='93'>Сумма</th>
				</tr>
                
              <tr>
					<td colspan='5' align='center'><h3><br>
				    Домен и хостинг</h3></td>
			  </tr>

                    	 <tr>

					<td align='center'><input type='checkbox' name='qty_item_1' id='qty_item_1' value='1'></td>
                     <td width='17'><div class='tTip' id='cloud1' title='Регистрация домена производится полностью на заказчика. Срок регистрации 12 месяцев, после чего вам будет нужно продлевать домен на последующие 12 месяцев. Возможна регистрация как на Физическое лицо, так и на Юридическое лицо.'><img src='/images/icon_info.gif' width='16' height='16'></div></td>
				   <td width='334'>Домен (.ru/год)</td>
				  
				   <td align='center' nowrap id='price_item_1'>500 Руб.</td>
					<td align='center' nowrap id='total_item_1'>500 Руб.</td>
				</tr>

                
                      	 <tr>

					<td align='center'><input type='checkbox' name='qty_item_1' id='qty_item_1' value='1'></td>
                     <td><div class='tTip' id='cloud2' title='Хостинг – это место, где находятся файлы вашего сайта. Хостинг предоставляется на 12 месяцев. Включает в себя поддержку PHP и MySQL, объём  200 мегабайт. Быстрый , качественный и безопасный.'><img src='/images/icon_info.gif' width='16' height='16'></div></td>
				   <td>Хостинг (до 3 Гб/год)</td>
				  
				   <td align='center' nowrap id='price_item_1'>2500 Руб.</td>
					<td align='center' nowrap id='total_item_1'>2500 Руб.</td>
				</tr>

                
                
    	       <tr>

					<td colspan='5' align='center'><h3><br>
				    Дизайн сайта</h3></td>
			  </tr>
              
              
               	 <tr>
					<td align='center'>
                      <label><input type='radio' name='qty_item_1' id='qty_item_1' value='1'></label>
                   </td>

                   <td><div class='tTip' id='cloud3' title='Простой дизайн – элементарное оформление. С простой графикой и цветами. '><img src='/images/icon_info.gif' width='16' height='16'></div></td>

				   <td>Простой дизайн</td>
				   
				   <td align='center' nowrap id='price_item_1'>3500 Руб.</td>
					<td align='center' nowrap id='total_item_1'>12000 Руб..</td>
				</tr>
                   	 <tr>
					<td align='center'>

                      <label><input type='radio' name='qty_item_1' id='qty_item_1' value='1'></label>

                   </td>
                   <td><div class='tTip' id='cloud4' title='Шаблонный дизайн – это дизайн сайта, нарисованный на основе какого-либо бесплатного шаблона.'><img src='/images/icon_info.gif' width='16' height='16'></div></td>
				   <td>Шаблонный дизайн</td>
				   
				   <td align='center' nowrap id='price_item_1'>7000 Руб.</td>
					<td align='center' nowrap id='total_item_1'>12000 Руб.</td>
				</tr>

                     	 <tr>

					<td align='center'>
                      <label><input type='radio' name='qty_item_1' id='qty_item_1' value='1'></label>
                   </td>
                   <td><div class='tTip' id='cloud5' title='Эксклюзивный дизайн – Уникальный и эксклюзивно разработанный дизайн для вашего сайта нарисованный исходя из требований заказчика.'><img src='/images/icon_info.gif' width='16' height='16'></div></td>
				   <td>Эксклюзивный дизайн</td>
				   
				   <td align='center' nowrap id='price_item_1'>12000 Руб.</td>
					<td align='center' nowrap id='total_item_1'>12000 Руб.</td>

				</tr>
                     	 <tr>
                     	   <td align='center'><input type='checkbox' name='qty_item_4' id='qty_item_4' value='1'></td>
                     	   <td><div class='tTip' id='cloud5' title='Логотип – Разработка логотипа для вашего сайта или компании (можно применять при печати визиток, буклетов и тд ).'><img src='/images/icon_info.gif' width='16' height='16'></div></td>
                     	   <td>Логотип</td>
                     	   <td align='center' nowrap id='price_item_1'>6000 Руб.</td>
                     	   <td align='center' nowrap id='total_item_1'>6000 Руб.</td>

           	           </tr>
                
                
                      <tr>
					<td colspan='5' align='center'><h3><br>
				    Верстка сайта</h3></td>
			  </tr>
              
                       <tr>
					<td align='center'><input type='text' name='qty_item_pole_4' id='qty_item_4' value='0' size='2'></td>
                    	<td><div class='tTip' id='cloud16' title='Верстка шаблона страницы сайта, исходя из макета. '><img src='/images/icon_info.gif' width='16' height='16'></div></td>

					<td>Верстка макета</td>
				
					<td align='center' id='price_item_2'>1500 Руб.</td>
					<td align='center' id='total_item_2'>1500 Руб.</td>
				</tr>
                
               	<tr>
					<td colspan='5' align='center'><h3><br>
				    Структура сайта</h3></td>

			  </tr>



			
                
				<tr>
					<td align='center'><input name='qty_item_1' type='checkbox' id='qty_item_1' value='1' disabled checked></td>
                    <td><div class='tTip' id='cloud6' title='Платформа AIR.CMS – Платформа и интерфейс системы управления сайтом. К платформе разрабатываются стандартные и эксклюзивные модули. '><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td><strong>Платформа AIR.CMS<br> (Ядро - Система Управления Сайтом)</strong></td>
					
					<td align='center' id='price_item_1'>3500 Руб.</td>

					<td align='center' id='total_item_1'>3500 Руб.</td>
				</tr>

				<tr>
					<td align='center'><input type='checkbox' name='qty_item_2' id='qty_item_2' value='1'></td>
					<td><div class='tTip' id='cloud7' title='Модуль новостной ленты. '><img src='/images/icon_info.gif' width='16' height='16'></div></td>
                    <td>Новости</td>
					
					<td align='center' id='price_item_2'>1800 Руб.</td>

					<td align='center' id='total_item_2'>1800 Руб.</td>
				</tr>
                
               <tr>
					<td align='center'><input type='checkbox' name='qty_item_3' id='qty_item_3' value='1'></td>
                    <td><div class='tTip' id='cloud8' title='Модуль контентых страниц. Содержимое управляется через Визуальный редактор (WYSIWYG - сокращение от What You See Is What You Get, англ. что видишь, то и получишь.).'><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td>Контент</td>
					
					<td align='center' id='price_item_2'>4000 Руб.</td>

					<td align='center' id='total_item_2'>4000 Руб.</td>
			  </tr>
				
                <tr>
					<td align='center'><input type='checkbox' name='qty_item_4' id='qty_item_4' value='1'></td>
                    <td><div class='tTip' id='cloud9' title='Модуль фотогалереи. Возможена автоматическая подгонка под требуемы размеры.'><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td>Фотогалерея</td>
					
					<td align='center' id='price_item_2'>4000 Руб.</td>

					<td align='center' id='total_item_2'>4000 Руб.</td>
				</tr>
                
                            <tr>
					<td align='center'><input type='checkbox' name='qty_item_4' id='qty_item_4' value='1'></td>
                    <td><div class='tTip' id='cloud10' title='Модуль каталога.'><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td>Каталог</td>
					
					<td align='center' id='price_item_2'>5000 Руб.</td>

					<td align='center' id='total_item_2'>5000 Руб.</td>
				</tr>
                
                                          <tr>
					<td align='center'><input type='checkbox' name='qty_item_4' id='qty_item_4' value='1'></td>
                    <td><div class='tTip' id='cloud11' title='Модуль обратной связи. '><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td>Форма обратной связи</td>
					
					<td align='center' id='price_item_2'>1500 Руб.</td>

					<td align='center' id='total_item_2'>1500 Руб.</td>
				</tr>
                
                 <tr>
					<td align='center'><input type='checkbox' name='qty_item_4' id='qty_item_4' value='1'></td>
                    <td><div class='tTip' id='cloud12' title='Модуль Интернет Магазина. Возможно подключение интернет и смс платежей. '><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td>Магазин</td>
					
					<td align='center' id='price_item_2'>10000 Руб.</td>

					<td align='center' id='total_item_2'>10000 Руб.</td>
				</tr>
                
                 <tr>
					<td align='center'><input type='checkbox' name='qty_item_4' id='qty_item_4' value='1'></td>
                    <td><div class='tTip' id='cloud13' title='Модуль прайс-лист. '><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td>Прайс</td>
					
					<td align='center' id='price_item_2'>6000 Руб.</td>

					<td align='center' id='total_item_2'>6000 Руб.</td>
				</tr>
                
                <tr>
					<td align='center'><input type='checkbox' name='qty_item_4' id='qty_item_4' value='1'></td>
                    <td><div class='tTip' id='cloud14' title='Модуль ленты статей. '><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td>Статьи</td>
					
					<td align='center' id='price_item_2'>2000 Руб.</td>

					<td align='center' id='total_item_2'>2000 Руб.</td>
				</tr>
                
                                                <tr>
					<td align='center'><input type='checkbox' name='qty_item_4' id='qty_item_4' value='1'></td>
                    <td><div class='tTip' id='cloud14' title='Модуль Вопрос&Ответ (FAQ). '><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td>FAQ</td>
					
					<td align='center' id='price_item_2'>2000 Руб.</td>

					<td align='center' id='total_item_2'>2000 Руб.</td>
				</tr>
				
                                <tr>
					<td align='center'><input type='checkbox' name='qty_item_4' id='qty_item_4' value='1'></td>
                    <td><div class='tTip' id='cloud14' title='Модуль многоязычности на вашем сайте. '><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td>Модуль 'Многоязычности'</td>
					
					<td align='center' id='price_item_2'>6000 Руб.</td>

					<td align='center' id='total_item_2'>6000 Руб.</td>
				</tr>
                

               <tr>
					<td colspan='5' align='center'><h3><br>
				    Объем наполнения</h3></td>
			  </tr>
                
                
                 <tr>

					<td align='center'><input type='text' name='qty_item_pole_4' id='qty_item_4' value='0' size='2'></td>

                    <td><div class='tTip' id='cloud15' title='Стоимость за единицу наполнения.'><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td>Каталог товара (позиция). Фото и текстовое описание продукции.</td>
					
					<td align='center' id='price_item_2'>80 Руб.</td>
					<td align='center' id='total_item_2'>80 Руб.</td>
				</tr>
                
                        <tr>

					<td align='center'><input type='text' name='qty_item_pole_4' id='qty_item_4' value='0' size='2'></td>

                    	<td><div class='tTip' id='cloud16' title='Стоимость за единицу наполнения.'><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td>Страница - Текстовая страница формата А4</td>
				
					<td align='center' id='price_item_2'>100 Руб.</td>
					<td align='center' id='total_item_2'>100 Руб.</td>
				</tr>
              
                
              <!--  <tr>
					<td colspan='5' align='center'><h3><br>

				    Реклама и Продвижение</h3></td>
			  </tr>
                
                <tr>
					<td align='center'><input type='checkbox' name='qty_item_4' id='qty_item_4' value='1'></td>
                    <td><div class='tTip' id='cloud17' title='Облачко. С текстом. Неужели не понятно? '><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td>Пакет продвижения 'НАЧАЛО'</td>
					
					<td align='center' id='price_item_2'>3900 Руб.</td>

					<td align='center' id='total_item_2'>3900 Руб.</td>
				</tr>
                
                
                <tr>
					<td align='center'><input type='checkbox' name='qty_item_4' id='qty_item_4' value='1'></td>
                    <td><div class='tTip' id='cloud18' title='Облачко. С текстом. Неужели не понятно? '><img src='/images/icon_info.gif' width='16' height='16'></div></td>
					<td>Пилотный проект Яндекс.Директ</td>
					
					<td align='center' id='price_item_2'>3900 Руб.</td>

					<td align='center' id='total_item_2'>3900 Руб.</td>
				</tr>-->

                
                
				<tr>
					<td colspan='4' align='right'>
						<strong>Итого стоимость проекта:</strong>

					</td>
					<td align='center' nowrap bgcolor='#99CC00' id='grandTotal' style='color:white;'>

					</td>
				</tr>

			</table>
	  </div>

</form><br>
В данный моент калькулятор работает в тестовом режиме!
";
?>