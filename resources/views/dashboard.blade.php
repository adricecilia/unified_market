@extends('partials.base')

@section('title', 'Dashboard')

@section('content')
    <div class="bg-gray-50 text-black/50 dark:bg-orange-200 dark:text-white/50">
        <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                @include('partials.header')
                <main class="mt-6">
                    <div class="grid gap-6">
                        @foreach($categories as $category)
                            <!-- Category Card -->
                            <h3 class="text-xl font-semibold text-black dark:text-black">{{ $category->name }}</h3>
                            <div id="{{ $category->slug }}" class="grid grid-cols-3 items-start gap-6 overflow-hidden
                            rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0
                            .05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                                <!-- Product Card -->
                                @foreach($category->products as $product)
                                    <div>
                                        <div class="relative flex w-full flex-1 items-stretch mb-3">
                                            <img
                                                src="{{ $product->thumbnail }}"
                                                alt="{{ $product->name }}"
                                                class="aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover
                                                drop-shadow-[0px_4px_34px_rgba(0,0,0,0.06)]"
                                            />
                                        </div>

                                        <div class="relative flex items-center gap-6 lg:items-end">
                                            <div class="flex items-start gap-6 lg:flex-col">
                                                <div class="pt-3 sm:pt-5 lg:pt-0">
                                                    <h2 class="text-xl font-semibold text-black dark:text-white">{{
                                                    $product->name }}</h2>
                                                    <p class="my-2 text-sm/relaxed">{{ $product->packaging }}</p>

                                                    <div class="flex gap-x-5">
                                                        <p class="mt-4 text-base text-red-500 line-through">{{$product->previous_unit_price * (($product->tax_percentage / 100) + 1)}}€</p>
                                                        <p class="mt-4 text-base">{{$product->unit_price *(($product->tax_percentage / 100) + 1)}}€</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        @endforeach

                    </div>
                </main>

                @include('partials.footer')
            </div>
        </div>
    </div>
@endsection
