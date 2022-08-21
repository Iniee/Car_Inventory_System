@extends('layouts.navbars.sales_sidebar')

@section('content')

<!-- Spinner Start -->
<div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->


<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-6 col-xl-4">
            <div class=" bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-line fa-3x text-primary"></i>
                <div class="ms-4">
                    <p class="mb-2">Total Sales by {{Auth::user()->name}}</p>
                    <b class="mb-0">{{ $count = DB::table('solds')->where('sold_by', '=', auth()->user()->name)->count(); }}</b>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class=" bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-bar fa-3x text-primary"></i>
                <div class="ms-4">
                     <p class="mb-2">Total Products Available</p>
                     <b class="mb-0">{{ $count = DB::table('products')->count(); }}</b>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-4">
            <div class=" bg-light rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-chart-pie fa-3x text-primary"></i>
                <div class="ms-4">
                   <p class="mb-2">Total Categories Available</p>
                    <b class="mb-0">{{ $count = DB::table('productcategories')->count(); }}</b>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sale & Revenue End -->


<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class=" bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0 text-primary">Recent Sales</h6>
            <a href="/product/sales/list">Show All</a>
        </div>
        <div class="table-responsive">
            <table class="table tablesorter">
                <thead class=" text-primary">
                            <th scope="col">Date</th>
                            <th scope="col">Name</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Quantity</th>
                            {{-- <th scope="col">Sold By</th> --}}
                </thead>
                <tbody>
                    @foreach ($solds as $sold)
                        <tr>
                             <tr>
                                <td>{{ $sold->created_at->format('Y-m-d') }}</td>
                                <td>{{ $sold->name }}</td>
                                <td>{{ $sold->base_price }}</td>
                                <td>{{ $sold->quantity_sold }}</td>
                                {{-- <td>{{ $sold->sold_by }}</td> --}}

                            </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Recent Sales End -->

@endsection