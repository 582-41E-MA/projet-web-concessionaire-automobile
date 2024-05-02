@extends('layouts.app')
@section('title','Admin')
@section('content')
<div class="row justify-content-center mt-5 mb-5 text-center">
    <h1 class="mt-3 mb-3">@lang('Cars list')</h1>
    <form class="form-group my-2 my-lg-0 d-flex flex-row col-4" action="{{ route('admin.filtreVoiture') }}" method="GET">
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
                        <th scope="col">@lang('Car') ID</th>
                        <th scope="col">@lang('Name')</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- rajouter l marque -->
                    @forelse($voitures as $voiture)
                    <tr>
                        <td>
                        {{ $voiture->id }}
                        </td>
                        <td>{{$marques->find($voiture->modele->modele_marque_id)->marque_en}} {{ $voiture->modele->modele_en }}</td>
                        <td> 
                            <a class="btn btn-sm btn-primary" href="{{ route('voiture.edit', $voiture->id)}}">@lang('Edit')</a> 
                            <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#deleteModal">@lang('Delete')</button>
                        </td>
                        
                    </tr>

                    {{-- Bootstrap Modal --}}
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h1 class="modal-title fs-5" id="DeleteModalLabel">@lang('Delete')</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                            @lang('Are you sure to delete this car')?
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">@lang('Cancel')</button>
                            <form action="{{ route('voiture.delete', $voiture->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-info">@lang('Delete')</button>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div>
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