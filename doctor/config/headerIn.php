
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Doctor Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link rel="stylesheet" href="../config/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../config/assets/css/ready.css">
    <link rel="stylesheet" href="../config/assets/css/demo.css">
    <link rel="stylesheet" href="../config/assets/css/chat.css">
</head>
<body>
    <div class="wrapper">
        <div class="main-header">
            <div class="logo-header">
                <a href="../index.php" class="logo">
                    Doctor Dashboard
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
            </div>
            <nav class="navbar navbar-header navbar-expand-lg">
                <div class="container-fluid">

                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                        <li class="nav-item dropdown hidden-caret">
                            <a class="nav-link dropdown-toggle" href="../chat/index.php" id="navbarDropdown" role="button"  aria-haspopup="true" aria-expanded="false">
                                <i class="la la-envelope"></i>
                            </a>
                            
                        </li>
                        
                        <li class="nav-item dropdown">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false"> 
                                <img src="../images/<?php echo $row['image'];?>" alt="user-img" width="36" class="img-circle">
                                <span><?php echo $row['name']; ?></span></span> </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li>
                                        <div class="user-box">
                                            <div class="u-img">
                                                <img src="../images/<?php echo $row['image'];?>" alt="user"></div>
                                                <div class="u-text">
                                                    <h4><?php echo $row['name']; ?></h4>
                                                    <p class="text-muted"><?php echo $row['email']; ?></p><a href="../profile.php" class="btn btn-rounded btn-danger btn-sm">View Profile</a></div>
                                                </div>
                                            </li>
                                            <div class="dropdown-divider"></div>

                                            <a class="dropdown-item" href="../addEdit.php?id=<?php echo $row['id']; ?>"><i class="ti-settings"></i> Account Setting</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="../logout.php?id=<?php echo $row['unID']; ?>"><i class="fa fa-power-off"></i> Logout</a>
                                        </ul>
                                        <!-- /.dropdown-user -->
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <div class="sidebar">
                        <div class="scrollbar-inner sidebar-wrapper">
                            <div class="user">
                                <div class="photo">
                                    <img src="../images/<?php echo $row['image'];?>">
                                </div>
                                <div class="info">
                                    <a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                                        <span>
                                            <?php echo $row['name']; ?>
                                            <span class="user-level"><?php echo $row['email']; ?></span>
                                            <span class="caret"></span>
                                        </span>
                                    </a>
                                    <div class="clearfix"></div>

                                    <div class="collapse in" id="collapseExample" aria-expanded="true" style="">
                                        <ul class="nav" style="color: black;">
                                            <?php echo $row['description']; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <ul class="nav">
                                <li class="nav-item">
                                    <a href="../index.php">
                                        <!-- <i class="la la-dashboard"></i> -->
                                        <p>TimeLine</p>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../articles/addEdit.php">
                                        <p>Add Article</p>

                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="../clients/index.php">
                                        <p>Clients</p>
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="main-panel">
                        <div class="content">
                            <div class="container-fluid">
                                <h4 class="page-title"><!-- Settings --></h4>
                                <?php if(!empty($_SESSION['msg'])){ ?>
                                <div class="col-xs-12">
                                    <div class="alert alert-info"><?php echo $_SESSION['msg']; ?></div>
                                </div>
                                <?php unset($_SESSION['msg']);} ?>