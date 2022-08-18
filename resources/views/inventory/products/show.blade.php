@extends('layouts.navbars.user_sidebar')
@section('content')
    <div class="py-6">
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
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $products->id }}</td>
                                    <td>{{ $products->name }}</td>
                                    <td>{{ $products->category->name }}</td>
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
                    <div class="card-header">
                        <h4 class="card-title">products: {{ $products->count() }}</h4>
                    </div>

                    <form method="post" action="{{ route('sales.update', $products) }}" autocomplete="off">
                        @csrf
                        @method('PUT')
                        <h6 class="heading-small text-muted mb-4">Sell Product {{ $products->name }}</h6>
                        <div class="pl-lg-4">
                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                <input type="text" {{ $products->name ? 'readonly' : '' }} name="name" id="input-name"
                                    class="form-control" placeholder="{{ __('Name') }}"
                                    value="{{ old('name', $products->name) }}" autofocus>
                                {{-- @include('alerts.feedback',['field'=>'name']) --}}
                            </div>
                            <input type="text" name="product_category_id" value="{{$products->product_category_id}}">
                            <input type="text" name="base_price" value="{{$products->price}}">
                            <input type="text" name="sold_by" value="{{Auth::user()->name}}">

                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group{{ $errors->has('product') ? ' has-danger' : '' }}">
                                        <label class="form-control-label" for="input-product">Quantity to Sale</label>
                                        <input type="text" name="product" id="input-product"
                                            class="form-control form-control-alternative" placeholder="product"
                                            value="{{ old('product', $products->product) }}" required>
                                        {{-- @include('alerts.feedback',['field'=>'product']) --}}
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-success mt-4">Submit</button>
                            </div>
                        </div>
                    </form>
                    {{-- <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Name</th>
                            <th>product</th>
                            <th>Base price</th>
                            <th>Income Produced</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $products->id }}</a></td>
                                <td>{{ $products->name }}</a></td>
                                <td>{{ $products->product }}</td>
                                <td>{{ $products->price }}</td>

                            </tr>
                        </tbody>
                    </table>
                </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
