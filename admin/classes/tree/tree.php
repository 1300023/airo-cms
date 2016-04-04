//tree.php
<?
function OutputTree( &$tree, &$param, $idPrefix = "Tree", $level = 0 )
{

    foreach( $param as $name=>$value )
        $$name = &$param[$name];
    
    if( $level == 0 )
    {
        echo '<SCRIPT src="tree.js" type="text/javascript"></SCRIPT>';
        echo '<STYLE>a.selected {background-color:lightgrey}</STYLE>';
    }
    
    $idNumber = 1;

    echo '<TABLE cellspacing=0 cellpadding=0 border=0 align="left">';
    
    foreach( $tree as $n=>$item )
    {
        foreach( $item as $name=>$value ) 
        {
            $vname = 'item'.$name;
            $$vname = &$item[$name];
        }
        $isLast = $n + 1 == count($tree);
        $id = $idPrefix.'_'.($idNumber++);
        
        echo "<TR>";
        
        echo '<TD';
        if( !$itemsubtree )
        {
            echo " width=${imgWidth}px background=\"".($isLast ? $lastLeafImg : $leafImg).'">';
            echo '<DIV style=';
            echo "\"width:${imgWidth}px;height:{$imgHeight}px;overflow:hidden\"></DIV>";
        }
        else
        {
            echo '>';
            echo "<IMG src=\"nvsbl$nodeImg\" id=\"${id}_img\" border=0";
            echo " width=${imgWidth}px height=${imgHeight}px";
            echo " onclick=\"ToggleVisibility(&quot;$id&quot;)\"";
            echo '>';
        }
        
        echo '<TD><TABLE cellspacing=0 cellpadding=0 border=0><TR>';
        
        $icon = @$itemicon;
        if( !$icon )
            $icon = !@$itemsubtree ? $leafIcon : $nodeIcon;
        echo "<TD width=${imgWidth}px background=\"$icon\">";

        echo "<DIV style=\"width:${imgWidth}px;height:{$imgHeight}px;overflow:hidden\"></DIV>";
        echo "<TD width=100% nowrap>";
        echo "<DIV style=\"height:{$imgHeight}px;overflow:hidden;\">";
        if( @$itemhref )
        {
            echo "<A href=\"$itemhref\" target=\"$target\"";
            if( !@$itemnotselectable )
                echo " onclick=\"SetSel(this)\"";
            echo '> ';
        }
        echo $itemtext;
        if( @$itemhref )
            echo ' </A>';
        echo '</DIV>';
        
        echo '</TABLE>';
        
        if( @$itemsubtree )
        {
            echo "<TR id=\"${id}_tree\" style=\"display:None;\">";
            echo '<TD ';
            if( !$isLast )
                echo " background=\"$vlineImg\"";
            echo '><TD width=100%>';
            OutputTree( $itemsubtree, $param, $id, $level + 1 );
        }
        foreach( $item as $name=>$value ) 
        {
            $name = 'item'.$name;
            unset($$name);
        }
    }
    echo '</TABLE>';
}
?>
