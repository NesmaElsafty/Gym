
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../../config/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../../../config/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../config/assets/libs/css/style.css">
    <link rel="stylesheet" href="../../../config/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="../../../config/assets/vendor/vector-map/jqvmap.css">
    <link href="../../../config/assets/vendor/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../config/assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="../../../config/assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="../../../config/assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" type="text/css" href="../../../config/assets/vendor/daterangepicker/daterangepicker.css" />
    <title> Protein Box Dashboard </title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="../../index.php">Protein Box</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">

                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="../../chat/index.php">
                                <i class=" fas fa-envelope"></i>
                            </a>
                        </li>

                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../../../config/assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $_SESSION['name']; ?> </h5>
                                    <span class="status"></span><span class="ml-2"><?php echo $_SESSION['auth']; ?></span>
                                </div>
                                <a class="dropdown-item" href="../../profile.php"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="../../admins/addEdit.php?id=<?php echo $_SESSION['unID']; ?>"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="../../logout.php?id=<?php echo $_SESSION['unID']; ?>"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                DashBoard
                            </li>
                            
                            <li class="nav-item">
                                <li class="nav-item">
                                    <a class="nav-link" href="../../admins/index.php"><i class=" fas fa-user"></i>Admins</a>
                                </li>
                            </li>
                            <li class="nav-item">
                                <li class="nav-item">
                                    <a class="nav-link" href="../../doctors/index.php"><i class=" fas fa-user-md"></i>Doctors</a>
                                </li>
                            </li>
                            <li class="nav-item">
                                <li class="nav-item">
                                    <a class="nav-link" href="../../clients/index.php"><i class=" fas fa-user-plus"></i>Clients</a>
                                </li>
                            </li>
                            <li class="nav-item">
                                <li class="nav-item">
                                    <a class="nav-link" href="../../articles/index.php"><i class=" far fa-bookmark"></i>Articles</a>
                                </li>
                            </li>
                            <li class="nav-item">
                                <li class="nav-item">
                                    <a class="nav-link" href="../../offers/index.php"><i class=" fas fa-bell"></i>Offers</a>
                                </li>
                            </li>
                            <li class="nav-item">
                                <li class="nav-item">
                                    <a class="nav-link" href=""><i class=" fas fa-shopping-cart"></i>Orders</a>
                                </li>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class=" fas fa-video"></i>Ads</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="../../ads/index.php">Clients Ads <span class="badge badge-secondary">New</span></a>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class=" fab fa-product-hunt"></i>Products <span class="badge badge-success">10</span></a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        
                                        <li class="nav-item">
                                            <a class="nav-link" href="../../products/supplements/index.php">Supplements<span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2">Packages</a>
                                            <div id="submenu-1-2" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="../../products/packages/index.php">
                                                            Show Packages
                                                        </a>
                                                    </li>
                                                    <!-- <li class="nav-item">
                                                        <a class="nav-link" href="../../products/packages/meals/index.php">
                                                            Meals
                                                        </a>
                                                    </li> -->

                                                </ul>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7-8" aria-controls="submenu-7-8">Menu</a>
                                            <div id="submenu-7-8" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="../../products/menu/index.php">
                                                            Menu Categories
                                                        </a>
                                                    </li>
                                                    <!-- <li class="nav-item">
                                                        <a class="nav-link" href="../../products/menu/meals/index.php">
                                                            Meals
                                                        </a>
                                                    </li> -->

                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="dashboard-finance">
                <div class="container-fluid dashboard-content">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h3 class="mb-2"></h3>
                                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                                <div class="page-breadcrumb">
                                    
                                </div>
                            </div>
                        </div>
                    </div>