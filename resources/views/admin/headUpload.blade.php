@extends('layouts/main')
@section('content')

<link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/plugins/webuploader/webuploader.css') ?> rel="stylesheet">
<link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/demo/webuploader-demo.css') ?> rel="stylesheet">
<link href=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/layer/skin/layer.css') ?> rel="stylesheet">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>百度Web Uploader</h5>
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
                                <div class="page-container">
                                    <p>您可以尝试文件拖拽，使用QQ截屏工具，然后激活窗口后粘贴，或者点击添加图片按钮</p>
                                    <div id="uploader" class="wu-example">
                                        <div class="queueList">
                                            <div id="dndArea" class="placeholder">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <div id="filePicker"></div>
                                                <p>或将照片拖到这里</p>
                                            </div>
                                        </div>
                                        <div class="statusBar" style="display:none;">
                                            <div class="progress">
                                                <span class="text">0%</span>
                                                <span class="percentage"></span>
                                            </div>
                                            <div class="info"></div>
                                            <div class="btns">
                                                <div id="filePicker2"></div>
                                                <div class="uploadBtn">开始上传</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/jquery-2.1.1.min.js') ?> ></script>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/webuploader/webuploader.min.js') ?> ></script>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/demo/webuploader-demo.js') ?> ></script>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/layer/layer.min.js') ?> ></script>
<script>
        // 添加全局站点信息
        var BASE_URL = 'js/plugins/webuploader';
        //  webuploader  的具体参数配置在 webuploader-demo.js中
</script>
@endsection