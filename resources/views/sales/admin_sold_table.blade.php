@extends('layouts.navbars.user_sidebar')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-9">
            @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
            @endif
            @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
            @endif
        </div>
       <div class="row">
          <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Product Sold</h4>
                        </div>
                    </div>
                 </div>
                    @if ($solds->count() == 0)
                   <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">No Product Sold</h4>
                        </div>
                    </div>
                    @else
                    <div class="card-body">
                        <div class="">
                         <table class="table tablesorter">
                            <thead class=" text-primary">
                                {{-- <th scope="col">ID</th> --}}
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Category</th>
                                <th scope="col">Unit price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total price</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Sold By</th>
                            </thead>
                            <tbody>
                                @foreach ($solds as $sold)
                                    <tr>
                                        {{-- <td>{{ $sold->id }}</td> --}}
                                        <td>{{ $sold->name }}</td>
                                        <td>{{ $sold->category->name}}</td>
                                        <td>&#8358 {{ $sold->base_price }}</td>
                                        <td>{{ $sold->quantity_sold }}</td>
                                        <td>&#8358 {{ $sold->total_price }}</td>
                                        <td>{{ $sold->created_at->format('Y-m-d') }}</td>
                                        <td>{{ $sold->created_at->format('H:i') }}</td>                                        <td>{{ $sold->sold_by }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                         </table>
                        </div>
                    </div> 
                    @endif
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end">
                            {{ $solds->links('pagination::bootstrap-5') }}
                        </nav>
                    </div>
                </div>

            </div>
            </div>
                
        </div> 
    </div>  
</div>
@endsection 