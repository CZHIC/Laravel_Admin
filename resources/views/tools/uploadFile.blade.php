@extends('layouts/main')
@section('content')

<link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/plugins/dropzone/basic.css') ?> rel="stylesheet">
<link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/plugins/dropzone/dropzone.css') ?> rel="stylesheet">
<link href=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/layer/skin/layer.css') ?> rel="stylesheet">

            <div class="wrapper wrapper-content animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>文件上传</h5>
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
                                <form id="my-awesome-dropzone" class="dropzone" action="/tools/uploadfile">
                                    <div class="dropzone-previews"></div>
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <button type="submit" class="btn btn-primary pull-right">提交</button>
                                </form>
                                <div>
                                    <div class="m"><small>DropzoneJS是一个开源库，提供拖放文件上传与图片预览：<a href="https://github.com/enyo/dropzone" target="_blank">https://github.com/enyo/dropzone</a></small>，百度前端团队提供的<a href="http://fex.baidu.com/webuploader/" target="_blank">Web Uploader</a>也是一个非常不错的选择，值得一试！</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/jquery-2.1.1.min.js') ?> ></script>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/dropzone/dropzone.js') ?> ></script>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/layer/layer.min.js') ?> ></script>
<script>
        layer.use('extend/layer.ext.js'); //载入layer拓展模块
</script>
<script>
    $(document).ready(function () {

        Dropzone.autoDiscover = false;
        $("#my-awesome-dropzone").dropzone({
            url: "/tools/uploadfile", //必须填写
            method:"post",  //也可用put
            paramName:"file", //默认为file
            maxFiles:10,//一次性上传的文件数量上限
            maxFilesize: 20, //MB
          //  acceptedFiles: ".jpg,.gif,.png", //上传的类型
            parallelUploads: 3,
            dictMaxFilesExceeded: "您最多只能上传10个文件！",
            dictResponseError: '文件上传失败!',
            dictInvalidFileType: "你不能上传该类型文件,文件类型只能是*.jpg,*.gif,*.png。",
            dictFallbackMessage:"浏览器不受支持",
            dictFileTooBig:"文件过大上传文件最大支持.",
            init:function(){
                this.on("addedfile", function(file) { 
                //上传文件时触发的事件
                });
                this.on("queuecomplete",function(file) {
                    //上传完成后触发的方法
                });
                this.on("removedfile",function(file){
                    //删除文件时触发的方法
                     });
                this.on("success", function (file, res) {
                    //代码
                    res = JSON.parse(res);
                    layer.alert(res.msg + " : " + res.data, 1); //风格一
                });
            }
        });
});   
</script>    






@endsection