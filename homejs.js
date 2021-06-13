var shade = [];
shade[0]="shadow GREEN";
shade[1]="shadow YELLOW";
shade[2]="shadow RED";
var i=0;
CHANGE();
function CHANGE()
{
 document.getElementById("head").className=shade[i];
 ++i;
 if(i==3)i=0;
 setTimeout(CHANGE,1500);
}