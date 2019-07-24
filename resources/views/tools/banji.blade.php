@extends('layouts/main')

@section('content')
<link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/plugins/summernote/summernote.css') ?> rel="stylesheet">
<link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/plugins/summernote/summernote-bs3.css') ?> rel="stylesheet">

<div class="wrapper wrapper-content">

               <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>编辑/保存为html代码示例</h5>
                                <button id="edit" class="btn btn-primary btn-xs m-l-sm" onclick="edit()" type="button">编辑</button>
                                <button id="save" class="btn btn-primary  btn-xs" onclick="save()" type="button">保存</button>
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                   
                                  
                                    <a class="close-link">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="ibox-content" id="eg">

                                <div class="click2edit wrapper">
                                    <h3>hello world </h3>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">

                            <div class="ibox-content">

                                <h2>
                                Summernote
                            </h2>
                                <p>
                                    Summernote是一个简单的基于Bootstrap的WYSIWYG富文本编辑器
                                </p>

                                <div class="alert alert-warning">
                                    官方文档请参考：
                                    <a href="http://hackerwins.github.io/summernote/features.html#api">http://hackerwins.github.io/summernote/features.html#api</a>
                                    <!--<div class="summernote">summernote 2</div>-->

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


 <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/jquery-2.1.1.min.js') ?> ></script>
 <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/summernote/summernote.min.js') ?> ></script>
 <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/summernote/summernote-zh-CN.js') ?> ></script>
 <script>
        $(document).ready(function () {

            $('.summernote').summernote({
                lang: 'zh-CN'
            });

        });
        var edit = function () {
            $("#eg").addClass("no-padding");
            $('.click2edit').summernote({
                lang: 'zh-CN',
                focus: true
            });
        };
        var save = function () {
            $("#eg").removeClass("no-padding");
            var aHTML = $('.click2edit').code(); //save HTML If you need(aHTML: array).

            alert('测试：' + aHTML);
            $('.click2edit').destroy();
        };
    </script>


@endsection