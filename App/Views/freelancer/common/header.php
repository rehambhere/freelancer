<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title;?></title>
    <link rel='stylesheet' href="<?php echo assets('freelancer/css/bootstrap.min.css');?>" />
    <link href="<?php echo assets('freelancer/css/bootstrap-tokenfield.css')?>" type="text/css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo assets('freelancer/css/datepicker.min.css');?>">
    <!-- rating start-->
    <link rel="stylesheet" href="<?php echo assets('freelancer/css/star-rating-svg.css');?>">
    <!--end rating start-->
    <link rel='stylesheet' href="<?php echo assets('freelancer/css/font-awesome.css');?>" />
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel='stylesheet' href="<?php echo assets('freelancer/css/animate.css');?>" />
    <link rel="stylesheet" href="<?php echo assets('freelancer/css/selectize.css');?>">
    <link rel="stylesheet" href="<?php echo assets('freelancer/css/creatProject.css');?>">
    <link rel="stylesheet" href="<?php echo assets('freelancer/css/main.css');?>">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Brand</a>

        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="<?php echo url('/users');?>">Search freelancer <span class="sr-only">(current)</span></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Services
                        <img src="<?php echo assets('images/'.$user->image)?>"  style="width=20px; height:20px;" class="img-circle" alt="User Image">

                        <span class="caret"></span></a>

                    <ul class="dropdown-menu">
                        <li><a href="user.html"><i class="icon ion-ios-people"></i> <span> My Profile </span></a></li>
                        <li><a href="editu.html"><i class="icon ion-edit"></i> <span>Edit Profile</span></a></li>
                        <li><a href="<?php echo url('/postsj');?>"><i class="icon ion-compose"></i> <span>Post a Job</span> </a></li>
                        <li><a href="my_inbox.html"><i class="icon ion-ios-folder-outline"></i> <span>My Inbox</span></a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="settings.html"><i class="icon ion-gear-b"></i> <span>settings</span></a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="payment."><i class="icon ion-card"></i> <span>Payments</span></a></li>
                        <li><a href="how.html"><i class="icon ion-help-buoy"></i> <span>How It Works</span></a></li>
                        <li><a href="support.html"><i class="icon ion-help"></i> <span>Support</span></a> </li>
                        <li><a href="<?php echo url('/logout');?>"><i class="icon ion-log-out"></i> <span>Logout</span></a> </li>

                    </ul>
                </li>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="warning1">
                    <a href="<?php echo url('/posts_jobs');?>" class="warning">Post-Job</a>
                </li>
                <li class="warning1">
                    <a href="<?php echo url('/jobs');?>" class="warning">Search-Job</a>
                </li>

              
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Language<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">En</a></li>
                        <li><a href="#">Ar</a></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="icon ion-chatbubble-working"></i></a>
                    <ul class="dropdown-menu">
                        <ul class="list-group">

                            <li class="list-group-item">
                                <a href="my_inbox.html">
                                    <span class="badge">14</span>
                                    Cras justo odio
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="">
                                    <span class="badge">14</span>
                                    Cras justo odio
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="">
                                    <span class="badge">14</span>
                                    Cras justo odio
                                </a>
                            </li>
                            <li class="list-group-item">
                                <a href="">
                                    <span class="badge">14</span>
                                    Cras justo odio
                                </a>
                            </li>

                        </ul>

                    </ul>
                </li>

                <li><a href="<?php echo url('/logout');?>"><i class="icon ion-log-out"></i> <span>Logout</span></a> </li>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>