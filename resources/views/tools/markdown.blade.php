@extends('layouts/main')

@section('content')
<link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/plugins/markdown/bootstrap-markdown.min.css') ?> rel="stylesheet">

  
            <div class="wrapper wrapper-content">

                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                <h5>Markdown文本编辑器</h5>
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
                                <textarea name="content" data-provide="markdown" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>

 <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/jquery-2.1.1.min.js') ?> ></script>
 <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/markdown/markdown.js') ?> ></script>
 <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/markdown/to-markdown.js') ?> ></script>
 <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/markdown/bootstrap-markdown.js') ?> ></script>
 <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/markdown/bootstrap-markdown.zh.js') ?> ></script>


@endsection