@extends('layouts.navbars.user_sidebar')

{{-- <!--@extends('layouts.app', ['page' => 'New Product', 'pageSlug' => 'products', 'section' => 'inventory'])--> --}}

@section('content')
    <div class="container-fluid py-6">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Product Information</h4>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Catergory</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $products->id }}</td>
                                    <td>{{ $products->name }}</td>
                                    <td>{{ $products->category->name }}</td>
                                    <td>{{ $products->product}}</td>
                                    <td>{{ $products->price}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4 class="card-title">products: {{ $products->count() }}</h4>
                    </div> --}}

                    <form method="post" action="{{ route('sales.update', $products) }}" autocomplete="off">
                        @csrf
                        @method('PUT')  
                        {{-- <h6 class="heading-small text-muted mb-4">Sell Product {{ $products->name }}</h6> --}}
                        <div class="card-body">
                            {{-- <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                <input type="text" {{ $products->name ? 'readonly' : '' }} name="name" id="input-name"
                                    class="form-control" placeholder="{{ __('Name') }}"
                                    value="{{ old('name', $products->name) }}" autofocus>
                            </div> --}}

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group{{ $errors->has('product') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-product">Input Quantity Sold</label>
                                        <input type="number" name="product" id="input-product" 
                                            class="form-control form-control-alternative" placeholder="0-9"
                                            value="" required>
                                        {{-- @include('alerts.feedback',['field'=>'product']) --}}
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-danger mt-4">SELL</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
