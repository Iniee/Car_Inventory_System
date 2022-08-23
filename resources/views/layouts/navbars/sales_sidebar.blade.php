@extends('layouts.cdn')
<!-- Sidebar Start -->
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-white navbar-danger">
        <a href="#" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>CIS</h3>
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
                <h6 class="mb-0">WELCOME {{ Auth::user()->name }}</h6>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="/page" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-laptop me-2"></i>Products</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('products.create') }}" class="dropdown-item">Create Product</a>
                    <a href="{{ route('sale.products.index') }}" class="dropdown-item">List of Product</a>
                    <a href="{{ route('sales.index') }}" class="dropdown-item">Sell Product</a>
                    {{-- <a href="{{ url('product/sales/list') }}" class="dropdown-item">List of Product Sold</a>                     --}}
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
    
    
   <div class="navbar-nav align-items-center ms-auto">
         <div class="nav-item dropdown dropdown-center">
            <a href="#" class="nav-link dropdown-toggle " data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2" src="{{ asset('images/1.jpg') }}" alt=""
                    style="width: 40px; height: 40px;">
                <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
            </a>

             <div class="dropdown-menu dropdown-menu-end bg-white m-0">
             @if (Auth::check())
                    <li><i class="fa fa-user"></i> {{ Auth::user()->name }}:</li>
                    <form id="logout-form" action="{{ url('logout') }}" method="POST">
                        @csrf
                    <button type="submit" style="margin: 10px" class="btn btn-sm">Logout</button>
                    </form>
                @endif
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
                &copy; <a href="{{ url("/page") }}">CIS</a>, All Right Reserved.
            </div>
            {{-- <div class="col-12 col-sm-6 text-center text-sm-end">

                Designed By <a href="">THE PHP GROUP</a>
                <br>Distributed By: <a href="" target="_blank">THE PHP GROUP</a>
            </div> --}}
        </div>
    </div>
</div>
<!-- Footer End -->
