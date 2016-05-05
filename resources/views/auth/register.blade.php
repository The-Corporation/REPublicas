<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>REPúblicas</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../css/bootstrap-social.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../bower_components/startbootstrap-sb-admin-2/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">


</head>

<body>

<style>
    body{
        background-color: #30bb6b;
    }
    .login-box{
        position:relative;
        margin: 10px auto;
        width: 400px;
        height: 400px;
        background-color: #fff;
        padding: 10px;
        border-radius: 3px;
        -webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.33);
        -moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.33);
        box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.33);
    }
    .lb-header{
        position:relative;
        color: #00415d;
        margin: 5px 5px 10px 5px;
        padding-bottom:10px;
        border-bottom: 1px solid #eee;
        text-align:center;
        height:28px;
    }
    .lb-header a{
        margin: 0 25px;
        padding: 0 20px;
        text-decoration: none;
        color: #666;
        font-weight: bold;
        font-size: 15px;
        -webkit-transition: all 0.1s linear;
        -moz-transition: all 0.1s linear;
        transition: all 0.1s linear;
    }
    .lb-header .active{
        color: #029f5b;
        font-size: 18px;
    }
    .social-login{
        position:relative;
        float: left;
        width: 100%;
        height:auto;
        padding: 10px 0 15px 0;
        border-bottom: 1px solid #eee;
    }
    .social-login a {
        position:relative;
        float:left;
        text-decoration: none;
        color: #fff;
        border: 1px solid rgba(0,0,0,0.05);
        padding: 12px;
        border-radius: 2px;
        font-size: 12px;
        text-transform: uppercase;
        margin: 2px;
        text-align:center;
    }
    .email-login,.email-signup{
        position:relative;
        float: left;
        width: 100%;
        height:auto;
        margin-top: 20px;
        text-align:center;
    }
    .u-form-group{
        width:100%;
        margin-bottom: 10px;
    }
    .u-form-group input[type="email"],
    .u-form-group input[type="password"]{
        width: calc(80%);
        height:45px;
        outline: none;
        border: 1px solid #ddd;
        padding: 0 10px;
        border-radius: 2px;
        color: #333;
        text-align: center;
        font-size:1.3rem;
        -webkit-transition:all 0.1s linear;
        -moz-transition:all 0.1s linear;
        transition:all 0.1s linear;
    }
    .u-form-group input:focus{
        border-color: #358efb;
    }
    .u-form-group button{
        width:50%;
        background-color: #1CB94E;
        border: none;
        outline: none;
        color: #fff;
        font-size: 14px;
        font-weight: normal;
        padding: 14px 0;
        border-radius: 2px;
        text-transform: uppercase;
    }
    .forgot-password{
        width:50%;
        text-align: left;
        text-decoration: underline;
        color: #888;
        font-size: 1.2rem;
    }
</style>

<br><br><br><br>
<div class="login-box">
    <div class="lb-header">
        <a href="#" class="active" id="login-box-link">Login</a>
        <a href="#" id="signup-box-link">Sign Up</a>
    </div>
    <div class="social-login">
        <div class="col-md-12">
            <a href="{{ route('social_login', 'facebook') }}" class="btn btn-block btn-social btn-facebook">
                <i class="fa fa-facebook"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login com Facebook
            </a>
            <a href="{{ route('social_login', 'twitter') }}" class="btn btn-block btn-social btn-twitter">
                <i class="fa fa-twitter"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Login com Twitter
            </a>
        </div>
    </div>
    <form class="email-login" action="{{ route('login') }}" method="POST">
        {!! csrf_field() !!}
        <div class="u-form-group">
            <input type="email" placeholder="Email"/>
        </div>
        <div class="u-form-group">
            <input type="password" placeholder="Senha"/>
        </div>
        <div class="u-form-group">
            <button type="submit">Entrar</button>
        </div>
        <div class="u-form-group hide">
            <a href="#" class="forgot-password">Forgot password?</a>
        </div>
    </form>
    <form class="email-signup" action="{{ route('register') }}">
        <div class="u-form-group">
            <input type="email" placeholder="Email"/>
        </div>
        <div class="u-form-group">
            <input type="password" placeholder="Senha"/>
        </div>
        <div class="u-form-group">
            <input type="password" placeholder="Confirmar Senha"/>
        </div>
        <div class="u-form-group">
            <button type="submit">Cadastre-se</button>
        </div>
    </form>
</div>


<!-- jQuery -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script>
    $(".email-signup").hide();
    $("#signup-box-link").click(function() {
        $(".social-login").hide();
        $(".email-login").fadeOut(100);
        $(".email-signup").delay(100).fadeIn(100);
        $("#login-box-link").removeClass("active");
        $("#signup-box-link").addClass("active");
    });
    $("#login-box-link").click(function() {
        $(".social-login").show();
        $(".email-login").delay(100).fadeIn(100);;
        $(".email-signup").fadeOut(100);
        $("#login-box-link").addClass("active");
        $("#signup-box-link").removeClass("active");
    });
</script>

</body>

</html>
