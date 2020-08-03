@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('welcome') }}" class="btn btn-secondary">
                @lang('messages.example.back')
            </a>
        </div>
        <div class="card-body">
            <h2>@lang('messages.example.title')</h2>
            <p>@lang('messages.example.paragraph')</p>
            @include('partials._select-lang')
        </div>
    </div>
</div>
@endsection
