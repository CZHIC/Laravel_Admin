<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="renderer" content="webkit">

    <title>登录</title>
    <meta name="keywords" content="H+后台主题,后台bootstrap框架,会员中心主题,后台HTML,响应式后台">
    <meta name="description" content="H+是一个完全响应式，基于Bootstrap3最新版本开发的扁平化主题，她采用了主流的左右两栏式布局，使用了Html5+CSS3等现代技术">

   

    <link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/bootstrap.min.css?v=3.4.0') ?> rel="stylesheet">
    <link href=<?=Illuminate\Support\Facades\URL::asset('assets/font-awesome/css/font-awesome.css?v=4.3.0') ?> rel="stylesheet">

    <link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/animate.css') ?> rel="stylesheet">
    <link href=<?=Illuminate\Support\Facades\URL::asset('assets/css/style.css?v=2.2.0') ?> rel="stylesheet">



</head>

<body class="gray-bg">

  <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">H+</h1>

            </div>
            <h3>欢迎注册</h3>
            <p>创建一个新账户</p>
            <form class="m-t" role="form" action="/index.php/doregister">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="请输入用户名"  name = 'username' required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="请输入密码" name = 'password1'   required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="请再次输入密码"  name = 'password2' required="">
                </div>
                <div class="form-group text-left">
                    <div class="checkbox i-checks">
                        <label class="no-padding">
                            <input type="checkbox"  required=""><i></i> 我同意注册协议</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">注 册</button>

                <p class="text-muted text-center"><small>已经有账户了？</small><a href="/index.php/login">点此登录</a>
                </p>
                 <div><label style="color: red"><?php if(isset($error)) { ?><?=$error ?><?php } ?></label></p></div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src=<?=Illuminate\Support\Facades\URL::asset('assets/js/jquery-2.1.1.min.js') ?> ></script>
</body>

</html>
