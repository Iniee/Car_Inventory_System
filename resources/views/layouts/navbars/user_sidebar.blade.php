@extends('layouts.cdn')


{{-- <div class="container-fluid position-relative d-flex p-0"> --}}
<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-white navbar-danger">
        <a href="#" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>Car git add Inventory</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('images/1.jpg') }}" alt=""
                    style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">Welcome {{ Auth::user()->name}}</h6>
                {{-- <span>Admin</span> --}}
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="#" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-laptop me-2"></i>Products</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('products.create') }}" class="dropdown-item">Create Product</a>
                    <a href=" {{ route('categories.create') }}" class="dropdown-item">Create Categories</a>
                    <a href="{{ route('products.index') }}" class="dropdown-item">Manage Products</a>
                    <a href="#" class="dropdown-item">List of Product Sold</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-laptop me-2"></i>User Management</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('users.create') }}" class="dropdown-item">Create User</a>
                    <a href="{{ route('users.index') }}" class="dropdown-item">Manage User</a>

                </div>
            </div>

        </div>
    </nav>
</div>
<!-- Sidebar End -->

<!-- Navbar Start -->
<nav class="navbar navbar-expand px-4 py-0">
    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    {{-- <form class="d-none d-md-flex ms-4">
        <input class="form-control bg-white border-1" type="search" placeholder="Search">
    </form> --}}
    <div class="navbar-nav align-items-center ms-auto">

        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="bi bi-bell-fill" style="color: black !important"></i>
                <span class="d-none d-lg-inline-flex">Notification</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <a href="#" class="dropdown-item">
                    <h6 class="fw-normal mb-0">Profile updated</h6>
                    <small>15 minutes ago</small>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item">
                    <h6 class="fw-normal mb-0">New user added</h6>
                    <small>15 minutes ago</small>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item">
                    <h6 class="fw-normal mb-0">Password changed</h6>
                    <small>15 minutes ago</small>
                </a>
                <hr class="dropdown-divider">
                <a href="#" class="dropdown-item text-center">See all notifications</a>
            </div>
        </div>
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2" src="{{ asset('images/1.jpg') }}" alt=""
                    style="width: 40px; height: 40px;">
                <span class="d-none d-lg-inline-flex">USER</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <a href="#" class="dropdown-item">Settings</a>
                <a href="#" class="dropdown-item">Log Out</a>
            </div>
        </div>
    </div>
</nav>

<!-- Navbar End -->


<div class="content">
    @yield('content')
</div>


<!-- Footer Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded-top p-4">
        <div class="row">
            <div class="col-12 col-sm-6 text-center text-sm-start">
                &copy; <a href="#">CIS</a>, All Right Reserved.
            </div>
            <div class="col-12 col-sm-6 text-center text-sm-end">

                Designed By <a href="">THE PHP GROUP</a>
                <br>Distributed By: <a href="" target="_blank">THE PHP GROUP</a>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
