@extends('layouts.app')
@section('title','Admin')
@section('content')
<div class="row justify-content-center mt-5 mb-5 text-center">
    <h1 class="mt-3 mb-3">Liste clients</h1>
    <form class="form-group my-2 my-lg-0 d-flex flex-row col-4"action="{{ route('admin.filtreClient') }}" method="GET">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Rechercher</button>
    </form>    
    <div class="d-flex flex-md-row flex-sm-column justify-content-center col-sm-11 col-md-10 col-lg-9 my-4">
       <!-- component de menu de l'admin -->
       <x-admin-menu/>
        <div class="container mx-4">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Rôle</th>
                        <th scope="col">Name</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td>
                            @if ($user->privilege_id == 1)
                            Client
                            @endif
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->prenom }}</td>
                        <td> 
                            <a class="btn btn-sm btn-primary" href="{{ route('user.edit', $user->id)}}">Modifier</a> 
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#deleteModal">Supprimer</button>
                        </td>
                        
                    </tr>

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

@endsection