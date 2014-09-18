/*
Developed under a Research grant from NMEICT, MHRD
by
Amrita CREATE (Center for Research in Advanced Technologies for Education),
VALUE (Virtual Amrita Laboratories Universalizing Education)
Amrita University, India 2009 - 2013
http://www.amrita.edu/create
*/


var Hablen;
var Runlen;
var Estab;
var Disperse;
var pop_gr;
var No,k;
var x=0;
var increment=0;
var Incr=0;
var array_Len=Hablen;
var array_x=new Array();
var Disp;
var SimName="Spread of a pest population - population invasion";
var arr_val=[[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[]];
var incr=0;
var Hab= Array(array_Len);
var New_hab= Array(array_Len);
var Arr_position=new Array();
function showValue(newValue)
{
	document.getElementById("range").innerHTML=newValue;
}
// fn to get value from the field.
function get_values() 
{
	if((Hablen!="")&&(No!="")&&(pop_gr!="")&&(Runlen!="") )
		{
			
			Hablen=document.getElementById("LOH").value;<!--length of the habitat through which the organisms spread in km.-->
			Runlen=document.getElementById("NOY").value;<!--number of years you want to simulate.-->
			Estab=document.getElementById("ESTD").value;<!--number of individuals needed to establish a new population.-->
			Disp=document.getElementById("DR").value*0.1;<!--proportion of the population that disperses each year.-->
			pop_gr =document.getElementById("PGR").value; <!--population growth rate for discrete growth-->
			No=document.getElementById("IPP").value; <!--number of individuals in the population at the beginning of the simulation.-->
			array_Len=Hablen;
			Hab= Array(array_Len);
			New_hab= Array(array_Len);
						
			Disperse=Disp.toFixed(1);
			
		for(var i=0;i<array_Len;i++)
			{
				Hab[i]=0;
				New_hab[i]=0;
			}
		}
		else
		{
			// if the data is not available...
			alert("Error in input value");
		}
		Incr++;
}
//fn for formula calculation
function calculation()
{

	Hab[0]=No;
	incr ++;
	this["Edge"+incr]=["1"];
	for (var t=1; t<=Runlen; t++) 
	{
		Arr_position.splice(0,Arr_position.length);
		

		for (var j=0; j<array_Len; j++) 
		{
			Hab[j]=pop_gr*Hab[j];
			//document.writeln("Hab::"+Hab[j]+" j:"+j);
		}
	 	New_hab[0]=((1-Disperse)+ Disperse/2)*Hab[0]+(Disperse/2)*Hab[1];
		
		//Replace New_Hab[1] to Hablen-1 by below mentioned equation
		for (var p=1; p<array_Len-1; p++) 
		{
			var tmp1=(Disperse/2)*Hab[p-1];
	
			New_hab[p]=(Disperse/2)*Hab[p-1]+(1-Disperse)*Hab[p]+(Disperse/2)*Hab[p+1];
	
	}
		//Replace New_Hab[N] with below mentioned equation
		New_hab[array_Len-1]=((1-Disperse)+Disperse/2)*Hab [array_Len-1]+(Disperse/2)*Hab[array_Len-2];
		
		//Replace Hab with New_Hab
		for (var q=0; q<array_Len; q++)
		{
			Hab[q]=New_hab[q];
		}
		//Pushing the less than value's positions to POS Array
		for (var r=0; r<array_Len; r++) 
		{
				//alert("Hab::"+Hab[3]);
			if (Hab[r]<Estab) 
			{
				Arr_position.push(r+1);
			}
		}
			//Push the minimum value from POS ARR to Edge Arr
			if (Arr_position.length>0) 
				//alert("Arr_pos::"+Arr_position);
			{
				//arr_val.push(Arr_position[0]);
				this["Edge"+incr].push(Arr_position[0]);
			
			}
		
}
}
//fn to draw graph using calculated values.
function draw_graph()
{

	get_values();
	calculation();
	 var ar_length=this["Edge"+incr].length;
	var a=0;
	var b=1;
	for(var w=0;w<=500;w++)
	{
		var tmp;
		array_x.push(w);
		
	}
	
for(k=0;k<Runlen;k++)
	{
	
		var array1=[array_x[k],this["Edge"+incr][k]];
		arr_val[Incr].push(array1);
	
	}
	var  plot=$.plot($("#GraphArea"), [arr_val],
	{
		grid: 
		{
			hoverable: true, clickable: true
		},
	
	});
	
		plot.setData(arr_val);
		plot.setupGrid();
		plot.draw();
}
//fn to disply plain graph.
function Load()
{
 $.plot($("#GraphArea"), [ [] ]);	
}
function Reset()
{

arr_val=[[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[],[]];
$.plot($("#GraphArea"), [ [] ]);	
document.getElementById("LOH").value=100;
document.getElementById("NOY").value=50;
document.getElementById("ESTD").value=10;
document.getElementById("DR").value=2;
document.getElementById("PGR").value=4;
document.getElementById("IPP").value=50;
document.getElementById("range").innerHTML=2;
showValue(2)
}
//fn to show tool tip in graph
$(function () {
 function showTooltip(x, y, contents) {
        $('<div id="tooltip">' + contents + '</div>').css( {
            position: 'absolute',
            display: 'none',
            top: y + 5,
            left: x + 5,
            border: '1px solid #fdd',
            padding: '2px',
            'background-color': '#fee',
            opacity: 0.80
        }).appendTo("body").fadeIn(200);
    }

    var previousPoint = null;
    $("#GraphArea").bind("plothover", function (event, pos, item) {
        $("#x").text(pos.x.toFixed(2));
        $("#y").text(pos.y.toFixed(2));

  
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;
                    
                    $("#tooltip").remove();
                    var x = item.datapoint[0].toFixed(2),
                        y = item.datapoint[1].toFixed(2);
                    
                    showTooltip(item.pageX, item.pageY," X:" + x + " and Y:" + y);
                }
            
            else {
                $("#tooltip").remove();
                previousPoint = null;            
            }
        
    });

    $("#GraphArea").bind("plotclick", function (event, pos, item) {
        
    });
	    });

//  Restrict input box values (only digits and negative sign)
function onlyNumbers(evt)
{ 	
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
  key = String.fromCharCode(key);
  //alert(key);
  var regex = /[0-9]/;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;	
    if(theEvent.preventDefault) theEvent.preventDefault();
  }	 
	 
}
