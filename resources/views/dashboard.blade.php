@extends('partials.base')

@section('title', 'Dashboard')

@section('content')
    <main class="my-6">
        <div class="flex flex-col">
            @include('components.sidebar', ['categories' => $categories])
        </div>
    </main>
@endsection
