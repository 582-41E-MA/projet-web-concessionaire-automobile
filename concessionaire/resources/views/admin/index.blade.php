@extends('layouts.app')
@section('title','À propos de nous')
@section('content')

<h1>index admin</h1>

<div class="container">
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
                <td> <a href="#">Modifier</a> / <a href="#">Supprimer</a> </td>
                
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