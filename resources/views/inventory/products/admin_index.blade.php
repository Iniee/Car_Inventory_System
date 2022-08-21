@extends('layouts.navbars.user_sidebar')
{{-- <!--@extends('layouts.app', ['page' => 'List of Products', 'pageSlug' => 'products', 'section' => 'inventory'])--> --}}

@section('content')
<div class="container-fluid py-6">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Products</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('products.create') }}" class="btn btn-sm btn-primary">New product</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{-- @include('alerts.success') --}}

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">Category</th>
                                <th scope="col">Product</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td><a
                                                href="{{ route('categories.show', $product->category) }}">{{ $product->category->name }}</a>
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>&#8358 {{ $product->price }}</td>
                                        <td> {{ $product->quantity }}</td>
                                        <td class="td-actions text-right">
                                        <a href="{{ route('products.edit', $product) }}" class="btn btn-link btn-primary"  
                                         data-toggle="tooltip" data-placement="bottom" title="Edit Product">
                                                <i class="tim-icons" style="color: white"> Edit</i>
                                            </a>
                                            <form action="{{ route('products.destroy', $product) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                 <button type="button" class="btn btn-link btn-primary" data-toggle="tooltip"
                                                    data-placement="bottom" title="Delete Product"
                                                    onclick="confirm('Are you sure you want to remove this product? The records that contain it will continue to exist.') ? this.parentElement.submit() : ''">
                                                    <i class="tim-icons" style="color: white"> Delete</i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end">
                        {{ $products->links('pagination::bootstrap-5') }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
