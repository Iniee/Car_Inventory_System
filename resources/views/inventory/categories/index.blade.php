@extends('layouts.navbars.user_sidebar') 


@section('content')
<div class="container-fluid py-6">
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title">Categories</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('categories.create') }}" class="btn btn-sm btn-primary">New Category</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{-- @include('alerts.success') --}}

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">Name</th>
                                <th scope="col">Product</th>
                                <th scope="col">Total Category Product</th>
                                <th scope="col">Creation Time</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ count($category->products) }}</td>
                                        <td>{{ $category->products->sum('product') }}</td>
                                        <td>{{ $category->created_at }}</td>
                                        <td class="td-actions text-right">
                                             <a href="{{ route('categories.show', $category) }}" class="btn btn-primary"
                                                data-toggle="tooltip" data-placement="bottom"> 
                                                 <i class="tim-icons icon-pencil">More Details</i>
                                            </a>
                                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary"
                                                data-toggle="tooltip" data-placement="bottom">
                                                <i class="tim-icons icon-pencil">Edit</i>
                                            </a>
                                            <form action="{{ route('categories.destroy', $category) }}" method="post"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="button" class="btn btn-primary" data-toggle="tooltip"
                                                    data-placement="bottom" title="Delete Category"
                                                    onclick="confirm('Are you sure you want to delete this category? All products belonging to it will be deleted and the records that contain it will not be accurate.') ? this.parentElement.submit() : ''">
                                                    Delete<i class="tim-icons icon-simple-remove"></i>
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
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $categories->links('pagination::bootstrap-5') }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
