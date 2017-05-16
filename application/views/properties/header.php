<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" href="<?php echo base_url(); ?>includes/img/favicon.png" sizes="24X24" type="image/png">
    <title>Property Detail Page</title>
    <!-- Bootstrap -->
    <link href="<?php echo base_url();?>includes/properties_detail/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>includes/properties_detail/css/bootstrap-material-design.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>includes/properties_detail/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>includes/properties_detail/css/ripples.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>includes/properties_detail/css/base.css" rel="stylesheet">
    <link href="<?php echo base_url();?>includes/properties_detail/plugin/lightbox/lightgallery.css" rel="stylesheet">
    <link href="<?php echo base_url();?>includes/properties_detail/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>includes/properties_detail/css/responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
     <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="row">
          <div class="navbar-header col-md-3 col-sm-6 col-xs-12">
            <a href="../index.php">
              <img src="<?php echo base_url();?>includes/properties_detail/images/logo.png" alt="Real Gujarat" Title="RealGujarat" class="img-responsive logo" />
            </a>
          </div>
          <div class="col-md-3 col-md-push-6 col-sm-6  col-xs-12 hidden-xs">
            <ul class="nav navbar-nav header-link pull-right">
              <li><a href="<?php echo base_url();?>"><i class="fa fa-home"></i>&nbsp;Home</a></li>
              
              <li><a href="https://play.google.com/store/apps?hl=en"><img src="<?php echo base_url();?>includes/properties_detail/images/app.gif" width="20" />&nbsp;Download App</a></li>
            </ul>
          </div>
          <div class="col-md-6 col-md-pull-3 col-sm-12 col-xs-12">
            <form class="form-inline search-form" role="search">
              <div class="form-group">
                <input type="text" class="form-control search-control" placeholder="Search Property ..." type="text">
              
                 <button type="submit" class="btn btn-default btn-search"><i class="fa fa-search"></i> Search</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </nav>
    