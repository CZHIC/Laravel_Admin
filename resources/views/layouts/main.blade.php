<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta name="csrf-token" content="{!! csrf_token() !!}"/>
    <title>用户管理</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

    <link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/bootstrap.min.css?v=3.4.0') ?> rel="stylesheet">
    <link href=<?=Illuminate\Support\Facades\URL::asset('assets/font-awesome/css/font-awesome.css?v=4.3.0') ?> rel="stylesheet">
    <link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/plugins/morris/morris-0.4.3.min.css') ?> rel="stylesheet">

    <link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/animate.css') ?> rel="stylesheet">
    <link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/style.css?v=2.2.0') ?> rel="stylesheet">
     
</head>

<body class="fixed-navigation">
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="nav-header">

                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?=Illuminate\Support\Facades\URL::asset("{$data['admin']['headimg']}") ?>" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
                                <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{$data['admin']['username']}}</strong>
                             </span>  <span class="text-muted text-xs block">管理员 <b class="caret"></b></span> </span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="/index.php/admin/headUpload">修改头像</a>
                                </li>
                                <li><a href="/index.php/admin/contacts">联系我们</a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="/index.php/login">安全退出</a>
                                </li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            H+
                        </div>

                    </li>
                   
                    @foreach( $data['menu'] as $k=>$v) 
                          <li>
                                <a href="index.html#"><i class="{{$v['menuVal']}}"></i> <span class="nav-label">{{$v['menuName']}}</span> <span class="fa arrow"></span></a>
                            @if(isset($v['child'])) 
                                <ul class="nav nav-second-level">
                                    @foreach($v['child'] as $vs)
                                        <li><a href="{{$vs['menuUrl']}}">{{$vs['menuName']}}</a>
                                    @endforeach
                                </ul>    
                            @endif   
                         </li>     
                    @endforeach    

                   

                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                        <form role="search" class="navbar-form-custom" method="post" action="/index.php/admin/searchResults">
                            <div class="form-group">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="text" placeholder="请输入您需要查找的内容 …" class="form-control" name="top-search" id="top-search">
                            </div>
                        </form>
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <li>
                            <span class="m-r-sm text-muted welcome-message"><a href="index.html" title="返回首页"><i class="fa fa-home"></i></a>欢迎使用CZC后台主题</span>
                        </li>
                      
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="index.html#">
                                <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.html">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> 您有16条未读消息
                                            <span class="pull-right text-muted small">4分钟前</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <a href="profile.html">
                                        <div>
                                            <i class="fa fa-qq fa-fw"></i> 3条新回复
                                            <span class="pull-right text-muted small">12分钟钱</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="notifications.html">
                                            <strong>查看所有 </strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>


                        <li>
                            <a href="login.html">
                                <i class="fa fa-sign-out"></i> 退出
                            </a>
                        </li>
                    </ul>

                </nav>
            </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>{{$data['rl']}}</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="">{{$data['sl']}}</a>
                        </li>
                        <li class="active">
                            <strong>{{$data['rl']}}</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>


           
            <div class="contright">
                            @yield('content')
            </div>
            <br><br>
            <div class="footer">
                <div class="pull-right">
                    By：<a href="http://www.czc123.top" target="_blank">CZC</a>
                </div>
                <div>
                    <strong>Copyright</strong> &copy; 2019
                </div>
            </div>

        </div>
    </div>
    <!-- Mainly scripts -->
    <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/bootstrap.min.js?v=3.4.0') ?> ></script>
    <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/metisMenu/jquery.metisMenu.js') ?> ></script>
    <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') ?> ></script>

    <!-- Flot -->

    <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/flot/jquery.flot.js') ?> ></script>
    <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/flot/jquery.flot.tooltip.min.js') ?> ></script>
    <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/flot/jquery.flot.spline.js') ?> ></script>
    <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/flot/jquery.flot.resize.js') ?> ></script>
    <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/flot/jquery.flot.pie.js') ?> ></script>
    <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/flot/jquery.flot.pie.js') ?> ></script>
    <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/flot/curvedLines.js') ?> ></script>


    <!-- Peity -->

    <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/peity/jquery.peity.min.js') ?> ></script>
    <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/demo/peity-demo.js') ?> ></script>

    <!-- Custom and plugin javascript -->
    <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/hplus.js?v=2.2.0') ?> ></script>
    <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/pace/pace.min.js') ?> ></script>

    <!-- jQuery UI -->
    <!-- Jvectormap -->
    <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?> ></script>
    <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?> ></script>

    <!-- EayPIE -->
    <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/easypiechart/jquery.easypiechart.js') ?> ></script>

    <!-- Sparkline -->
    <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/sparkline/jquery.sparkline.min.js') ?> ></script>

    <!-- Sparkline demo data  -->
    <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/demo/sparkline-demo.js') ?> ></script>
    <script>
        $(document).ready(function () {
            $('.chart').easyPieChart({
                barColor: '#f8ac59',
                //                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            $('.chart2').easyPieChart({
                barColor: '#1c84c6',
                //                scaleColor: false,
                scaleLength: 5,
                lineWidth: 4,
                size: 80
            });

            var d1 = [
                [1262304000000, 1],
                [1264982400000, 100],
                [1267401600000, 1],
                [1270080000000, 200],
                [1272672000000, 1],
                [1275350400000, 100],
                [1277942400000, 1],
                [1280620800000, 300]
            ];
            var d2 = [
                [1262304000000, 100],
                [1264982400000, 1],
                [1267401600000, 150],
                [1270080000000, 1],
                [1272672000000, 230],
                [1275350400000, 1],
                [1277942400000, 150],
                [1280620800000, 10]
            ];

            var data3 = [
                {
                    label: "Data 1",
                    data: d1,
                    color: '#23c6c8'
                },
                {
                    label: "Data 2",
                    data: d2,
                    color: '#1ab394'
                }
            ];
            $.plot($("#flot-chart3"), data3, {
                xaxis: {
                    tickDecimals: 0
                },
                series: {
                    lines: {
                        show: true,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 1
                            }, {
                                opacity: 1
                            }]
                        },
                    },
                    curvedLines: {
                        active: true,
                        fit: true,
                        apply: true
                    },
                    points: {
                        width: 0.1,
                        show: false
                    },
                },
                grid: {
                    show: false,
                    borderWidth: 0
                },
                legend: {
                    show: false,
                }
            });


            var mapData = {
                "US": 298,
                "SA": 200,
                "DE": 220,
                "FR": 540,
                "CN": 120,
                "AU": 760,
                "BR": 550,
                "IN": 200,
                "GB": 120,
            };

            $('#world-map').vectorMap({
                map: 'world_mill_en',
                backgroundColor: "transparent",
                regionStyle: {
                    initial: {
                        fill: '#e4e4e4',
                        "fill-opacity": 0.9,
                        stroke: 'none',
                        "stroke-width": 0,
                        "stroke-opacity": 0
                    }
                },

                series: {
                    regions: [{
                        values: mapData,
                        scale: ["#1ab394", "#22d6b1"],
                        normalizeFunction: 'polynomial'
                    }]
                },
            });
        });
    </script>

     <script>
            //For all the post method
            $.ajaxSetup({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
            });
    </script>


</body>

</html>
