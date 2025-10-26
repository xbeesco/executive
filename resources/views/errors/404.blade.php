@extends('layouts.layout')

@section('content')
    <div class="page-content">
        <div class="container">
            <div class="error-404 text-center py-5">
                <h1 class="display-1">404</h1>
                <h2>Page Not Found</h2>
                <p>Sorry, the page you're looking for doesn't exist or has been removed.</p>
                <a href="{{ route('home') }}" class="btn btn-primary mt-3">Go Back Home</a>
            </div>
        </div>
    </div>
@endsection
