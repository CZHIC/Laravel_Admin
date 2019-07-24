@extends('layouts/main')

@section('content')

   <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>搜索结果</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">主页</a>
                        </li>
                        <li>
                            其他页面
                        </li>
                        <li>
                            <strong>搜索结果</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-content">
                                <h2>
                                为您找到相关结果约{{$data['count']}}个
                            </h2>
                                @foreach ($data['list'] as $v) 
                                <div class="hr-line-dashed"></div>
                                <div class="search-result">
                                    <h3><a href="{{$v['menuUrl']}}">{{$v['menuName']}}</a></h3>
                                </div>
                                @endforeach
                                <div class="hr-line-dashed"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/jquery-2.1.1.min.js') ?> ></script>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/bootstrap.min.js?v=3.4.0') ?> ></script>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/metisMenu/jquery.metisMenu.js') ?> ></script>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/plugins/slimscroll/jquery.slimscroll.min.js') ?> ></script>

 <!-- Page-Level Scripts -->

 <script>
   



</script>   
 

@endsection