function check(i){
		var brith1=document.getElementById("brith"+i);
		brith1.style.display='none';
		var bb=document.getElementById("b"+i);
		bb.style.display='block';
		var thumbnail=document.getElementById("thumbnail"+i);
		thumbnail.style.border='1px solid  gainsboro';
	}
	function check1(i){
		var brith1=document.getElementById("brith"+i);
		brith1.style.display='block';
		var bb=document.getElementById("b"+i);
		bb.style.display='none';
		var thumbnail=document.getElementById("thumbnail"+i);
		thumbnail.style.border='0';
	}
	function lou(page,mess){
	var zz=document.getElementById("zz");
	var z1=document.getElementById("z1");
	var z2=document.getElementById("z2");
	var z3=document.getElementById("z3");
	if(mess=='销量'){
		zz.style.color="dimgrey";
		z1.style.color="orangered";
		z2.style.color="dimgrey";
		z3.style.color="dimgrey";
	}else if(mess=='价格'){
		zz.style.color="dimgrey";
		z1.style.color="dimgrey";
		z2.style.color="orangered";
		z3.style.color="dimgrey";
	}else if(mess=='最新'){
		zz.style.color="dimgrey";
		z1.style.color="dimgrey";
		z2.style.color="dimgrey";
		z3.style.color="orangered";
	}
		$("#main").load(page);
	}
	
	function lop(page){
	   $("#main").load(page);
	}