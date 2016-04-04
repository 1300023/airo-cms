//tree.js
var ElementById;
if( document.getElementById )
    ElementById = new Function("id", "return document.getElementById(id)");
else if( document.all )
    ElementById = new Function("id", "return document.all[id]");
function ToggleVisibility(id)
{
    if( !ElementById )
        return;
    var el = ElementById(id+"_tree");
    var img = ElementById(id+"_img");
    if( el.style.display == "none" )
    {
        el.style.display = "";
        var pos = img.src.lastIndexOf("nvsbl");
        img.src = img.src.substr(0, pos) + "vsbl" + img.src.substr(pos + 5);
    }
    else
    {
        el.style.display = "none";
        var pos = img.src.lastIndexOf("vsbl");
        img.src = img.src.substr(0, pos) + "nvsbl" + img.src.substr(pos + 4);
    }
}
var selected;
function SetSel(el)
{
    open( el.href, el.target );
    if( selected ) selected.className = "";
    selected = el;
    selected.className = "selected";
}
