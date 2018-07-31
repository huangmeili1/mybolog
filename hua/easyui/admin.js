/*function upload(){
	if($('#dd').length>0){
		$('#dd').remove();
	}
	$("#tabcontent").append("<div id='dd'></div>");
	$('#dd').dialog({    
	    title: '导入数据',    
	    width: 400,    
	    height: 60,    
	    closed: false,    
	    cache: false,    
	    modal: true,   
	}); 
	
	    var str="";
	    str+="<form id='ff' method='post' enctype='multipart/form-data'>";
	    str+="<input id='file1' class='easyui-filebox' style='width:300px'>";
	    str+="<input id='up' type='button' value='上传' class='easyui-filebox'>";
	    str+="</form>";
	    $('#dd').append(str);
	    $('#file1').filebox({    
		    buttonText: '选择文件', 
		    buttonAlign: 'right' 
		})
		$('#up').click(function(){
			$('#ff').form('submit', {    
			    url:"sstu?action=import",    
			    onSubmit: function(){    
			        // do some check    
			        // return false to prevent submit;    
			    },    
			    success:function(data){    
			    	$('#dd').dialog("close");
					$('#dg').datagrid("reload");
			    }    
			});  
		});
		
}
function insert(title,utype,data){
	if($('#dd').length>0){
		$('#dd').remove();
	}
	$("#tabcontent").append("<div id='dd'></div>");
	$('#dd').dialog({    
	    title: title,    
	    width: 400,    
	    height: 200,    
	    closed: false,    
	    cache: false,     
	    modal: true,
	    buttons:[{
			text:'保存',
			handler:function(){
				$('#ff').form('submit', {    
				    url:'sstu',   
				    queryParams:{action:utype},
				    onSubmit: function(){    
				        // do some check    
				        // return false to prevent submit;    
				    },    
				    success:function(data){    
				        var data=eval("("+data+")");
				        $.messager.alert('消息',data[0]["mess"]);  
				        $('#dd').dialog("close");
						$('#dg').datagrid("reload");
				    }    
				});  
			}
		},{
			text:'关闭',
			handler:function(){
				$('#dd').dialog("close");
				$('#dg').datagrid("reload");
			}
		}]
	}); 
    var str="";
    str+="<form id='ff' method='post'>";
    str+="<table align='center'>";
    for(var x in data[1]){
    	str+="<tr><td>"+data[0][x]+"</td><td><input id='"+x+"' name='"+x+"' type='text' class='easyui-filebox'></td></tr>";
    }
    str+="<tr><td>学号:</td><td><input id='xh' name='xh' type='text' class='easyui-filebox'></td></tr>";
    str+="<tr><td>姓名:</td><td><input id='name' name='name' type='text' class='easyui-filebox'></td></tr>";
    str+="<tr><td>密码:</td><td><input id='pass' name='pass' type='text' class='easyui-filebox'><input id='id' name='id' type='hidden' class='easyui-filebox'></td></tr>";
    str+="</table>";
    str+="</form>";
    $('#dd').append(str);
    
}
function createhead(){
	var columns=new Array();
	$.ajax({
		type:"post",
		url:"sstu",
		data:{action:"header"},
		dataType:"json",
		 success:function(data){    
		      
		       for(var x in data[0]){
		    	   var column={};
		    	   column["field"]=x;
		    	   column["title"]=data[0][x];
		    	   column["align"]="center";
		    	   columns.push(column);
		       }
		       list(columns);
		    } 
	});
}
function list(columns){
	if($('#dg').length>0){
		$('#dg').remove();
	}
	$("#tabcontent").append("<div id='dg'></div>");
	$('#dg').datagrid({    
	    url:'sstu', 
	    fitColumns:true,
	    singleSelect:true,
	    queryParams:{action:"readata"},
	    pageList:[10,20,30,40,50],
	    pageSize:10,
	    pagination:true,
	    toolbar:[{
			text:'添加',
			iconCls:'icon-add',
			handler:function(){
				insert("添加学生信息","insert");
			}
		},{
			text:'更新',
			iconCls:'icon-edit',
			handler:function(){
				var row=$('#dg').datagrid("getSelected");
				if(row){
				insert("更新学生信息","update");
				$('#ff').form("load",row);
				}else{
					$.messager.alert('消息','请你选择你要更新的行，才能进行更新'); 
				}
			}
		},{
			text:'删除',
			iconCls:'icon-remove',
			handler:function(){
				var row=$('#dg').datagrid("getSelected");
				if(row){
					$.messager.confirm('确认','您确认想要删除记录为:'+row["name"]+'吗？',function(r){    
					    if (r){    
					          $.ajax({
					        	  type:'post',
					        	  url:'sstu',
					        	  data:{action:"del",id:row["id"]},
					        	  datatype:'json',
					        	  success:function(data){    
								        alert(data[0]["mess"]);  
										$('#dg').datagrid("reload");
								    }  
					          });
					    }    
					});  
					
				}else{
					$.messager.alert('警告','请你选择你要删除的行，才能进行删除');
				}
        }
		},{
			text:'导入数据',
			iconCls:'icon-add',
			handler:function(){
				upload();
			}
		},{
			text:'导出数据',
			iconCls:'icon-add',
			handler:function(){
				window.location.href="sstu?action=export";
				}
		}],
	    columns:[columns]    
	});  
}*/
function upload(url){
		if($('#dd').length>0){
			$('#dd').remove();
		}
		$("#tabcontent").append("<div id='dd'></div>");
		$('#dd').dialog({    
		    title: "导入数据",    
		    width: 400,    
		    height: 60,    
		    closed: false,    
		    cache: false,     
		    modal: true,		    
		});  
		
		var str="";
		str+="<form id='ff' method='post' enctype='multipart/form-data'>";
		str+='<input id="file1" name="file1" class="easyui-filebox" style="width:320px"> ';
		str+="<input type='button' id='up' value='上传'>";		
		str+="</form>";
		$('#dd').append(str);
		$('#file1').filebox({    
		    buttonText: '选择文件', 
		    buttonAlign: 'right' 
		})
		
		$("#up").click(function(){
			$('#ff').form('submit', {    
			    url:url+"?action=import",    
			    onSubmit: function(){    
			        // do some check    
			        // return false to prevent submit;    
			    },    
			    success:function(data){    
			    	 $('#dd').dialog('close');
				     $('#dg').datagrid('reload');   
			    }    
			});  

		});

	}
	function save(itype,url){
		$('#ff').form('submit', {    
		    url:url, 
		    queryParams:{action:itype},
		    onSubmit: function(){    
		        // do some check    
		        // return false to prevent submit;    
		    },    
		    success:function(data){ 
		    	var data=eval("("+data+")");
		        alert(data[0]["mess"]); 
		        $('#dd').dialog('close');
		        $('#dg').datagrid('reload');
		    }    
		});  
	}
	function insert(title,itype,data,url){
		if($('#dd').length>0){
			$('#dd').remove();
		}
		$("#tabcontent").append("<div id='dd'></div>");
		$('#dd').dialog({    
		    title: title,    
		    width: 300,    
		    height: 160,    
		    closed: false,    
		    cache: false,     
		    modal: true,
		    buttons:[{
				text:'保存',
				iconCls:'icon-save',
				handler:function(){
					save(itype,url);
				}
			},{
				text:'关闭',
				iconCls:'icon-cancel',
				handler:function(){
					$('#dd').dialog('close');
				}
			}]
		});  
		
		var str="";
		str+="<form id='ff' method='post'>";
		str+="<table border='0' align='center'>";
		for(var x in data[1]){
			if(x=="id"){
				str+="<tr style='display:none'><td>"+data[0][x]+"</td><td><input type='"+data[1][x]+"' id='"+x+"' name='"+x+"' ></td></tr>";
			}else{
				str+="<tr><td>"+data[0][x]+"</td><td><input type='"+data[1][x]+"' id='"+x+"' name='"+x+"' ></td></tr>";
			}
			
		}
//		str+="<tr><td>学号</td><td><input type='text' id='xh' name='xh' ></td></tr>";
//		
//		str+="<tr><td>姓名</td><td><input type='text' id='name' name='name' ></td></tr>";
//		str+="<tr><td>密码</td><td><input type='password' id='pass' name='pass' ><input type='hidden' id='id' name='id' ></td></tr>";
		str+="</table>";
		str+="</form>";
		$('#dd').append(str);
	}
	function createhead(url){
		var columns=new Array();//创建一个数组
		$.ajax({
			type:"post",
			url:url,
			data:{action:"readhead"},
			dataType:"json",
			success:function(data){
				
				for(var x in data[0]){
					var column={};//创建一个js对象
					column["field"]=x;
					column["title"]=data[0][x];
					column["align"]="center";
					columns.push(column);
				}
				initstu(columns,data,url);
			}
		});
	}
	
	function initstu(columns,data,url){
		if($('#dg').length>0){
			$('#dg').remove();
		}
		$("#tabcontent").append("<div id='dg'></div>");
		$('#dg').datagrid({    
		    url:url, 
		    queryParams:{action:"readdata"},
		    fitColumns:true,
		    singleSelect:true,
		    pagination:true,
		    pageSize:10,
		    pageList:[10,20,30,40,50],
		    toolbar: [{
		    	text:"添加",
				iconCls: 'icon-add',
				handler: function(){
					insert("添加学生信息","insert",data,url);
				}
			},'-',{
				text:"更新",
				iconCls: 'icon-edit',
				handler: function(){
					var row=$('#dg').datagrid('getSelected');
					if(row){
						insert("更新学生信息","update",data,url);
						$('#ff').form('load',row);
					}else{
						alert("你没有选择数据行，不能进行更新操作");
					}
				}
			},'-',{
				text:"删除",
				iconCls: 'icon-edit',
				handler: function(){
					var row=$('#dg').datagrid('getSelected');
					if(row){
						$.messager.confirm('确认','您确认想要删除记录吗？',function(r){    
						    if (r){    
						        $.ajax({
						        	type:"post",
						        	url:url,
						        	data:{action:"del",id:row["id"]},
						        	dataType:"json",
						        	success:function(data){
						        		alert(data[0]["mess"]);
						        		$('#dg').datagrid('reload');
						        	}
						        });
						    }    
						});  
					}else{
						alert("你没有选择数据行，不能进行删除操作");
					}
				}
			},'-',{
				text:"导入数据",
				iconCls: 'icon-edit',
				handler: function(){
					upload(url);
				}
			},'-',{
				text:"导出数据",
				iconCls: 'icon-edit',
				handler: function(){
					window.location.href=url+"?action=export";
				}
			}],
		    columns:[columns]    
		});  
	}