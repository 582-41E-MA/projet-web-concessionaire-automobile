@extends('layouts.app')
@section('title')
    @lang('Contact us')
@endsection
@section('content')
<div class="row justify-content-center mt-5 mb-5 text-center">
    <h1 class="mt-5 mb-4">@lang('Contact us')</h1>
    <form class="form-signin col-8 col-sm-8 col-md-6 col-lg-4 mb-3">
        @csrf
        <div class="form-group mb-3 text-start">
            <label for="contracterCourriel" class="form-label">@lang('Your email')</label>
            <input type="email" class="form-control" id="contracterCourriel" placeholder="name@example.com">
        </div>
        <div class="form-group mb-3 text-start">
            <label for="contracterCommentaire" class="form-label">@lang('Your comment')</label>
            <textarea class="form-control" id="contracterCommentaire" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100">@lang('Contact')</button>
    </form>
</div>
@endsection