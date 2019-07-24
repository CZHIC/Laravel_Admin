@extends('layouts/main')

@section('content')
<link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/plugins/dataTables/dataTables.bootstrap.css') ?> rel="stylesheet">
<link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/plugins/jqgrid/ui.jqgrid.css') ?> rel="stylesheet">
<link href=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/jquery-ui-blue/jquery-ui.css') ?> rel="stylesheet">
<link href=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/layer/skin/layer.css') ?> rel="stylesheet">
<link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/style.css?v=2.2.0') ?> rel="stylesheet">


       
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





<!-- 
 jqGrid 是一个用来显示网格数据的jQuery插件，文档比较全面，附带中文版本。访问 http://www.trirand.com/blog/

jqGrid的主要特点为：

    基于jquery UI主题，开发者可以根据客户要求更换不同的主题
    兼容目前所有流行的web浏览器
    Ajax分页，可以控制每页显示的记录数
    支持XML，JSON，数组形式的数据源
    提供丰富的选项配置及方法事件接口
    支持表格排序，支持拖动列、隐藏列
    支持滚动加载数据
    支持实时编辑保存数据内容
    支持子表格及树形表格
    支持多语言
    免费 -->

<!-- http://jqueryui.com/themeroller/   下载主题
替换两个文件  jquery-ui.css   jquery-ui.js  暂时有两个   jquery-ui-blue   jquery-ui-black    -->     



<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/jquery-2.1.1.min.js') ?> ></script>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/jqgrid/i18n/grid.locale-cn.js') ?> ></script>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/jqgrid/jquery.jqGrid.min.js') ?> ></script>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/jquery-ui-blue/jquery-ui.js') ?> ></script>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/layer/layer.min.js') ?> ></script>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/demo/layer-demo.js') ?> ></script>

<script>
        layer.use('extend/layer.ext.js'); //载入layer拓展模块
</script>

 <!-- Page-Level Scripts -->

 <script>
        $(document).ready(function () {
            var lastsel;
            // Configuration for jqGrid Example 2
            $("#table_list_2").jqGrid({
                url:'/index.php/admin/getrole?act=get',
                datatype: "json",
                mtype : 'get',
                height: 450,
                autowidth: true,
                rowNum: 20,
                rowList: [10, 20, 30],
                colNames: ['ID', '角色名', '权限', '渠道'],
                colModel: [
                    {
                        name: 'id',
                        index: 'id',
                        editable: false,
                        width: 60,
                        sorttype: "int",
                        search: true
                    },
                    {
                        name: 'rolename',
                        index: 'pid',
                        editable: true,
                        align: "center",
                        width: 90,
                        sorttype: "int",
                    },
                   
                    {
                        name: 'privilledges',
                        index: 'privilledges',
                        editable: false,
                        sorttype: "text",
                        align: "center",
                        width : 300,
                       
                    },
                    {
                        name: 'appids',
                        index: 'appids',
                        editable: false,
                        width: 300,
                        align: "right",
                        sorttype: "float"
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
                 afterInsertRow : function(rowid, aData) {   //改变字体颜色
                    switch (aData.rolename) { 
                            case '超级管理员': jQuery("#table_list_2").jqGrid('setCell', rowid, 'rolename', '', { color : 'green' }); break; 
                            case '测试': jQuery("#table_list_2").jqGrid('setCell', rowid, 'rolename', '', { color : 'red' }); break; 
                            case '': jQuery("#table_list_2").jqGrid('setCell', rowid, 'rolename', '', { color : 'blue' }); break; 
                         }
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
                editurl : '/index.php/admin/getrole' ,  // 定义对form编辑时的url
            });

            // Add selection
            $("#table_list_2").setSelection(4, true);


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

        });

     function power(id, name){
        $.layer({   // 【iframe层】
            type: 2,
         //   shift : 'left-top',   靠左显示
            closeBtn: [0, true],
            shadeClose: true,
            title: false,
            shade: [0.8, '#000'],
            border: [0],
            offset: ['20px',''],
            area: ['1000px', ($(window).height() - 50) +'px'],
            iframe: {src: '/index.php/admin/editPower?id=' + id + '&name=' + name}
        }); 
     }

     function power2(id, name){
        $.layer({   // 【iframe层】
            type: 2,
         //   shift : 'left-top',   靠左显示
            closeBtn: [0, true],
            shadeClose: true,
            title: false,
            shade: [0.8, '#000'],
            border: [0],
            offset: ['20px',''],
            area: ['1000px', ($(window).height() - 50) +'px'],
            iframe: {src: '/index.php/admin/editAppid?id=' + id + '&name=' + name}
        }); 
     }



    </script>   
 
  



@endsection