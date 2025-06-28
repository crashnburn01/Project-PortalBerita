<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMAT - Admin Panel</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/iconly/bold.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ95wQxLzO9eYcO48zI9Zt92tJ+8N/9Q/W21x208k/2c4C8J/c4p8TzX7eJ9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('/favicon.ico') }}" type="image/x-icon">
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('portal-assets/img/format1.png') }}" alt="Logo" style="height: 45px !important;" class="img-fluid""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                    
                        <li class="sidebar-title">Menu</li>
                    
                        <li class="sidebar-item {{ request()->routeIs('admin.index') ? 'active' : '' }}">
                            <a href="{{ route('admin.index') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                    
                        <li class="sidebar-item {{ request()->routeIs('admin.articles.*') ? 'active' : '' }}">
                            <a href="{{ route('admin.articles.index') }}" class='sidebar-link'>
                                <i class="bi bi-newspaper"></i>
                                <span>Kelola Berita</span>
                            </a>
                        </li>
                    
                        <li class="sidebar-item {{ request()->routeIs('admin.category.*') ? 'active' : '' }}" >
                            <a href="{{ route('admin.category.index') }}" class='sidebar-link'>
                                <i class="bi bi-tags"></i>
                                <span>Kategori Berita</span>
                            </a>
                        </li>
                    
                        <li class="sidebar-title">Others</li>
                    
                        <li class="sidebar-item">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>Database Anggota</span>
                            </a>
                        </li>
                    
                        <li class="sidebar-item">
                            <a href="" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i>
                                <span>Nav Baru</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="#" class="sidebar-link" style="background-color: rgb(204, 0, 0); color:white;" onclick="logoutConfirm(event)">
                                <i class="bi bi-x-circle" style="color: white;"></i>
                                <span>Logout</span>
                            </a>
                        
                            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>