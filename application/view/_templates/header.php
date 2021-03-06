<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

 <!-- Material Design fonts -->
  <link rel="stylesheet" type="text/css" href="<?php echo URL . 'css/googlefont.css' ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo URL . 'css/animate.css' ?>">
  <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">
   <link href="<?php echo URL . '/bower_components/components-font-awesome/css/font-awesome.min.css' ?>" rel="stylesheet">
   
  <!-- Bootstrap -->
  <link rel="stylesheet" type="text/css" href="<?php echo URL . 'bower_components/bootstrap/dist/css/bootstrap.min.css' ?>">

  <!-- Bootstrap Material Design -->
  <link rel="stylesheet" type="text/css" href="<?php echo URL . 'bower_components/bootstrap-material-design/dist/css/bootstrap-material-design.css' ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo URL . 'bower_components/bootstrap-material-design/dist/css/ripples.min.css' ?>">
  <script>var url = "<?php echo URL; ?>" </script>
   <!-- MetisMenu CSS -->
    <link href="<?php echo URL . '/bower_components/metisMenu/dist/metisMenu.min.css ' ?>" rel="stylesheet">
    
    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.2.2/css/fixedColumns.bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/1.4.2/css/scroller.bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.0/css/select.bootstrap.min.css"/>
 
<!-- Stlye -->
  <link rel="stylesheet" type="text/css" href="<?php echo URL . 'css/style.css' ?>">
 <!-- Custom CSS -->
    <link href="<?php echo URL . 'css/sb-admin-2.css' ?>" rel="stylesheet">
    <script src="<?php echo URL . 'bower_components/jquery/dist/jquery.js' ?>"></script>
  <title>AskOthers</title>
</head>
<body>
 <div id="wrapper">

<!-- Navigation -->
<div class="bs-component">
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo URL; ?>">Ask Others</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right pull-right">
                <li>
                    <a class="dropdown-toggle" href="<?php echo URL . "newquestion/learn"; ?>">
                        <i class="fa fa-question-circle fa-fw gri"></i>
                    </a>
                </li>
                <li>
                    <a class="dropdown-toggle" href="<?php echo URL . "newquestion"; ?>">
                        <i class="fa fa-plus fa-fw gri"></i>
                    </a>
                </li>
                <?php /* 
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw gri"></i>  <i class="fa fa-caret-down gri"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="#">
                                <div>
                                    <strong>Bildirim Başlığı</strong>
                                    <span class="pull-right text-muted">
                                        <em>Tarih</em>
                                    </span>
                                </div>
                                <div>Bildirim İçeriliği</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>Read All Messages</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw gri"></i>  <i class="fa fa-caret-down gri"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-tasks">
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 1</strong>
                                        <span class="pull-right text-muted">40% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete (success)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 2</strong>
                                        <span class="pull-right text-muted">20% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                            <span class="sr-only">20% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 3</strong>
                                        <span class="pull-right text-muted">60% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                            <span class="sr-only">60% Complete (warning)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <p>
                                        <strong>Task 4</strong>
                                        <span class="pull-right text-muted">80% Complete</span>
                                    </p>
                                    <div class="progress progress-striped active">
                                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                            <span class="sr-only">80% Complete (danger)</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw gri"></i>  <i class="fa fa-caret-down gri"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
                */ ?>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw gri"></i>  <i class="fa fa-caret-down gri"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                    <?php if(isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])){ ?>
                        <li><a href="<?php echo URL . 'profile'; ?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li class="disabled"><a class="disabled" ><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo URL . 'login/cikis' ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                        <?php } else{ ?>
                        <li><a href="<?php echo URL . 'login'?>"><i class="fa fa-sign-in fa-fw"></i> Login</a>
                        </li>
                        <li><a href="<?php echo URL . 'register'?>"><i class="fa fa-user-plus fa-fw"></i> Register</a>
                        </li>
                        <?php } ?>

                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                        <form action="<?php echo URL . "search/s" ?>" method="get">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search..." name="araTxt">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                                </span>
                          
                            </div>
                              </form>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo URL; ?>"><i class="fa fa-dashboard fa-fw"></i> Anasayfa</a>
                        </li>
                        <li>
                            <a><i class="fa fa-bar-chart-o fa-fw"></i> Top 5 Sorular<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <?php 
                            $sorular = new Mini\Model\Questions();
                            $top5question = $sorular->getQuestionsTop5();
                            foreach ($top5question as $key => $value) { ?>
                            <li>
                            <?php echo "<a href='". URL . "shuffle/q/". $value->question_id."'>".$value->question_detail."</a>"; ?>
                            </li>
                            <?php } ?>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a><i class="fa fa-bar-chart-o fa-fw"></i> Top 5 Kullanıcı<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                            <?php 
                            $kullanicilar = new Mini\Model\User();
                            $top5user = $kullanicilar->getUserTop5();
                            foreach ($top5user as $key => $value) { ?>
                            <li>
                            <?php echo "<a href='". URL . "profile/u/". $value->username ."'>".$value->username."</a>" ?>
                            </li>
                            <?php } ?>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                        <?php if(isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"])){ ?>
                        <li>
                            <a href="<?php echo URL . 'shuffle'; ?>"><i class="fa fa-table fa-fw"></i> Shuffle</a>
                        </li>
                            <?php } else { ?>
                        <li class="disabled">
                            <a><i class="fa fa-table fa-fw"></i> Shuffle</a>
                        </li>
                            <?php } ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
        </div>