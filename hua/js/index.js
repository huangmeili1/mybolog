var div1=document.getElementById("div1");
            var div2=document.getElementById("div2");
            var div3=document.getElementById("div3");
            var div4=document.getElementById("div4");
            var div5=document.getElementById("div5");
    $(function () {          
            $(".dropdown-menu").on('click', function (e) {
                e.stopPropagation();
            });
             $("#button1").on('click',function(e){
             	div2.style.display='none';
           	    div3.style.display='none';
           	    div4.style.display='none';
           	    div5.style.display='none';
				var varl=div1.style.display;
				if(varl=='none'){
					div1.style.display='block';
				}else{
					div1.style.display='none';
				}
           });
           $("#button2").on('click',function(e){
           	    div1.style.display='none';
           	    div3.style.display='none';
           	    div4.style.display='none';
           	    div5.style.display='none';
				var varl=div2.style.display;
				if(varl=='none'){
					div2.style.display='block';
				}else{
					div2.style.display='none';
				}
           });
           $("#button3").on('click',function(e){
           	    div1.style.display='none';
           	    div2.style.display='none';
           	    div4.style.display='none';
           	    div5.style.display='none';
				var varl=div3.style.display;
				if(varl=='none'){
					div3.style.display='block';
				}else{
					div3.style.display='none';
				}
           });
           $("#button4").on('click',function(e){
           	    div1.style.display='none';
           	    div3.style.display='none';
           	    div2.style.display='none';
           	    div5.style.display='none';
				var varl=div4.style.display;
				if(varl=='none'){
					div4.style.display='block';
				}else{
					div4.style.display='none';
				}
           }); 
           $("#button5").on('click',function(e){
           	    div1.style.display='none';
           	    div3.style.display='none';
           	    div2.style.display='none';
           	    div4.style.display='none';
				var varl=div5.style.display;
				if(varl=='none'){
					div5.style.display='block';
				}else{
					div5.style.display='none';
				}
           });

       });