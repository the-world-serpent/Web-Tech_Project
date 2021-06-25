var x;
var y;

function toggle_logedin(){
	x=document.getElementById("div1");
	y=document.getElementById("div2");
	x.style.display="none";
	y.style.display="block";
}

function toggle_logedout(){
	x=document.getElementById("div1");
	y=document.getElementById("div2");
	x.style.display="block";
	y.style.display="none";
}
