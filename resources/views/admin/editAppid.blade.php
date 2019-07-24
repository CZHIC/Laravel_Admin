<?php
$phonetype = [0=>'未选择',1=>'安卓',2=>'IOS',3=>'乐视',4=>'H5'];
$gameArr = array(0=>'全部',1=>'德州',2=>'牛牛',3=>'斗地主',4=>'水果机',7=>'扎金花',8=>'21点',10=>'黑杰克');
?>
<div id="container" class="row-fluid">
    <div id="main-content">
        <div class="container-fluid">
            <div id="page" class="dashboard">
                <div class="widget-title">
                    <h3><i class="icon-reorder"></i>编辑渠道权限</h3>
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
                        <div class="control">
                            <div><input type="checkbox"  id="pidAll" name="pidAll"  onclick="selectCheckAll($(this).is(':checked'));"><label style="color: black">全渠道</label>
                            <span style="color: #aa0000">    (一个都不选,默认全渠道!) </span>
                            </div>
                            <hr>
                            <?php
                            foreach ($data['channel'] as $key => $value) { ?>
                                <div>
                                    <input type="checkbox" id="game_<?=$key?>" name="game" value="<?=$key?>" onclick="selectGameAll($(this).is(':checked'), <?=$key?>);"><label style="color: black"><?=$gameArr[$key]?>
                                        <a href="javascript:showHideNavs(<?=$key?>);" >▼</a></label></br>
                                    <label class="labelhide_<?=$key?>" >
                                        <?php foreach ($value as $k => $v) { ?>
                                        <div >
                                            <input type="checkbox" id="phonetype_<?=$k?>" name="game_<?=$key?>[]" value="<?=$k?>" onclick="selectPhoneAll($(this).is(':checked'), <?=$key?>, <?=$k?>);"><label style="color: #9B410E"><?=$phonetype[$k]?>=></label>
                                            <?php foreach ($v as $channel) {
                                                if ($channel['status']==1) {
                                                    ?>
                                                <input type="checkbox" checked="checked" id="channel_<?=$channel['id']?>"  sname="channelcos" name="channel_<?=$key?>_<?=$k?>[]" value="<?=$channel['id']?>" ><label style="color: #1982d1"><?=$channel['text']?></label>
                                                <?php } else { ?>
                                                <input type="checkbox"  id="channel_<?=$channel['id']?>" sname="channelcos" name="channel_<?=$key?>_<?=$k?>[]" value="<?=$channel['id']?>" ><label style="color: #1982d1"><?=$channel['text']?></label>
                                                <?php } ?>
                                            <?php }
                                        } ?>
                                        </div>
                                </div>
                                </label>
                                <hr>
                            <?php } ?>
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
        });
        var showHideNavs = function (id) {
            $('.labelhide_'+ id).toggle('slow');
        };
        function saveData(){
            var rid = $("#roleid").val();
            var rname = $("#jse").val();
            var json='';
            var str='input:checkbox[sname=channelcos]:checked';
            $(str).each(function(i){
                json += parseInt($(this).val()) + ",";
            });
            json = json.substring(0,json.length-1);
            $.ajax({
                url:'/index.php/admin/editAppid',
                type:'get',
                data:{'act':'addRole', 'appid':json, 'id':rid, 'rolename':rname},
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
     
        function selectCheckAll(flag){
            var jsondata=<?php echo json_encode($channelall); ?>;
            $("input[name='game']").prop("checked",flag);
            for(var game in jsondata){
                $("input[name='game_"+game+"[]']").prop("checked",flag);
                var gameArr = jsondata[game];
                for(var phoneType in gameArr){
                    $("input[name='channel_"+game+"_" +phoneType+"[]']").prop("checked",flag);
                }
            }
        }

        function selectGameAll(flag, gid){
            var jsondata=<?php echo json_encode($channelall); ?>;
            $("input[name='game_"+gid+"[]']").prop("checked",flag);
            for(var phoneType in jsondata[gid]) {
                $("input[name='channel_"+gid+"_" +phoneType+"[]']").prop("checked",flag);
            }
        }

        function selectPhoneAll(flag, gid, phoneType){
            $("input[name='channel_"+gid+"_" +phoneType+"[]']").prop("checked",flag);
        }

    </script>