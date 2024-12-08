@extends('partials.base')

@section('title', 'Dashboard')

@section('content')
    <main class="w-full h-full">
        <div class="inline-block">
            @include('components.sidebar', ['categories' => $categories])
        </div>
    </main>
@endsection
