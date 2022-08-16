<h3>Hello</h3>


{{-- @extends('layouts.app', ['page' => 'Category Information', 'pageSlug' => 'categories', 'section' => 'inventory'])-->

@section('content')
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
                <div class="card-body">
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
                            @foreach ($products as $product)
                                <tr>
                                    <td><a href="{{ route('products.edit', $product) }}">{{ $product->id }}</a></td>
                                    <td><a href="{{ route('products.edit', $product) }}">{{ $product->name }}</a></td>
                                    <td>{{ $product->product }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td class="td-actions text-right">
                                        <a href="{{ route('products.edit', $product) }}" class="btn btn-link"
                                            data-toggle="tooltip" data-placement="bottom" title="More Details">
                                            <i class="tim-icons icon-zoom-split"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end">
                        {{ $products->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
