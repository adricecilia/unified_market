@extends('partials.base')

@section('title', 'Dashboard')

@section('content')
    <main class="w-full min-h-screen">
        <div class="flex flex-col">
            @include('components.sidebar', ['categories' => $categories])
        </div>
    </main>
@endsection
