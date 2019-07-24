@extends('layouts/main')

@section('content')


<div class="ibox-content">
    <div class="row">
            <div class="col-sm-5 m-b-xs">
              <!--  <input class = "input-sm form-control" type=  'text'  id = 'SearchID' placeholder="请输入查询UID:" > -->
            </div>
            <div class="col-sm-4 m-b-xs">
                                      <!--   <div data-toggle="buttons" class="btn-group">
                                            <label class="btn btn-sm btn-white">
                                                <input type="radio" id="option1" name="options">天</label>
                                            <label class="btn btn-sm btn-white active">
                                                <input type="radio" id="option2" name="options">周</label>
                                            <label class="btn btn-sm btn-white">
                                                <input type="radio" id="option3" name="options">月</label>
                                        </div> -->
            </div>
            <div class="col-sm-3">
                <div class="input-group">
                    <input type="text" placeholder="请输入查询UID" class="input-sm form-control"> <span class="input-group-btn">
                    <button type="button" class="btn btn-sm btn-primary"> 搜索</button> </span>
                </div>
        </div>
    </div>    
</div>
 <div class="row">
                            <div class="table-responsive  col-sm-9 m-b-xs">
                                    <table class="table table-striped  table-bordered"  style="font-size: 15px ; text-align:center;">
                                        <thead>
                                            <tr>
                                                <th class = 'col-sm-4 m-b-xs'>说明</th>
                                                <th class = 'col-sm-8 m-b-xs'>详情</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>ID</td>
                                                <td><span class="bg-primary">123456</span>&nbsp;&nbsp;&nbsp;&nbsp;  <input  class = 'btn btn-outline btn-warning'  type = 'button'  value= '点击封号'  ></td>
                                            </tr>
                                            <tr>
                                                <td>SESSID</td>
                                                <td>f079140d88f341fba9dfb848a1aa1824  &nbsp;&nbsp;&nbsp;&nbsp;  
                                                    <input  class = 'btn btn-outline btn-warning'  type = 'button'  value= '让他过期'  >
                                                    <input  class = 'btn btn-outline btn-warning'  type = 'button'  value= '踢下线'  >
                                                 </td>
                                            </tr>
                                             <tr>
                                                <td>用户禁言</td>
                                                <td><input type = 'text' placeholder="正加负减(单位分钟)">
                                                    <input  class = 'btn btn-outline btn-primary'  type = 'button'  value= '未被禁言|点击禁言'  >
                                                </td>
                                            </tr>
                                             <tr>
                                                <td>禁用喇叭</td>
                                                <td><input type = 'text' placeholder="正加负减(单位分钟)">
                                                    <input  class = 'btn btn-outline btn-primary'  type = 'button'  value= '未被禁用|点击禁用'  >
                                                </td>
                                            </tr>
                                             <tr>
                                                <td  style="display:table-cell; vertical-align:middle">头像</td>
                                                <td> <img   class = 'img-circle' style = "height: 150px;width: 150px;"     src = <?=Illuminate\Support\Facades\URL::asset('assets/img/a1.jpg') ?> > </td>
                                            </tr>
                                            <tr>
                                                <td>类型</td>
                                                <td>600</td>
                                            </tr>
                                             <tr>
                                                <td>邮箱绑定</td>
                                                <td><input type = 'text' placeholder="邮箱">
                                                    <input type = 'text' placeholder="密码">
                                                    <input  class = 'btn btn-outline btn-primary'  type = 'button'  value= '绑定'  >
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>设备类型</td>
                                                <td>600</td>
                                            </tr>
                                            <tr>
                                                <td>设备ID</td>
                                                <td>600</td>
                                            </tr>
                                            <tr>
                                                <td>用户名</td>
                                                <td>四脚怪 &nbsp;&nbsp;&nbsp;&nbsp;  <input type = 'text' placeholder="昵称：">
                                                    <input  class = 'btn btn-outline btn-primary'  type = 'button'  value= '修改'  >   </td>
                                            </tr>
                                            <tr>
                                                <td>性别</td>
                                                <td>男</td>
                                            </tr>
                                            <tr>
                                                <td>vip等级</td>
                                                <td>600</td>
                                            </tr>
                                            <tr>
                                                <td>vip到期时间</td>
                                                <td>600
                                                        &nbsp;&nbsp;&nbsp;&nbsp;        
                                                        <input type="radio" checked="" value="option1" id="optionsRadios1" name="optionsRadios">添加
                                                        <input type="radio" value="option2" id="optionsRadios2" name="optionsRadios">减少
                                                        <input type = 'text' placeholder="输入天数">
                                                        <input  class = 'btn btn-outline btn-primary'  type = 'button'  value= '提交'  >

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>一花币</td>
                                                <td>600    &nbsp;&nbsp;&nbsp;&nbsp;        
                                                        <input type = 'text' placeholder="正加，负减">
                                                        <input  class = 'btn btn-outline btn-primary'  type = 'button'  value= '提交'  >
                                                 </td>
                                            </tr>
                                            <tr>
                                                <td>游戏币</td>
                                                <td>600   &nbsp;&nbsp;&nbsp;&nbsp;        
                                                        <input type = 'text' placeholder="正加，负减">
                                                        <input  class = 'btn btn-outline btn-primary'  type = 'button'  value= '提交'  ></td>
                                            </tr>
                                            <tr>
                                                <td>最近购买时间</td>
                                                <td>2019-09-01</td>
                                            </tr>
                                            <tr>
                                                <td>支出</td>
                                                <td>600</td>
                                            </tr>
                                            <tr>
                                                <td>获得筹码</td>
                                                <td>600</td>
                                            </tr>
                                            <tr>
                                                <td>破产次数</td>
                                                <td>600</td>
                                            </tr>
                                            <tr>
                                                <td>最近破产时间</td>
                                                <td>2019-09-01</td>
                                            </tr>
                                                <tr>
                                                <td>经验</td>
                                                <td>600</td>
                                            </tr>
                                            <tr>
                                                <td>赢牌 / 玩牌</td>
                                                <td><a href="#"> 1000 / 2000 (50%)德州  </a> </td>
                                            </tr>
                                            <tr>
                                                <td>注册时间</td>
                                                <td>2019-09-01</td>
                                            </tr>
                                            <tr>
                                                <td>最近离线时间</td>
                                                <td>2019-09-01</td>
                                            </tr>
                                            <tr>
                                                <td>最近登陆时间</td>
                                                <td>2019-09-01</td>
                                            </tr>
                                            <tr>
                                                <td>最近登陆IP</td>
                                                <td>101.136.72.223 中国 台湾  台北</td>
                                            </tr>
                                            <tr>
                                                <td>当前连续登录天数</td>
                                                <td>65</td>
                                            </tr>
                                            <tr>
                                                <td>历史最大连续登录天数</td>
                                                <td>89</td>
                                            </tr>
                                            <tr>
                                                <td>用户appid</td>
                                                <td>繁体（20000）</td>
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
</div>

<div class = "row">
<div class="panel-group  col-sm-9 m-b-xs" id="accordion">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" 
                   href="#collapseOne">
                    订单信息
                </a>
            </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
            <div class="panel-body">
                Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred 
                nesciunt sapiente ea proident. Ad vegan excepteur butcher vice 
                lomo.
            </div>
        </div>
    </div>
    <div class="panel panel-success">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" 
                   href="#collapseTwo">
                    金币变化明细
                </a>
            </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
            <div class="panel-body">
                Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred 
                nesciunt sapiente ea proident. Ad vegan excepteur butcher vice 
                lomo.
            </div>
        </div>
    </div>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" 
                   href="#collapseThree">
                    一花币记录
                </a>
            </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse">
            <div class="panel-body">
                Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred 
                nesciunt sapiente ea proident. Ad vegan excepteur butcher vice 
                lomo.
            </div>
        </div>
    </div>
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" 
                   href="#collapseFour">
                    保险箱记录
                </a>
            </h4>
        </div>
        <div id="collapseFour" class="panel-collapse collapse">
            <div class="panel-body">
                Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred 
                nesciunt sapiente ea proident. Ad vegan excepteur butcher vice 
                lomo.
            </div>
        </div>
    </div>
</div>

</div>    

<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/jquery-2.1.1.min.js') ?> ></script>

<script type="text/javascript">
  
    $(function () { $('#collapseTwo').collapse('hide')});
    $(function () { $('#collapseTwo').collapse('hide')});
    $(function () { $('#collapseThree').collapse('hide')});
    $(function () { $('#collapseOne').collapse('hide')});

    $(function () { 
        $('#collapseOne').on('show.bs.collapse', function () {
            alert('嘿，当您展开时会提示本警告');})
    });
</script>  


@endsection