<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <!-- Bootstrap -->
    <link href="<?php echo assets('freelancer/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo assets('freelancer/css/font-awesome.css')?>" rel="stylesheet">
    <link href="<?php echo assets('freelancer/css/main.css');?>" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
    <link rel="stylesheet" href="<?php echo assets('freelancer/plugins/iCheck/square/blue.css')?>">

</head>
<body>
<nav class="navbar  navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Reham</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo url('/login');?>">Login</a></li>
                <li><a href="<?php echo url('');?>">Sign-Up</a></li>
                <li><a href="<?php echo url('/contact');?>">Contact-Us</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<section class="header">
    <div class="overlay ">
        <div class="container">
            <div class="row centring-vh">
                <div class="col-md-6 hidden-xs info ">
                    <h1>Web<span>IT</span></h1>
                    <p class="lead hidden-xs"> professional networks. But as web developers, we have to be weary of the </p>
                    <p class="hidden-xs">As much as we hate them, social sharing buttons are necessary to make it easy for visitors to share our content with their friends and professional networks. But as web developers, we have to be weary of the </p>
                    <button class="btn btn-warning hidden-xs">How are you</button>
                </div>


                <div class="col-md-6">
                        <div class="col-md-12 login">
                            <div class="row">
                            <form class="center-block "  action="<?php echo url('/login/submit');?>" method='post' id="login-form">
                                <div  id="login-result"></div>
                                <h2 class="text-center">Try Free  <span>Login </span></h2>

                                <input type="email" class="form-control" placeholder="email" name="email">

                                <input type="password" class="form-control" placeholder="password" name="password">

                                <div class="checkbox icheck">
                                    <label style="color:#ccc; font-weight:normal;margin-left: 40px">
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-warning btn-block" >login</button>
                            </form>
                            </div>
                        </div>
                        <div class="col-md-12 sign-up">
                            <div class="row">
                            <!--start form-->
                            <form class="center-block " action="<?php echo url('/register/submit');?>" method='post' id="register-form">
                               <div id="register-result"></div>
                                <h2 class="text-center">Try Free  <span>Register </span></h2>
                                <input type="text" class="form-control" placeholder="name" name="name">
                                <input type="email" class="form-control" placeholder="email" name="email">
                                <input type="password" class="form-control" placeholder="password" name="password">

                                <button type="submit" class="btn btn-warning btn-block" value="">signUp</button>

                            </form>
                            <!-- end form -->
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- end header -->
<!-- end tab section-->
<script src="<?php echo assets('freelancer/js/jquery-1.12.4.min.js');?>"></script>
<script src="<?php echo assets('freelancer/js/bootstrap.min.js');?>"></script>
<script src="<?php echo assets('freelancer/js/main.js');?>"></script>
<script src="<?php echo assets('freelancer/plugins/iCheck/icheck.min.js');?>"></script>

<script>
    $(function () {
        var  flag = false;
       
        $('[placeholder]').focus(function () {
            // hid placeholder when click
            $(this).attr('data-text', $(this).attr('placeholder'));
            $(this).attr('placeholder','');
        }).blur(function () {
            $(this).attr('placeholder', $(this).attr('data-text'));
        });
        LoginResult = $('#login-result');
        $('#login-form').on('submit',function (e) {
            e.preventDefault();
            if(flag === true) {
                return false;
            }
            form = $(this);
            requestUrl = form.attr('action');
            requestMethod = form.attr('method');
            requestData = form.serialize();
            $.ajax({
                url : requestUrl,
                type: requestMethod,
                data: requestData,
                dataType :'json',
                beforeSend: function () {
                    flag = true;
                    $('button').attr('disabled',true);
                    LoginResult.removeClass().addClass('alert alert-info').html('loding ...');
                    flag = false;
                },
                success: function (result) {
                    if(result.errors) {
                        LoginResult.removeClass().addClass('alert alert-danger').html(result.errors);
                        $('button').removeAttr('disabled');
                        flag = false;
                    }else if(result.success) {
                        LoginResult.removeClass().addClass('alert alert-success').html(result.success);

                        if(result.redirect) {
                            window.location.href = result.redirect;
                        }
                    }

                }
            });
        })
    });
</script>

</body>
</html>