
<div id="container" class="row-fluid">
    <div id="main-content">
        <div class="container-fluid">
            <div id="page" class="dashboard">
                <div class="widget-title">
                    <h3><i class="icon-reorder"></i>添加新角色</h3>
                    <span class="tools">
                        <a href="#" class="icon-plus" id="version_add"></a>
                        <a href="#" class="icon-chevron-down" id="version_togger"></a>
                        </span>
                </div>
<div style="margin:5px 8px; margin-left:8px; margin-right:8px;">
     <form style="margin-left: 10px; margin-top:20px;">
        <div > 
          <label>角色名:&nbsp; 
             <input id="jse"  style="width:200px;" placeholder="请输入角色名" value="<?php echo empty($data['rolename']) ? '' : $data['rolename'];?>" />
              <button  style="color:blue" type="button" class="btn  btn-primary" onclick="saveData()"><i class="icon-ok"></i> 保存</button>
          </label>
        </div>
        <hr style="height:1px; width:99%;"  />
        <div>
          <label>角色权限配置:&nbsp;&nbsp; 
            <input type="checkbox"  id="selectAll"> &nbsp;全选 &nbsp;&nbsp;<span style="color:red;"></span>
          </label>
        </div>
     </form>
     <table class="table  table-bordered table-hover" >
        <tbody id="privill_list"></tbody>
     </table>
     <input id="roleid" type="hidden" value="<?php echo $data['id'];?>" /> 
    </div>
    </div>
        </div>
    </div>


<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/jquery-2.1.1.min.js') ?> ></script>

<script type="text/javascript">
$(function(){
    var rid = $("#roleid").val();
    $('#selectAll').click(function(){
        if(this.checked){ //全选
            $(":checkbox").prop('checked', true);
            $(":checkbox").attr('checked', true);
        } else {//全不选
            $(":checkbox").attr('checked', false);
        }
    });
    //数据初始化
    getList({'act':'editRole'}, rid);
});

function saveData(){
     var rowid='', json='{'; 
     var len = $("#privill_list .leader").length;
     var rid = $("#roleid").val();
     var rname = $("#jse").val();
     var json='';

    for (var i=0; i < len; i += 1){
        var sum = 0;
        var str='input:checkbox[name=spCodeId'+ i + ']:checked';
        rowid = '#select'+ i;
        pid = parseInt($(rowid + " .leader").val());
        if( $(rowid + " .leader").attr('checked')){
            json += pid + ",";
        }

        $(str).each(function(i){
            json += parseInt($(this).val()) + ",";
        });
    }
     if (rname == '') return alert('请输入角色名！');
     if (json == '{') return alert('请配置角色权限！');
     json = json.substring(0,json.length-1);
    $.ajax({
        url:'/admin/editPower',
        type:'get',
        data:{'act':'addRole', 'privill':json, 'id':rid, 'rolename':rname},
        dataType:'json',
        success:function(resp) {
            if (resp.code == 0) {
               alert(resp.msg);
            } else {
                alert( "保存失败");
            }
        }
      });    
}
//全选或全不选一行
function choose(id, em){
    if(em.checked){ //全选
        $(id + " :checkbox").prop('checked', true);
        $(id + " :checkbox").attr("checked",true);
    } else {//全不选
        $(id + " :checkbox").attr('checked', false);
    }
    allchk();
}
//某行行内操作
function rowchk(id){
    var chknum = $(id + " :checkbox:not(.leader)").size();//行选项总个数
    var chk = 0;
    $(id + " :checkbox:not(.leader)").each(function () {
        if($(this).attr("checked") == 'checked'){
            chk++;
        }
    });
   // (chknum==chk) ? $(id + " .leader").attr("checked",true) : $(id + " .leader").attr("checked",false);
    (chknum==chk || chk > 0) ? $(id + " .leader").attr("checked",true) : $(id + " .leader").attr("checked",false);
    allchk();
}
function allchk(){
    var chknum = $("#history_list :checkbox").size();//选项总个数
    var chk = 0;
    $("#history_list :checkbox").each(function () {
        if($(this).attr("checked") == 'checked'){
            chk++;
        }
    });
    if(chknum==chk){//全选
        $('#selectAll').attr("checked",true);
        $('#selectAll').prop("checked",true);
    }else{//不全选
        $('#selectAll').attr("checked",false);
    }
}
//获取用户的权限列表 
//flag:0-新增角色  1-获取用户已有的角色  
function getList(data, rid){
    console.log(data);
    if (rid != 0) data.id = rid;
    var rname = $("#jse").val();
    $.ajax({
        url:'/admin/editPower',
        type:'get',
        data:{act:data.act,'id':rid, 'rolename':rname},
        dataType:'json',
        success:function(resp) {
            if (resp) {
                var html = '<tr><th style="width:20%;text-align:center;">一级菜单</th><th style="width:80%;text-align:center;">二级菜单</th></tr>';
                var rowIndex = 0, rowId = '';  //行ID
                resp.forEach(function (d) {
                    rowId = 'select' + rowIndex;
                    html += '<tr id="' + rowId + '">';
                    html += '  <td><input type="checkbox" value="' + d.item_id + '" class="leader"        onclick="choose(\'#' + rowId + '\',this)"/>&nbsp;' + d.item_name + '</td>';
                    html += '  <td>';
                    if(d.children){
                        d.children.forEach(function (f) {
                            if (parseInt(f.item_status) == 0) {
                                html += '<input type="checkbox" value="' + f.item_val + '"  name="spCodeId'+ rowIndex +'"   onclick="rowchk(\'#' + rowId + '\')"/>&nbsp;' + f.item_name + '&nbsp;&nbsp;';
                            } else {
                                html += '<input type="checkbox" value="' + f.item_val + '"  name="spCodeId'+ rowIndex +'"  onclick="rowchk(\'#' + rowId + '\')" checked="checked"/>&nbsp;' + f.item_name + '&nbsp;&nbsp;';
                            }
                        });
                    }

                    html += '  </td>';
                    html += '</tr>';
                    rowIndex++;
                });

                $('#privill_list').html(html);
                for (var i = 0; i < resp.length; i += 1) {
                    rowId = 'select' + i;
                    rowchk('#' + rowId);
                }
            }
        }
    });   
}
</script>