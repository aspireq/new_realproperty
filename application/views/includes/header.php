<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="referrer" content="no-referrer">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link rel="icon" href="img/favicon.png" sizes="24X24" type="image/png">
        <title>Online Property Show 2017 | Realgujarat</title>
        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>includes/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>includes/css/hover.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>includes/css/base.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>includes/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>includes/css/texteffect.css" />

        <link href="<?php echo base_url(); ?>includes/css/style.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>includes/css/dropzone.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>includes/css/responsive.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>includes/css/radio.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>includes/css/datetimepicker.css" rel="stylesheet">
        <link href="http://vjs.zencdn.net/5.16.0/video-js.css" rel="stylesheet">
        <script src="<?php echo base_url(); ?>includes/js/modernizr.custom.js"></script>
        
        <!-- If you'd like to support IE8 -->
        <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-72937605-1', 'auto');
            ga('send', 'pageview');

        </script>
    </head>
    <body>
        <header>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 hidden-xs">
                        <a href="index.php">
                            <img src="<?php echo base_url(); ?>includes/img/show.png" alt="" width="160" class="img-responsive img-center logo" />
                        </a>
                    </div>
                    <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                        <nav class="navbar navbar-default">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="img-responsive" href="#"><img src="<?php echo base_url(); ?>includes/img/show.png" alt="" width="160" /></a>
                            </div>

                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav navbar-right">
                                    <li><a href="aboutus.php"><i class="fa fa-angle-double-right"></i>&nbsp;About Us</a></li>
                                    <!-- <li><a href="show.php">Shows</a></li> -->
                                    <li><a href="property.php"><i class="fa fa-angle-double-right"></i>&nbsp; Property</a></li>
                                    <li><a href="360.php"><i class="fa fa-angle-double-right"></i>&nbsp;360 &deg;</a></li>
                                    <li><a href="contactus.php"><i class="fa fa-angle-double-right"></i>&nbsp;Contact Us</a></li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 ">
                        <div class="row">
                            <nav class="mainnav">
                                <ul class="clearfix">
                                    <li><a href="<?php echo base_url(); ?>index/exhibitors"><i class="fa fa-user-circle-o"></i><span>Exibitors</span></a></li>
                                    <li><a href="<?php echo base_url(); ?>index/visitors"><i class="fa fa-users"></i><span>Visitors</span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="row red-bg">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="row black-bg">
                            <div class="col-md-12 col-sm-12 col-xs-12 hidden-xs">
                                <!-- link -->
                                <ul class="list-inline subnav cl-effect-1">
                                    <li><a href="<?php echo base_url(); ?>index/aboutus">About Us</a></li>                                    
                                    <li><a href="<?php echo base_url(); ?>index/property">Property</a></li>                                    
                                    <li><a href="<?php echo base_url(); ?>index/virtualview">360 &deg;</a></li>
                                    <li><a href="<?php echo base_url(); ?>index/contactus">Contact Us</a></li>
                                    <?php if ($this->flexi_auth->is_logged_in() && empty(!$userinfo)) { ?>
                                    <li><a href="<?php echo base_url(); ?>index/logout">Logout</a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <div class="row counter">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <!-- conter -->
                                <div id="time_countdown" class="time-count-container">
                                    <div class="col-md-3 col-sm-3 col-xs-3 border-right">
                                        <div class="time-box">
                                            <div class="time-box-inner dash days_dash animated" data-animation="rollIn" data-animation-delay="300">
                                                <span class="time-number">
                                                    <span class="digit">0</span>
                                                    <span class="digit">0</span>
                                                    <span class="digit">0</span>
                                                </span>
                                                <span class="time-name">Days</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-3 border-right">
                                        <div class="time-box">
                                            <div class="time-box-inner dash hours_dash animated" data-animation="rollIn" data-animation-delay="600">
                                                <span class="time-number">
                                                    <span class="digit">0</span>
                                                    <span class="digit">0</span>  
                                                </span>
                                                <span class="time-name">Hours</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-3 border-right">
                                        <div class="time-box">
                                            <div class="time-box-inner dash minutes_dash animated" data-animation="rollIn" data-animation-delay="900">
                                                <span class="time-number">
                                                    <span class="digit">0</span>
                                                    <span class="digit">0</span>
                                                </span>
                                                <span class="time-name">Minutes</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-3">
                                        <div class="time-box">
                                            <div class="time-box-inner dash seconds_dash animated" data-animation="rollIn" data-animation-delay="1200">
                                                <span class="time-number">
                                                    <span class="digit">0</span>
                                                    <span class="digit">0</span>
                                                </span>
                                                <span class="time-name">Seconds</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.time-count-container -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12 marquee">
                        <marquee behavior="scroll" direction="down" scrollamount="2" height="80">
                            <p class="news"><b>#RealEstate</b> <span>Best Online Offers & Discounts</span></p>
                            <p class="news"><b>#Event</b> <span>360 Degree Virtal Tour </span></p>
                            <p class="news"><b>#Comin Soon</b> <span>We are Coming with Wide Rage of home to choose From</span></p>
                        </marquee>
                        <!-- news -->
                    </div>
                </div>
            </div>
        </header>
