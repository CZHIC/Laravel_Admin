@extends('layouts/main')
@section('content')

<link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/plugins/dataTables/dataTables.bootstrap.css') ?> rel="stylesheet">
<link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/plugins/dataTables/fixedColumns.dataTables.min.css') ?> rel="stylesheet">





<div class = 'div'>
      <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>基本 <small>分类，查找</small></h5>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content">


                                <table class="table table-striped table-bordered table-hover dataTables-example">
                                       
                                </table>

                            </div>
                        </div>
                    </div>
                </div>


</div>    


<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/jquery-2.1.1.min.js') ?> ></script>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/dataTables/jquery.dataTables.js') ?> ></script>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/dataTables/dataTables.bootstrap.js') ?> ></script>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/dataTables/dataTables.fixedColumns.min.js') ?> ></script>





   <script>
        $(document).ready(function () {
            var table =  $('.dataTables-example').dataTable( {
                // "processing": true,  每次都重新请求服务器数据
                // "serverSide": true,
                ajax: {
                        url: '/index.php/stat/register?act=get',
                        dataSrc: ''
                    },

                columns: [
                    { data: 'mdate' ,   "sTitle": "日期" },
                    { data: 'appid' ,   "sTitle": "渠道" },
                    { data: 'gameid',"sTitle": "游戏" },
                    { data: 'phonetype' , "sTitle": "手机分类" },
                    { data: 'item10000' , "sTitle": "每日注册", "sClass": "center" },
                    {
                        data: 'item10001' ,
                        sTitle: "每日成功订单",
                        sClass: "center",
                        "render": function(data, type, row) {
                             // data 当前列的值  type 类型  row 当前行结构体
                            return data + ' ('  +  row['item10012']  +  ')';
                        },
                    },
                    { data: 'item10002' , "sTitle": "手机分类" },
                    { data: 'item10003' , "sTitle": "手机分类" },
                    { data: 'item10004' , "sTitle": "手机分类" },
                    { data: 'item10005' , "sTitle": "手机分类" },
                    { data: 'item10006' , "sTitle": "手机分类" },
                    { data: 'item10007' , "sTitle": "手机分类" },
                    { data: 'item10008' , "sTitle": "手机分类" },
                    { data: 'item10009' , "sTitle": "手机分类" },
                    { data: 'item10010' , "sTitle": "手机分类" },
                    { data: 'item10011' , "sTitle": "手机分类" },
                    { data: 'item10012' , "sTitle": "手机分类" },
                    { data: 'item10015' , "sTitle": "手机分类" },
                    { data: 'item10014' , "sTitle": "手机分类" },
                    { data: 'item10016' , "sTitle": "手机分类" },
                    { data: 'item10058' , "sTitle": "手机分类" },
                    { data: 'item10259' , "sTitle": "手机分类" },
                    { data: 'item10260' , "sTitle": "手机分类" },
                    { data: 'item10261' , "sTitle": "手机分类" },
                    { data: 'item10262' , "sTitle": "手机分类" },
                    { data: 'item10263' , "sTitle": "手机分类" },
                    { data: 'item10264' , "sTitle": "手机分类" },
                    { data: 'item10265' , "sTitle": "手机分类" },
                    { data: 'item10266' , "sTitle": "手机分类" },
                    { data: 'item10267' , "sTitle": "手机分类" },
                    { data: 'item12097' , "sTitle": "手机分类" },
                    { data: 'item12098' , "sTitle": "手机分类" },
                    { data: 'item12300' , "sTitle": "手机分类" },


                ],
                "lengthMenu": [[ 10, 25,50 ], [ 10, 25, 50]],
                "scrollX":   true,   //水平滚动
                // "scrollY": "600px",  // 垂直滚动   和lengthMenu 分页  互斥
                // "paging": false,
                "dom": ' <"toolbar">  <"top"fl<"clear">>rt   <"bottom"ip<"clear">>',  //工具栏排放位置
                 
                "paging":   true,  // 分页开关
                "ordering": true,  // 排序开关
                "info":     true,  // 信息开关
                "fixedColumns" : false,    // 固定第一列   需要  dataTables.fixedColumns.min.js   fixedColumns.dataTables.min.css
                
  
            });  

            // 点击行事件 
            $('.dataTables-example').on( 'click', 'tr', function () {

                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                }
                else {
                    table.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });  



       

            // 添加自定义工具栏
            $("div.toolbar").html("<input type = 'text'   class='primary'   ><button class='btn btn-primary add_server'><span>按钮</span></button>");
            $(".add_server").click(function(){
                alert(124);
            })

            

        });
    </script>



@endsection