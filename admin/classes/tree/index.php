<style>
.td{text-align:left}
</style>
<?include "../admin/dbopen.php";

require('tree.php');

$sql="SELECT * FROM MCGroup as g1 , MCPGroup as g2, maincatalog as m
WHERE g1.ID_MCGroup=m.ID_MCGroup AND g2.ID_MCPGroup=m.ID_MCPGroup
ORDER by g1.MCGSort, g2.MCPGSort, Sort ";
$res=mysql_query($sql);
$tree=Array();

while($rec=mysql_fetch_array($res))
{

	if($idg1!=$rec['ID_MCGroup']){
	array_push($tree,array("text"=>$rec['MCGroup'],
	"unfolded"=>true,
	"notselectable"=>true,
	"href"=>"",
	"subtree"=>gettree($rec['ID_MCGroup'])));
	}

	if($idg2!=$rec['ID_MCPGroup']){}
	
	$idg1=$rec['ID_MCGroup'];
	$idg2=$rec['ID_MCPGroup'];
}
function gettree($id){
$g=Array();
$sql="SELECT * FROM MCGroup as g1 , MCPGroup as g2, maincatalog as m
WHERE g1.ID_MCGroup=m.ID_MCGroup AND g2.ID_MCPGroup=m.ID_MCPGroup AND g1.ID_MCGroup=$id
ORDER by g1.MCGSort, g2.MCPGSort, Sort";

$res=mysql_query($sql);
while($rec=mysql_fetch_array($res))
	{
	 if($idg1!=$rec['ID_MCPGroup']){
	 array_push($g,array("text"=>$rec['MCPGroup'],	"notselectable"=>true,"href"=>"","subtree"=>gettreep($rec['ID_MCPGroup'])));
	 }
	 $idg1=$rec['ID_MCPGroup'];
	}

return $g;
}

function gettreep($id){
$gp=Array();
$sql="SELECT * FROM MCGroup as g1 , MCPGroup as g2, maincatalog as m
WHERE g1.ID_MCGroup=m.ID_MCGroup AND g2.ID_MCPGroup=m.ID_MCPGroup AND m.ID_MCPGroup=$id
ORDER by g1.MCGSort, g2.MCPGSort, Sort";
$res=mysql_query($sql);
while($rec=mysql_fetch_array($res)) array_push($gp,array("text"=>$rec['Device'],"href"=>""));
return $gp;
}


//echo $tree;

/*$tree = Array(
    Array("text"=>"Node1", "unfolded"=>true, "icon"=>"folder2.gif", "subtree"=>Array(
            Array("text"=>"Leaf1", "icon"=>"file2.gif"),
            Array("text"=>"Leaf2")
        )
    ),
    Array("text"=>"LeafC"),
    Array("text"=>"Node2", "subtree"=>Array(
            Array("text"=>"Node21", "subtree"=>Array(
                    Array("text"=>"LeafD"),
                    Array("text"=>"Node211 long long long", "subtree"=>Array(
                            Array("text"=>"LeafA"),
                            Array("text"=>"LeafB", "icon"=>"file2.gif")
                        )
                    )
                )
            ),
            Array("text"=>"Node22", "subtree"=>Array(
                    Array("text"=>"Leaf5"),
                    Array("text"=>"Leaf6")
                )
            ),
            Array("text"=>"Leaf7")
        )
    )
);*/

//foreach($tree as $k=>$v) echo "$k=>$v<br>";

$param = Array(
    "nodeImg"=>"node.gif",
    "leafImg"=>"leaf.gif",
    "lastLeafImg"=>"",
    "vlineImg"=>"",
    "emptyImg"=>"",
    "imgWidth"=>16,
    "imgHeight"=>16,
    "leafIcon"=>"",
    "nodeIcon"=>"",
    "target"=>"right"
);

OutputTree( $tree, $param );

?>
