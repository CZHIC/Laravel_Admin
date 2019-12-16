@extends('layouts/main')

@section('content')
<link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/plugins/dataTables/dataTables.bootstrap.css') ?> rel="stylesheet">
<link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/plugins/jqgrid/ui.jqgrid.css') ?> rel="stylesheet">
<link href=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/jquery-ui-blue/jquery-ui.css') ?> rel="stylesheet">
       
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


 <!-- Page-Level Scripts -->

 <script>
        $(document).ready(function () {
            var lastsel;
            // Configuration for jqGrid Example 2
            $("#table_list_2").jqGrid({
                url:'/admin/getprivilledge?act=get',
                datatype: "json",
                mtype : 'get',
                height: 450,
                autowidth: true,
                shrinkToFit: true,
                rowNum: 20,
                rowList: [10, 20, 50],
                colNames: ['菜单ID', '父级菜单', '菜单ICON', '菜单名称', '路由', '排序'],
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
                        name: 'pid',
                        index: 'pid',
                        editable: true,
                        align: "center",
                        width: 90,
                        sorttype: "int",
                    },
                    {
                        name: 'menuVal',
                        index: 'menuVal',
                        editable: true,
                        width: 100,
                        edittype : "select",editoptions : {
                            value : "glyphicon glyphicon-picture      : 图片 ;\
                                     glyphicon glyphicon-cloud        :  ☁️; \
                                     glyphicon glyphicon-envelope     :  ✉️; \
                                     glyphicon glyphicon-home         :  🏠; \
                                     glyphicon glyphicon-pencil       :  ✏️; \
                                     glyphicon glyphicon-glass        :  🍷; \
                                     glyphicon glyphicon-music        :  🎵; \
                                     glyphicon glyphicon-search       :  🔍; \
                                     glyphicon glyphicon-heart        :  ❤️; \
                                     glyphicon glyphicon-star         :  ✨; \
                                     glyphicon glyphicon-star-empty   :  🌟; \
                                     glyphicon glyphicon-user         :  👮‍♀️ ; \
                                     glyphicon glyphicon-th-large     :  大方格; \
                                     glyphicon glyphicon-th           :  小方格; \
                                     glyphicon glyphicon-ok           :  👌; \
                                     glyphicon glyphicon-remove       :  ❌; \
                                     fa fa-bar-chart-o                :  📈; \
                                     glyphicon glyphicon-lock         :  🔒; \
                                     glyphicon glyphicon-headphones   :  🎧; \
                                     glyphicon glyphicon-qrcode       :  二维码; \
                                     glyphicon glyphicon-font         :  A; \
                                     glyphicon glyphicon-bold         :  B; \
                                     glyphicon glyphicon-tint         :  💧; \
                                     glyphicon glyphicon-plane        :  ✈️; \
                                     fa fa-comments                   :  聊天; \
                                     glyphicon glyphicon-wrench       :  🔧; \
                                     glyphicon glyphicon-paperclip    :  别针; \
                                     glyphicon glyphicon-link         :  🔗; \
                                     glyphicon glyphicon-usd          :  💲; \
                                     glyphicon glyphicon-phone-alt    :  ☎️; \
                                     glyphicon glyphicon-cloud-download     :  云下载; \
                                     glyphicon glyphicon-cloud-upload       :  云上传; \
                                     glyphicon glyphicon-tree-conifer       :  🌲; \
                                     glyphicon glyphicon-tree-deciduous     :  🌲2; \
                                     glyphicon glyphicon-cog          :  ⚙️; \
                                     glyphicon glyphicon-road         :  马路; \
                                     glyphicon glyphicon-trash        :  删除  \
                                    "},
                    },
                    {
                        name: 'menuName',
                        index: 'menuName',
                        editable: true,
                        width: 80,
                        align: "right",
                        sorttype: "float",
                       
                    },
                    {
                        name: 'menuUrl',
                        index: 'menuUrl',
                        editable: true,
                        width: 80,
                        align: "right",
                        sorttype: "float"
                    },
                    {
                        name: 'sort',
                        index: 'sort',
                        editable: true,
                        width: 80,
                        align: "center",
                        sorttype: "int",
                        formatter: "int",
                        search: true
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
                editurl : '/admin/getprivilledge' ,  // 定义对form编辑时的url
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



    </script>   
 
  



@endsection