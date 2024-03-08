@extends('layouts.app')

@section('title', 'Welcome')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    <div class="py-20 px-20">

        <!-- Tabs Section -->
        <div class="flex justify-between items-center mb-10 mt-10 ">
            <div class="flex space-x-5 ">
                <button id="tab1" class="tab-active" onclick="toggleTab('tab1')">Rescue a baby</button>
                <button id="tab2" class="tab" onclick="toggleTab('tab2')">Child</button>
                <button id="tab3" class="tab" onclick="toggleTab('tab3')">Mother</button>
            </div>
            {{-- <button class="bg-blue-500 text-white px-4 py-2 rounded-md">Donate</button> --}}
        </div>

        <!-- Banner Section -->
        <div class="bg-white-200 py-4 px-6 flex mb-20 items-center justify-between tab-text" id="tab1Text">
            <div class="flex-1 mr-4 ">
                <h1 class="text-7xl font-bold text-gray-800">Rescue a Baby</h1>
                <h1 class="text-7xl font-bold text-gray-800">Restore Hope</h1>
                <p class="text-lg text-gray-600 mt-10">
                    We provide orphaned and abandoned children with a loving Christian home where they receive all the love,
                    care, protection and practical support they need to thrive.
                </p>
                <p class="text-lg text-gray-600 mt-2">
                    With $38, we are able to rescue a child from wherever they are abandoned, feed them, provide shelter and
                    for some in extreme health conditions, place them under intense medical program.
                </p>
                <!-- Sponsor Button -->
                <a href= "{{ route('contact') }}"
                    class="bg-blue-500 text-white px-4 py-2 rounded-md mt-4">Sponsor</a>
                <button class="bg-blue-500 text-white px-4 py-2 rounded-md mt-4">Sponsor</button>
            </div>
            <div class="flex-1">
                <!-- Image with object-cover to cover the same height as text -->
                <img src="{{ asset('images/swisnl/filament-backgrounds/curated-by-swis/image.jpg') }}" alt="Banner Image"
                    class="h-full w-full object-cover">
            </div>
        </div>

        <!-- Banner Section -->
        <div class="bg-white-200 py-4 px-6 flex mb-20 items-center justify-between tab-text hidden" id="tab2Text">
            <div class="flex-1 mr-4 ">
                <h1 class="text-7xl font-bold text-gray-800">Sponsor a child.</h1>
                <h1 class="text-7xl font-bold text-gray-800 mb-20">Raise a leader.</h1>
                <p class="text-lg text-gray-600 mt-1 mb-10">
                    We provide orphaned and abandoned children with a loving Christian home
                    where they receive all the love, care, protection and practical support they need to thrive.

                </p>
                <p class="text-lg text-gray-600 mt-6 mb-2">
                    With $38, we are able to rescue a child from wherever they are abandoned,
                    feed them, provide shelter and for some in extreme health conditions, place them under intense medical
                    program.
                </p>
                <!-- Sponsor Button -->
                <button class="bg-blue-500 text-white px-4 py-2 rounded-md mt-4 mb-2">Sponsor</button>
            </div>
            <div class="flex-1 flex">
                <!-- Image with object-cover to cover the same height as text -->
                <img src="{{ asset('images/swisnl/filament-backgrounds/curated-by-swis/child.jpg') }}" alt="Banner Image"
                    class="h-1/4 w-full object-cover">
            </div>


        </div>

        <div class="mt-10 bg-gray-200 py-4 px-6 flex items-center justify-between tab-text hidden" id="tab3Text">
            <div class="mr-4">
                <h2 class="text-xl font-bold text-gray-800">Banner Text 3</h2>
                <p class="text-sm text-gray-600 mt-2">Some dummy text for the banner 3</p>
                <p class="text-sm text-gray-600 mt-2">Some dummy text for the banner</p>
                <p class="text-sm text-gray-600 mt-2">Some dummy text for the banner</p>
                <p class="text-sm text-gray-600 mt-2">Some dummy text for the banner</p>
                <p class="text-sm text-gray-600 mt-2">Some dummy text for the banner</p>
            </div>
            <div>
                <img src="https://picsum.photos/200" alt="Banner Image" class="h-12">
            </div>
        </div>


        <div class="container mx-auto px-10 py-10 tab2text hidden" id="cardsSection">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-3">
                @foreach ($cards as $card)
                    <div class="flex flex-col bg-white rounded-lg shadow-md p-4">
                        <img class="w-full h-48 object-cover rounded-lg"
                            src="{{ asset('images/swisnl/filament-backgrounds/curated-by-swis/02.jpg') }}"
                            alt="{{ $card['title'] }}">
                        <h3 class="text-lg font-medium mt-2">{{ $card['title'] }}</h3>
                        <p class="text-gray-600">{{ $card['description'] }}</p>
                        <a href="{{ $card['url'] }}"
                            class="inline-flex items-center px-4 py-2 bg-blue-500 text-white font-bold rounded shadow-md hover:bg-blue-700">
                            {{ $card['button_text'] }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>



        <div class="container mx-auto px-10 py-10 bg-gray-50 mb-20">
            <h2 class="text-3xl text-lg font-bold mb-10">What your sponsorship will do</h2>
            <div class="grid grid-cols-4 gap-4">
                <div class="flex flex-col items-center justify-center">
                    <div class="p-4 rounded-full bg-gray-200 shadow-md">
                        <i class="fas fa-utensils text-7xl mb-2 text-blue-500"></i>
                    </div>
                    <span class="text-lg font-medium mt-2">Feeding</span>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <div class="p-4 rounded-full bg-gray-200 shadow-md">
                        <i class="fas fa-heart text-7xl mb-2 text-teal-500"></i>
                    </div>
                    <span class="text-lg font-medium mt-2">Medical Care</span>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <div class="p-4 rounded-full bg-gray-200 shadow-md">
                        <i class="fas fa-hand-holding-heart text-7xl mb-2 text-purple-500"></i>
                    </div>
                    <span class="text-lg font-medium mt-2">Pastoral Care</span>
                </div>
                <div class="flex flex-col items-center justify-center">
                    <div class="p-4 rounded-full bg-gray-200 shadow-md">
                        <i class="fas fa-graduation-cap text-7xl mb-2 text-orange-500"></i>
                    </div>
                    <span class="text-lg font-medium mt-2">Education</span>
                </div>
            </div>
        </div>

        <div class="container mx-auto px-4 py-8 items-center">
            <div class="flex flex-col items-center justify-center mt-8">
                <h2 class="text-4xl font-bold text-gray-800 mb-4">Sign up today and make a lasting impact in their lives.
                </h2>
                <div class="flex items-center">
                    <a href="#"
                        class="inline-flex items-center px-4 py-2 bg-blue-500 text-white font-bold rounded shadow-md hover:bg-blue-700">
                        Sponsor
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

<script>
    function toggleTab(tabId) {
        // Remove 'tab-active' class from all tabs
        document.querySelectorAll('.tab').forEach(tab => {
            tab.classList.remove('tab-active');
        });

        // Add 'tab-active' class to the clicked tab
        document.getElementById(tabId).classList.add('tab-active');

        // Hide all tab texts
        document.querySelectorAll('.tab-text').forEach(text => {
            text.classList.add('hidden');
        });

        // Show text below the active tab
        document.getElementById(tabId + 'Text').classList.remove('hidden');

        // Show or hide the cards section based on the tab
        if (tabId === 'tab2') {
            document.getElementById('cardsSection').classList.remove('hidden');
        } else {
            document.getElementById('cardsSection').classList.add('hidden');
        }
    }
</script>
