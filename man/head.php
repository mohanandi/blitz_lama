<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $judul; ?></title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/atas.png">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar static-left sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../man">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-users-cog"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <?php
            if ($judul == "Dashboard") {
            ?>
                <li class="nav-item active">
                <?php
            } else {
                ?>
                <li class="nav-item">
                <?php
            }
                ?>
                <a class="nav-link" href="../man">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    Pengelolaan
                </div>

                <!-- Nav Item - Pages Collapse Menu -->
                <?php
                if ($judul == "Kelola Akun") {
                ?>
                    <li class="nav-item active">
                    <?php
                } else {
                    ?>
                    <li class="nav-item">
                    <?php
                }
                    ?>

                    <a class="nav-link pb-0" href="../man/?page=akun">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Kelola Akun</span></a>
                    </li>
                    <!-- Nav Item - Pages Collapse Menu -->
                    <?php
                    if ($judul == "Kelola PIC") {
                    ?>
                        <li class="nav-item active">
                        <?php
                    } else {
                        ?>
                        <li class="nav-item">
                        <?php
                    }
                        ?>
                        <a class="nav-link pb-0" href="../man/?page=pic">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Kelola PIC</span></a>
                        </li>
                        <!-- Nav Item - Pages Collapse Menu -->
                        <?php
                        if ($judul == "Kelola PT") {
                        ?>
                            <li class="nav-item active">
                            <?php
                        } else {
                            ?>
                            <li class="nav-item">
                            <?php
                        }
                            ?>
                            <a class="nav-link pb-0" href="../man/?page=pt">
                                <i class="fas fa-fw fa-table"></i>
                                <span>Kelola PT</span></a>
                            </li>
                            <!-- Divider -->
                            <hr class="sidebar-divider">

                            <!-- Heading -->
                            <div class="sidebar-heading">
                                KELOLA DATA
                            </div>
                            <?php
                            if ($judul == "Kelola TKA") {
                            ?>
                                <li class="nav-item active">
                                <?php
                            } else {
                                ?>
                                <li class="nav-item">
                                <?php
                            }
                                ?>
                                <a class="nav-link pb-0" href="../man/?page=tka">
                                    <i class="fas fa-fw fa-table"></i>
                                    <span>Kelola TKA</span></a>
                                </li>
                                <?php
                                if ($judul == "Kelola RPTKA") {
                                ?>
                                    <li class="nav-item active">
                                    <?php
                                } else {
                                    ?>
                                    <li class="nav-item">
                                    <?php
                                }
                                    ?>
                                    <a class="nav-link pb-0" href="../man/?page=rptka">
                                        <i class="fas fa-fw fa-table"></i>
                                        <span>Kelola RPTKA</span></a>
                                    </li>
                                    <?php
                                    if ($judul == "Kelola Voucher") {
                                    ?>
                                        <li class="nav-item active">
                                        <?php
                                    } else {
                                        ?>
                                        <li class="nav-item">
                                        <?php
                                    }
                                        ?>
                                        <a class="nav-link pb-0" href="../man/?page=voucher">
                                            <i class="fas fa-fw fa-table"></i>
                                            <span>Kelola Voucher</span></a>
                                        </li>

                                        <?php
                                        if ($judul == "Kelola Visa 211") {
                                        ?>
                                            <li class="nav-item active">
                                            <?php
                                        } else {
                                            ?>
                                            <li class="nav-item">
                                            <?php
                                        }
                                            ?>
                                            <a class="nav-link collapsed pb-0" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                                <i class="fas fa-fw fa-cog"></i>
                                                <span>Kelola Visa 211</span>
                                            </a>
                                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                                                <div class="bg-white py-2 collapse-inner rounded">
                                                    <a class="collapse-item" href="../man/?page=visa211">Visa 211</a>
                                                    <a class="collapse-item" href="../man/?page=visa211_1">Visa 211-1</a>
                                                    <a class="collapse-item" href="../man/?page=visa211_2">Visa 211-2</a>
                                                    <a class="collapse-item" href="../man/?page=visa211_3">Visa 211-3</a>
                                                    <a class="collapse-item" href="../man/?page=visa211_4">Visa 211-4</a>
                                                </div>
                                            </div>
                                            </li>

                                            <?php
                                            if ($judul == "Kelola Visa 312") {
                                            ?>
                                                <li class="nav-item active">
                                                <?php
                                            } else {
                                                ?>
                                                <li class="nav-item">
                                                <?php
                                            }
                                                ?>
                                                <a class="nav-link pb-0" href="../man/?page=visa312">
                                                    <i class="fas fa-fw fa-table"></i>
                                                    <span>Kelola Visa 312</span></a>
                                                </li>
                                                <?php
                                                if ($judul == "Kelola VOA") {
                                                ?>
                                                    <li class="nav-item active">
                                                    <?php
                                                } else {
                                                    ?>
                                                    <li class="nav-item">
                                                    <?php
                                                }
                                                    ?>
                                                    <a class="nav-link pb-0" href="../man/?page=voa">
                                                        <i class="fas fa-fw fa-table"></i>
                                                        <span>Kelola VOA</span></a>
                                                    </li>
                                                    <?php
                                                    if ($judul == "Kelola Visa Lain") {
                                                    ?>
                                                        <li class="nav-item active">
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <li class="nav-item">
                                                        <?php
                                                    }
                                                        ?>
                                                        <a class="nav-link pb-0" href="../man/?page=visa_lain">
                                                            <i class="fas fa-fw fa-table"></i>
                                                            <span>Kelola Visa Lain</span></a>
                                                        </li>

                                                        <!-- Divider -->
                                                        <hr class="sidebar-divider">

                                                        <!-- Nav Item - Charts -->
                                                        <li class="nav-item">
                                                            <a class="nav-link" href="../system/logout.php" onclick="return confirm('Apakah Anda Yakin Akan Logout?');">
                                                                <i class="fas fa-fw fa-sign-out-alt"></i>
                                                                <span>Logout</span></a>
                                                        </li>

                                                        <!-- Divider -->
                                                        <hr class="sidebar-divider d-none d-md-block">

                                                        <!-- Sidebar Toggler (Sidebar) -->
                                                        <div class="text-center d-none d-md-inline">
                                                            <button class="rounded-circle border-0" id="sidebarToggle"></button>
                                                        </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>



                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                            <i class="fas fa-users-cog rounded-circle"></i>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->