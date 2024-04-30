@extends('layouts.app')
@section('title')
    @lang('About us')
@endsection
@section('content')
<div class="row justify-content-center mt-5 mb-5 text-center">
    <h1 class="mt-5 mb-5">@lang('About us')</h1>
    <div class="text-start col-10 col-lg-9 mb-4 lead">
        <p>@lang('lang.about.paragraph1')</p>
        <h4>@lang('lang.about.title1')</h4>
        <p>@lang('lang.about.paragraph2')</p>
        <h4>@lang('lang.about.title2')</h4>
        <p>@lang('lang.about.paragraph3')</p>
        <h4>@lang('lang.about.title3')</h4>
        <p>@lang('lang.about.paragraph4')</p>
    </div>
</div>
@endsection