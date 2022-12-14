@extends('layouts.navbars.user_sidebar')


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card ">
                <div class="card-header">
                    <div class="row">
                        <div class="col-8">
                            <h4 class="card-title user_title">{{ __('Users') }}</h4>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">{{ __('Add user') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {{-- @include('alerts.success') --}}

                    <div class="">
                        <table class="table tablesorter " id="">
                            <thead class=" text-primary">
                                <th scope="col">{{ __('Name') }}</th>
                                <th scope="col">{{ __('Email') }}</th>
                                <th scope="col">{{ __('Date') }}</th>
                                <th scope="col">{{ __('Time') }}</th>
                                <th scope="col">Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                        </td>
                                        <td>{{ $user->created_at->format('d/m/Y') }}</td>
                                        <td>{{ $user->created_at->format('H:i') }}</td>
                                        <td class="text-right">

                                            <div class="one">
                                                <div class="one-grid">
                                                            <a class="btn btn-sm btn-primary btn-icon-only"
                                                                href="{{ route('users.edit', $user) }}">{{ __('Edit') }}
                                                            </a>
                                                
                                                    <form action="{{ route('users.destroy', $user) }}" method="post" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        
                                                        <button type="button" class="btn btn-link  btn-primary btn-sm btn-icon-only" data-toggle="tooltip"
                                                    data-placement="bottom" title="Delete User"
                                                    onclick="confirm('Are you sure you want to delete this User?') ? this.parentElement.submit() : ''">
                                                    <i class="" style="color: white"> Delete</i>
                                                </button>
                                                     </form>
                                                    </div>
                                            </div>
                                </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $users->links('pagination::bootstrap-5') }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
