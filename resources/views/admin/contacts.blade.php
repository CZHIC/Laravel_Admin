@extends('layouts/main')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-9">
                    <h2>联系人</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">主页</a>
                        </li>
                        <li>
                            页面
                        </li>
                        <li>
                            <strong>联系人</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                   
                    @foreach ($data['list'] as $v)
                        <div class="col-lg-4">
                        <div class="contact-box">
                            <a href="profile.html">
                                <div class="col-sm-4">
                                    <div class="text-center">
                                        <img alt="image" class="img-circle m-t-xs img-responsive" src=<?=Illuminate\Support\Facades\URL::asset("{$v['img']}") ?>   >
                                        <div class="m-t-xs font-bold">{{$v['job']}}</div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <h3><strong>{{$v['name']}}</strong></h3>
                                    <p><i class="fa fa-map-marker"></i> {{$v['address']}}</p>
                                    <address>
                            <strong>YIIHUA.</strong><br>
                           {{$v['email']}}<br>
                            QQ:<a href="contacts.html">{{$v['qq']}}</a><br>
                            <abbr title="Phone">Tel:</abbr> {{$v['phone']}}
                        </address>
                                </div>
                                <div class="clearfix"></div>
                            </a>
                        </div>
                    </div>
                    @endforeach 
   

                </div>
            </div>
<script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/jquery-2.1.1.min.js') ?> ></script>
  <script>
        $(document).ready(function () {
            $('.contact-box').each(function () {
                animationHover(this, 'pulse');
            });
        });
    </script>

@endsection