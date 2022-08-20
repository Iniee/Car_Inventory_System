@extends('layouts.navbars.sales_sidebar')

<div class="container-fluid pt-4 px-4">
    <div class=" bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Recent Sales</h6>
    
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-black">
                        {{-- <th scope="col"><input class="form-check-input" type="checkbox"></th> --}}
                        <th scope="col">Date</th>
                        <th scope="col">Product Category</th>
                        <th scope="col">Product Name</th>                        
                        <th scope="col">Amount</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                 @foreach ($solds as $item)
                    <tr>
                        {{-- <td><input class="form-check-input" type="checkbox"></td> --}}
                        <td>{{$item->created_at->format('Y-m-d')}}</td>
                        <td></td>
                        <td>{{$item->name}}</td>
                        <td>{{Auth::user()->name}}</td>
                        <td>{{$item->total_price}}</td>
                        <td>{{$item->quantity_sold}}</td>
                        <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                    </tr>
                 @endforeach
                        <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>