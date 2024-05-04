<div class="list-group mb-4 me-5 col-4 col-lg-2">
    <a href="{{ route('admin') }}" class="list-group-item list-group-item-action" aria-current="true">@lang('Employees list')</a>
    <a href="{{ route('admin.client') }}" class="list-group-item list-group-item-action">@lang('Clients list')</a>
    <a href="{{ route('admin.voiture') }}" class="list-group-item list-group-item-action">@lang('Cars list')</a>
    <a href="{{ route('user.create') }}" class="list-group-item list-group-item-action">@lang('Add a user')</a>
    <a href="{{ route('voiture.create') }}" class="list-group-item list-group-item-action">@lang('Add a car')</a>
    <a href="{{ route('commande.index') }}" class="list-group-item list-group-item-action">@lang('Bills')</a>
    <!-- <a class="list-group-item list-group-item-action disabled" aria-disabled="true">A disabled link item</a> -->
</div>