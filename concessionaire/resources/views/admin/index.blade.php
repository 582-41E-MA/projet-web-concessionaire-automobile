@extends('layouts.app')
@section('title','Admin')
@section('content')

<h1>index admin</h1>

<div class="container">
    <h2><a href="{{ route('user.create') }}"> Add New User</a></h2>
    <table class="table">
        <thead>
            <tr>
                <th>Role</th>
                <th>Name</th>
                <th>Option</th>
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
                <td> <button class="btn btn-sm"> <a href="{{ route('user.edit', $user->id)}}">Modifier</a> </button> /  <form  method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
        </form> </td>
                
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center">There are no users to display!</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
        
@endsection