@extends('layouts.navbars.user_sidebar')

{{-- @extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users', 'section' => 'users']) --}}

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
                                <th scope="col">{{ __('Creation Date') }}</th>
                                <th scope="col">Actions</th>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                        </td>
                                        <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                            {{-- <a class="btn btn-sm btn-icon-only text-black"
                                                href="{{ route('users.destroy', $user) }}" role="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                                <i class="tim-icons icon-settings-gear-63">Delete</i>
                                            </a> --}}
                                            <div class="one">
                                                @if (auth()->user()->is_admin == '1' && '2')
                                                    <form action="{{ route('users.destroy', $user) }}" method="post">
                                                        <div class="one-grid">
                                                        <a class="btn btn-sm btn-primary btn-icon-only"
                                                            href="{{ route('users.edit', $user) }}">{{ __('Edit') }}
                                                        </a>

                                                        <button type="button" class="btn btn-primary btn-sm btn-icon-only"
                                                            onclick="confirm('{{ __('Are you sure you want to delete this user?') }}') ? this.parentElement.submit() : ''">
                                                            {{ __('Delete') }}
                                                        </button>
                                                        </div>
                                                    </form>
                                            </div>
                                                @else
                                                    <a class="btn btn-sm btn-icon-only text-black"
                                                        href="{{ route('users.edit', $user) }}">{{ __('Edit') }}</a>
                                                @endif
                                                 
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        {{ $users->links() }}
                    </nav>
                </div>
            </div>
        </div>
    </div>
@endsection
