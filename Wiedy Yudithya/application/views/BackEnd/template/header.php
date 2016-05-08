<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Vape - Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo base_url()?>assets/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="<?php echo base_url()?>assets/dist/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url()?>assets/bower_components/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url()?>assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="" href="<?php echo base_url();?>BackEnd/Home"><img class="logo" src="<?php echo base_url(); ?>assets/images/logo.png"></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <!-- ini nanti buat contact form -->
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <ul class="dropdown" style="padding:0.1em;">
                        <?php for($i=0;$i<count($contactNotification);$i++){ ?>
                            <li>
                                <a href="<?php echo base_url() ?>BackEnd/ContactForms/detail/<?php echo $contactNotification[$i]->referenceID; ?>">
                                    <div>
                                        <strong><?php echo $contactNotification[$i]->name; ?></strong>
                                        <span class="pull-right text-muted">
                                            <em><?php echo $contactNotification[$i]->time; ?></em>
                                        </span>
                                    </div>
                                    <div><?php echo $contactNotification[$i]->message; ?></div>
                                </a>
                            </li>
                        <?php } ?>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="<?php echo base_url() ?>/BackEnd/ContactForms">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-money fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <!-- ini nanti buat contact form -->
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <ul class="dropdown" style="padding:0.1em;">
                        <?php for($i=0;$i<count($paymentNotification);$i++){ ?>
                            <li>
                                <a href="<?php echo base_url() ?>BackEnd/Payment/detail/<?php echo $paymentNotification[$i]->referenceID; ?>">
                                    <div>
                                        <strong><?php echo $paymentNotification[$i]->name; ?></strong>
                                        <span class="pull-right text-muted">
                                            <em><?php echo $paymentNotification[$i]->time; ?></em>
                                        </span>
                                    </div>
                                    <div><?php echo $paymentNotification[$i]->total ?></div>
                                </a>
                            </li>
                        <?php } ?>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="<?php echo base_url() ?>/BackEnd/ContactForms">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo base_url() ?>BackEnd/Login/logout"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="<?php echo base_url(); ?>BackEnd/Home"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-shopping-cart fa-fw"></i> Orders<span class="fa arrow"></span></a>
                            <!-- liat dari LT tabel -->
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url(); ?>BackEnd/Orders">All Orders</a>
                                </li>
                                <?php for($i=0;$i<count($orderStatus);$i++) { ?>
                                    <li>
                                        <a href="<?php echo base_url(); ?>BackEnd/Orders/viewOrder/<?php echo $orderStatus[$i]->orderStatusID ?>"><?php echo $orderStatus[$i]->orderStatus; ?>
                                            <span class="countNotification">
                                                <?php if($orderCount[$i]>0&&$i<count($orderStatus)-1) echo $orderCount[$i]; ?>
                                            </span>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>BackEnd/Category"><i class="fa fa-table fa-fw"></i> Manage Category</a>
                            <!-- /.nav-second-level -->
                        </li>
                       <li>
                            <a href="#"><i class="fa fa-cubes fa-fw"></i> Products<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo base_url(); ?>BackEnd/Products/viewProduct">See All Products</a>

                                </li>
                                <?php for($i=0;$i<count($categories);$i++) { ?>
                                    <li>
                                        <?php if(count($categories[$i]->childCategory)>0){ ?>
                                            <a href="#"><?php echo $categories[$i]->categoryName; ?><span class="fa arrow"></a>
                                            <ul class="nav nav-third-level collapse">
                                                <?php for($j=0;$j<count($categories[$i]->childCategory);$j++){ ?>
                                                    <li><a href="<?php echo base_url(); ?>BackEnd/Products/viewProductByCategory/<?php echo $categories[$i]->childCategory[$j]->categoryID; ?>">
                                                    <?php echo $categories[$i]->childCategory[$j]->categoryName; ?>
                                                    </a></li>
                                                <?php } ?>
                                            </ul>
                                        <?php } else { ?>
                                            <a href="<?php echo base_url(); ?>BackEnd/Products/viewProductbyCategory/<?php echo $categories[$i]->categoryID; ?>"><?php echo $categories[$i]->categoryName; ?></a>
                                        <?php } ?>
                                    </li>
                                <?php } ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>BackEnd/Products/addProduct">Add Products</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>BackEnd/ContactForms"><i class="fa fa-envelope fa-fw"></i> Contact Forms
                                <span class="countNotification">
                                    <?php 
                                        $formCount = 0;
                                        for($i=0;$i<count($contactNotification);$i++)
                                        {
                                            if($contactNotification[$i]->isRead == '0')
                                                $formCount++;
                                        }
                                        if($formCount>0) echo $formCount;
                                    ?>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>BackEnd/Payment"><i class="fa fa-money fa-fw"></i> Payment Confirmation
                                <span class="countNotification">
                                    <?php 
                                        $paymentCount = 0;
                                        for($i=0;$i<count($paymentNotification);$i++)
                                        {
                                            if($paymentNotification[$i]->isRead == '0')
                                                $paymentCount++;
                                        }
                                        if($paymentCount>0) echo $paymentCount;
                                    ?>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>BackEnd/BankAccount"><i class="glyphicon glyphicon-piggy-bank"></i>&nbsp;&nbsp;Bank Accounts</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>BackEnd/Banner"><i class="fa fa-edit fa-fw"></i> Manage Banner</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>BackEnd/Users"><i class="fa fa-user fa-fw"></i> View Users</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>