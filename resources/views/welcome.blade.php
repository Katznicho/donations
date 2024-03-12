@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <div class="py-20 px-20">

        <!-- Tabs Section -->
        @include('components.tabs')
        <!-- Tabs Section -->

        <!-- Banner Section -->
        @include('components.babytab')
        <!-- Banner Section -->

        <!-- child tab-->
        @include('components.childtab')
        <!-- child tab-->

        <!-- mother tab-->
        @include('components.mothertab')
        <!-- mother tab-->



        <div class="container mx-auto px-10 py-10 tab2text hidden" id="cardsSection">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
                @foreach ($cards as $card)
                    <div class="flex flex-col bg-white rounded-lg shadow-md p-4">
                        <img class="w-full h-48 object-cover rounded-none"
                            src="{{ asset('images/swisnl/filament-backgrounds/curated-by-swis/moses.jpg') }}"
                            alt="{{ $card['title'] }}">
                        <h3 class="text-lg font-medium mt-2">{{ $card['title'] }}</h3>
                        <p class="text-gray-600">{{ $card['description'] }}</p>
                        <a href="{{ route('contact') }}"
                            class="inline-flex w-1/2 items-center px-4 py-2 bg-blue-500 text-white font-bold shadow-md hover:bg-blue-700">
                            {{ $card['button_text'] }}
                        </a>

                    </div>
                @endforeach
            </div>
        </div>



@include('components.sponsorship')

        <div class="container mx-auto px-4 py-8 items-center">
            <div class="flex flex-col items-center justify-center mt-8">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Sign up today and make a lasting impact in their lives.
                </h2>
                <div class="flex items-center">
                    
                    <a href="{{ route('contact') }}"
                        class="inline-flex  items-center px-4 py-2 bg-blue-500 text-white font-bold shadow-md hover:bg-blue-700">
                        {{ $card['button_text'] }}
                    </a>
                </div>
            </div>
        </div>








    </div>
@endsection

<style>
    .tab {
        @apply bg-gray-500 text-white px-4 py-2 rounded-md cursor-pointer;
        border-bottom: 2px solid transparent;
    }

    .tab-active {
        @apply bg-gray-500 text-white px-4 py-2 rounded-md cursor-pointer;
        border-bottom: 2px solid blue;
    }

    .tab-text {
        @apply text-black;
    }
</style>
