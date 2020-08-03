@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-body text-center">
            <h1>@lang('messages.hello')</h1>
            <a href="{{ route('example', 123) }}" class="btn btn-primary mb-3">
                @lang('messages.button.label')
            </a>

            <div class="row justify-content-center">
                <div class="col-md-3">
                    @include('partials._select-lang')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
