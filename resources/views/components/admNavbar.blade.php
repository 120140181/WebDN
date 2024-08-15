<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta tags and CSS links -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous" />
    <!-- Carousel CSS -->
    <link rel="stylesheet" href="assets/vendor/node_modules/owl-carousel/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/vendor/node_modules/owl-carousel/css/owl.theme.default.min.css" />
    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.10.1/main.min.css" rel="stylesheet" />
    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css" />
    <!-- Iconify -->
    <script src="https://code.iconify.design/2/2.0.0/iconify.min.js"></script>

    <title>Admin | {{ request()->is('haloadmin') ? 'Dashboard' : '' }} {{ request()->is('reminder') ? 'Reminder' : '' }} {{ request()->is('history') ? 'History Tagihan' : '' }}</title>
    <link rel="icon" href="assets/img/icon/garuda.png" type="image/png" />
</head>

<body>
    @include('components.preloader')
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                        <i class="fas fa-bars"></i>
                    </a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">
                            See All Notifications
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4 vh-100 d-flex flex-column">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link"
                style="
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            height: 60px;
          ">
                <span class="iconify brand-icon" data-icon="mdi:account-circle"
                    style="
              font-size: 1.5rem;
              margin-right: 0.5rem;
              opacity: 0.8;
            "></span>
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar d-flex flex-column flex-grow-1">
                <!-- Sidebar Menu -->
                <nav class="mt-2 d-flex flex-column flex-grow-1">
                    <ul class="nav nav-pills nav-sidebar flex-column flex-grow-1" data-widget="treeview" role="menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.index') }}" class="nav-link {{ request()->is('haloadmin') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.reminder') }}" class="nav-link {{ request()->is('reminder') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-bell"></i>
                                <p>Reminder</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.history') }}" class="nav-link {{ request()->is('history') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-history"></i>
                                <p>History</p>
                            </a>
                        </li>
                        <!-- Empty element to push logout to the bottom -->
                        <li class="flex-grow-1"></li>
                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i class="nav-icon fas fa-sign-out-alt"></i>
                                <p>Log Out</p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
