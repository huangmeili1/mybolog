function upload(){
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
			    url:"susers?action=import",    
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
function insert(title,utype){
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
				    url:'susers',   
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
    str+="<tr><td>姓名:</td><td><input id='name' name='name' type='text' class='easyui-filebox'></td></tr>";
    str+="<tr><td>密码:</td><td><input id='pass' name='pass' type='text' class='easyui-filebox'><input id='id' name='id' type='hidden' class='easyui-filebox'></td></tr>";
    str+="</table>";
    str+="</form>";
    $('#dd').append(str);
    
}
function list(){
	if($('#dg').length>0){
		$('#dg').remove();
	}
	$("#tabcontent").append("<div id='dg'></div>");
	$('#dg').datagrid({    
	    url:'susers', 
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
					        	  url:'susers',
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
				window.location.href="susers?action=export";
				}
		}],
	    columns:[[    
	        {field:'id',title:'编号'},     
	        {field:'name',title:'姓名'},
	        {field:'pass',title:'密码'} 
	    ]]    
	});  
}