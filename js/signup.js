var x;
var y;

function check(){
	x=document.getElementById("password");
	y=document.getElementById("r_password");
	if(x.value==y.value){
		return true;
	}else{
		alert("please retype password");
		return false;
	}	
}
