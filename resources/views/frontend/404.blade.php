@extends('layouts.app')

@section('content')
    @include('components.header')

    <div class="page-content">
        <div class="container">
            <div class="error-404">
                <h1>404</h1>
                <h2>Page Not Found</h2>
                <p>Sorry, the page you're looking for doesn't exist or has been removed.</p>
                <a href="{{ route('home') }}" class="btn btn-primary">Go Back Home</a>
            </div>
        </div>
    </div>

    @include('components.footer')
@endsection
