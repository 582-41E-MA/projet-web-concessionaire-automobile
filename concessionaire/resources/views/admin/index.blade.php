@extends('layouts.app')
@section('title','Admin')
@section('content')
<div class="row justify-content-center mt-5 mb-5 text-center">
    <h1 class="mt-3 mb-3">@lang('Employee list')</h1>
    <form class="form-group my-2 my-lg-0 d-flex flex-row col-4" action="{{ route('admin.filtreEmployee') }}" method="GET">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">@lang('Search')</button>
    </form>    
    <div class="d-flex flex-md-row flex-sm-column justify-content-center col-sm-11 col-md-10 col-lg-9 my-4">
       <!-- component de menu de l'admin -->
       <x-admin-menu/>
        <div class="container mx-4">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">@lang('Role')</th>
                        <th scope="col">@lang('Name')</th>
                        <th scope="col">@lang('First name')</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td>
                            @if ($user->privilege_id == 1)
                            Client
                            @elseif ($user->privilege_id == 2)
                            Employee
                            @elseif ($user->privilege_id == 3)
                            Admin
                            @endif
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->prenom }}</td>
                        <td> 
                        <div class="d-flex gap-3">

                            <a class="btn btn-sm btn-primary" href="{{ route('user.edit', $user->id)}}">@lang('Edit')</a> 
                            <form action="{{ route('user.delete', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-info">@lang('Delete')</button>
                            </form>
                            </div>
                        </td>
                        
                    </tr>

                    @empty
                    <tr>
                        <td colspan="3" class="text-center">@lang('There are no users to display')!</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection