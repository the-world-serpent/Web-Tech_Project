var x;
var y;
var a;
var b;

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

function toggle_adminlogedin(){
	a=document.getElementById("nonadmin");
	b=document.getElementById("yesadmin");
	a.style.display="none";
	b.style.display="inline-block";
}
function toggle_adminlogedout(){
	a=document.getElementById("nonadmin");
	b=document.getElementById("yesadmin");
	a.style.display="inline-block";
	b.style.display="none";
}
