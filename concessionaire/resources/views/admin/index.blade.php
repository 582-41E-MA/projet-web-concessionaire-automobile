@extends('layouts.app')
@section('title','Admin')
@section('content')
<div class="row justify-content-center mt-5 mb-5 text-center">
    <h1 class="mt-4 mb-5">index admin</h1>

    <div class="d-flex flex-md-row flex-sm-column justify-content-center col-sm-11 col-md-10 col-lg-9 mb-4">
        <div class="list-group mb-4">
            <a href="#" class="list-group-item list-group-item-action active" aria-current="true">Liste des employés</a>
            <a href="{{ route('user.create') }}" class="list-group-item list-group-item-action">Ajouter un employé</a>
            <a href="#" class="list-group-item list-group-item-action">Liste des véhicules</a>
            <a href="#" class="list-group-item list-group-item-action">Ajouter un véhicule</a>
            <a href="#" class="list-group-item list-group-item-action">Liste des clients</a>
            <a href="#" class="list-group-item list-group-item-action">Liste des factures</a>
            <a class="list-group-item list-group-item-action disabled" aria-disabled="true">A disabled link item</a>
        </div>
        <div class="container mx-4">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Rôle</th>
                        <th scope="col">Name</th>
                        <th scope="col">Option</th>
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
                        <td> 
                            <a class="btn btn-sm btn-primary" href="{{ route('user.edit', $user->id)}}">Modifier</a> 
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#deleteModal">Supprimer</button>
                        /  <form action="{{ route('user.delete', $user->id) }}"  method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-info">Delete</button>
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
    </div>
</div>
{{-- Bootstrap Modal --}}
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h1 class="modal-title fs-5" id="DeleteModalLabel">DELETE</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Are you sure to delete this task?
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form action="{{ route('user.delete', $user->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-sm btn-info">Delete</button>
        </form>
        </div>
    </div>
    </div>
</div>
@endsection