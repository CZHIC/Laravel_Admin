@extends('layouts/main')
@section('content')
<link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/plugins/dataTables/dataTables.bootstrap.css') ?> rel="stylesheet">
<link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/plugins/jqgrid/ui.jqgrid.css') ?> rel="stylesheet">
<link href=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/jquery-ui-blue/jquery-ui.css') ?> rel="stylesheet">
 <div class = 'row'>      
    <div class="wrapper wrapper-content  animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>jqGrid  --  ESC退出编辑 / ENTER提交编辑</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="jqGrid_wrapper">
                                    <table id="table_list_2"></table>
                                    <div id="pager_list_2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>



<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/jquery-2.1.1.min.js') ?> ></script>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/jqgrid/i18n/grid.locale-cn.js') ?> ></script>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/jqgrid/jquery.jqGrid.min.js') ?> ></script>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/jquery-ui-blue/jquery-ui.js') ?> ></script>
<script>
        $(document).ready(function () {
            var lastsel;
            // Configuration for jqGrid Example 2
            $("#table_list_2").jqGrid({
                url:'/index.php/config/goods?act=get',
                datatype: "json",
                mtype : 'get',
                toolbar : [ true, "top" ] , //增加工具栏
                height: 700,
                autowidth: true,
                shrinkToFit: false,
                rowNum: 50,
                rowList: [20, 50, 100],
                colNames: ['ID', '渠道', '商品名称' ,  '商品类型', '商品数量' , '支付类型' , '价格' , '赠送类型' , '赠送数量' , '状态' , '是否月卡' , '平台商品编号' , '提示语' , '图片' , '道具id' , '是否买一送一'],
                colModel: [
                    {
                        name: 'id',
                        index: 'id',
                        width: 60,
                        sorttype: "int",
                        search: true,
                        align: "center",
                    },
                    {
                        name: 'appid',
                        index: 'appid',
                        editable: true,
                        align: "center",
                        width: 160,
                        sorttype: "int",
                        search: true,
                        edittype : "select", formatter:'select',  editoptions : {value : "{{$data['channel']}}"},
                    },
                    
                    {
                        name: 'gname',
                        index: 'gname',
                        editable: true,
                        width: 120,
                        sorttype: "float",
                        align: "center",
                        search: true,
                       
                    },
                    {
                        name: 'type',
                        index: 'type',
                        editable: true,
                        width: 120,
                        sorttype: "float",
                        align: "center",
                        search: true,
                        edittype : "select", formatter:'select',  editoptions : {value : "0 :金币 ;1 :一花币  ;2:道具"},
                    },
                    {
                        name: 'num',
                        index: 'num',
                        editable: true,
                        width: 80,
                        align: "center",
                        sorttype: "int",
                        formatter: "int",
                        search: true,
                    },
                    {
                        name: 'ptype',
                        index: 'ptype',
                        editable: true,
                        width: 80,
                        sorttype: "float",
                        align: "center",
                        search: true,
                        edittype : "select", formatter:'select',  editoptions : {value : "0 :金币 ;1 :一花币  ;2:道具 ; 3:人名币"},
                    },
                    {
                        name: 'price',
                        index: 'price',
                        editable: true,
                        width: 80,
                        sorttype: "float",
                        align: "center",
                        search: true,
                    },
                    {
                        name: 'addtype',
                        index: 'addtype',
                        editable: true,
                        width: 80,
                        sorttype: "float",
                        align: "center",
                        search: true,
                        edittype : "select", formatter:'select',  editoptions : {value : "0 :金币 ;1 :一花币  ;2:道具 ; 100:无"},
                    },
                    {
                        name: 'addnum',
                        index: 'addnum',
                        editable: true,
                        width: 80,
                        sorttype: "float",
                        align: "center",
                        search: true,
                    },
                    {
                        name: 'status',
                        index: 'status',
                        editable: true,
                        width: 120,
                        sorttype: "float",
                        align: "center",
                        search: true,
                        edittype : "select", formatter:'select',  editoptions : {value : "0 :正常 ;1 :禁用  ;2:新人折扣 ; 3:每周特卖"},
                    },
                    {
                        name: 'mcard',
                        index: 'mcard',
                        editable: true,
                        width: 80,
                        search: true,
                        sorttype: "float",
                        align: "center",
                        edittype : "select", formatter:'select',  editoptions : {value : "0 :否 ;1 :是 "},
                    },
                    {
                        name: 'siteno',
                        index: 'siteno',
                        editable: true,
                        width: 80,
                        sorttype: "float",
                        align: "center",
                        search: true,
                    },
                    {
                        name: 'bestvalue',
                        index: 'bestvalue',
                        editable: true,
                        width: 80,
                        sorttype: "float",
                        align: "center",
                        search: true,
                    },
                    {
                        name: 'pic',
                        index: 'pic',
                        editable: true,
                        width: 80,
                        sorttype: "float",
                        align: "center",
                        search: true,
                        formatter: alarmFormatter,
                    },
                    {
                        name: 'propid',
                        index: 'propid',
                        editable: true,
                        width: 80,
                        sorttype: "float",
                        align: "center",
                        search: true,
                    },
                    {
                        name: 'isdouble',
                        index: 'isdouble',
                        editable: true,
                        width: 80,
                        sorttype: "float",
                        align: "center",
                        search: true,
                        edittype : "select", formatter:'select',  editoptions : {value : "0 :否 ;1 :是 "},
                    },
                ],
                onSelectRow : function(id) { if (id && id !== lastsel) { 
                    jQuery('#table_list_2').jqGrid('restoreRow', lastsel); 
                    jQuery('#table_list_2').jqGrid('editRow', id, true); 
                    lastsel = id; } 
                },    // 直接编辑模式

                beforeRequest : function() {   //编辑开始前事件
                    console.log('begin');
                },
                loadComplete : function(xhr) { //当从服务器返回响应时执行，xhr：XMLHttpRequest 对象,  貌似对 editurl 无效
                    console.log(xhr);
                },
                gridComplete : function() { //当表格所有数据都加载完成而且其他的处理也都完成时触发此事件，排序，翻页同样也会触发此事件
                    console.log('finish');
                },
                loadError : function(xhr,status,error) { //如果请求服务器失败则调用此方法。xhr：XMLHttpRequest 对象；satus：错误类型，字符串类型；error：exception对象
                    console.log(error);
                },

                postData : {test:'test' , test2:'test2'},  // 此数组内容直接赋值到url上，参数类型：{name1:value1…}
                pager: "#pager_list_2",
                viewrecords: true,
                caption: "jqGrid 示例2",
                emptyrecords : "还没有数据。。。",
                add: true,
                edit: true,
                addtext: 'Add',
                edittext: 'Edit',
                hidegrid: false,
                loadui : 'block',
                index  : 'uid' , //设置索引字段
                editurl : '/index.php/config/goods' ,  // 定义对form编辑时的url
            });

            // Setup buttons
            $("#table_list_2").jqGrid('navGrid', '#pager_list_2', {
                edit: false,  // false 关闭下面功能图标，阻止弹框模式
                add: true,
                del: true,
                search: true
            }, {
                height: 200,
                reloadAfterSubmit: true
            });
            // Add responsive to jqGrid
            $(window).bind('resize', function () {
                var width = $('.jqGrid_wrapper').width();
                $('#table_list_2').setGridWidth(width);
            });

           // 添加工具栏
            $("#t_table_list_2") .append(
                    "<input  id = 'search'  type='button' value='生成配置' style='height:20px;font-size:-3'/>"
             ); 
            $("#search").click(function() { 
                alert("Hi! I'm added button at this toolbar of top"); 
            });

            //显示图片
            function alarmFormatter(cellvalue, options, rowdata) {
                return ' <img src="' +rowdata.pic+ '" id="img' + rowdata.Id + '"  style="width:50px;height:50px;" />';
            }



        });


       



    </script>   
 
@endsection