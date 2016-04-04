<table width="100%" cellpadding="0" cellspacing="0" border="0" class="menu">
        	
        	
        	{section name=co loop=$menu}
        	
        	 <tr style="padding: 0px 0px 10px 0px;">
                	<td width="10"></td>
                	<td style="padding: 0px 0px 0px 0px;"><!--<img src="{$templates_patch}images/menu_knopka1.jpg" width="12" height="12" border="0" style="padding-right:8px;">--></td>
                	<td colspan="2" style="padding: 0px 0px 0px 5px;"><a href="{$menu[co].eng_name}"><strong>{$menu[co].name}</strong></a></td>
             </tr>
            
             <tr>
             <td colspan="3">
             
             <table border="0" width="194"><!-- -{$menu[co].podmenu[co1].eng_name} -->
             
              {section name=co1 loop=$menu[co].podmenu}
               <tr>
             <td nowrap="nowrap" style="padding: 0px 0px 0px 50px;"><!--<img src='{$templates_patch}images/menu_knopka2.jpg'>--> <a href='{$menu[co].podmenu[co1].eng_name}'>{$menu[co].podmenu[co1].name}</a></tr>
             </tr>
             

             
               {section name=co2 loop=$menu[co].podmenu[co1].podmenu}
                <tr>
             <td style="padding: 0px 0px 0px 60px;"><!--<img src='{$templates_patch}images/menu_knopka2.jpg'>--> <a href='{$menu[co].podmenu[co1].podmenu[co2].eng_name}'>{$menu[co].podmenu[co1].podmenu[co2].name}</a></tr>
             </tr>
             
        
           {section name=co3 loop=$menu[co].podmenu[co1].podmenu[co2].podmenu}
                <tr>
             <td style="padding: 0px 0px 0px 70px;"><a href='{$menu[co].podmenu[co1].podmenu[co2].podmenu[co3].eng_name}'>{$menu[co].podmenu[co1].podmenu[co2].podmenu[co3].name}</a></tr>
             </tr>
             
         
             
               {/section}
         
             
               {/section}
             {/section}
                  <!-- <tr>
            <td colspan="4"><img src='{$templates_patch}images/razdelitel_menu.jpg'></td>
             </tr> -->
             </table>
           
             </td>
             </tr>  
             {/section} 
        	
        	
            	
            </table> 