@extends('layouts.app')

@section('title', 'Contact Information')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

    {{-- add css --}}
    <style>
        #toggle:checked+div .dot {
            transform: translateX(100%);
             background-color: #4299e1; 
        }

        #toggle:checked+div .dot {
            background-color: #4299e1;
            /* Change color when checked */
        }

      
    </style>


    {{-- <body class="bg-gray-100"> --}}
    <div class="container mx-auto py-40 px-40 ">
        <!-- Card with individual information -->
        <div class="flex rounded-lg shadow-md mb-8">
            <img class="w-24 h-20 rounded-full object-cover mr-10 mt-2 mb-4 ml-10"
                src="{{ asset('images/swisnl/filament-backgrounds/curated-by-swis/moses.jpg') }}" alt="Placeholder Image">
            <div>
                <h3 class="text-lg font-bold mb-2 text-3xl">Moses Mukisa 12 yrs</h3>
                <p class="text-gray-600 mb-2">Birthday: 11th August 2012</p>
                <p class="text-gray-600">$35/Month</p>
            </div>
        </div>

        <div class="flex items-center mb-4">
            <label for="toggle" class="inline-flex items-center cursor-pointer mr-2">
                <span class="sr-only">Toggle</span>
                <input type="checkbox" id="toggle" name="toggle" value="individual" class="hidden">
                <div class="relative">
                    <div class="w-10 h-6 bg-gray-400 rounded-full shadow-inner"></div>
                    <div
                        class="dot absolute w-6 h-6 bg-white rounded-full shadow-md border border-gray-300 transition transform left-0 top-0">
                    </div>
                </div>
                <span class="ml-2 text-gray-700">Individual</span>
            </label>
            <label for="toggle" class="text-gray-700">Organization</label>
        </div>



        <!-- Form -->
        <div class="border rounded-lg p-4 mb-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label for="first_name" class="block text-gray-700 font-medium mb-2">First Name</label>
                    <input type="text" id="first_name" name="first_name"
                        class="rounded-md border border-gray-300 p-2 w-full">
                </div>
                <div>
                    <label for="last_name" class="block text-gray-700 font-medium mb-2">Last Name</label>
                    <input type="text" id="last_name" name="last_name"
                        class="rounded-md border border-gray-300 p-2 w-full">
                </div>
            </div>
            <div class="mt-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email Address</label>
                <input type="email" id="email" name="email" class="rounded-md border border-gray-300 p-2 w-full">
            </div>
            <div class="mt-4">
                <label for="address" class="block text-gray-700 font-medium mb-2">Physical Address</label>
                <input type="text" id="address" name="address" class="rounded-md border border-gray-300 p-2 w-full">
            </div>

            <div class ="mt-4">
                <label for="contact_number" class="block text-gray-700 font-medium mb-2">Contact Number</label>
                <input type="text" id="contact_number" name="contact_number"
                    class="rounded-md border border-gray-300 p-2 w-full">
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">

                <div>
                    <label for="country" class="block text-gray-700 font-medium mb-2">Country</label>
                    <select id="country" name="country" class="rounded-md border border-gray-300 p-2 w-full">
                        <option value="">Select Country</option>
                        <!-- Add options for countries -->
                    </select>
                </div>

                <div>
                    <label for="state" class="block text-gray-700 font-medium mb-2">State</label>
                    <select id="state" name="state" class="rounded-md border border-gray-300 p-2 w-full">
                        <option value="">Select State</option>
                        <!-- Add options for states -->
                    </select>
                </div>
            </div>

            <div class="mt-4">
                <label for="zip_code" class="block text-gray-700 font-medium mb-2">Zip/Postal Code</label>
                <input type="text" id="zip_code" name="zip_code" class="rounded-md border border-gray-300 p-2 w-full">
            </div>
            <div class="mt-4">
                <label for="billing_address" class="inline-flex items-center cursor-pointer">
                    <input type="checkbox" id="billing_address" name="billing_address"
                        class="rounded-full bg-gray-200 border-gray-300 focus:outline-none focus-ring w-4 h-4 checked:bg-blue-500 focus:ring-blue-600">
                    <span class="ml-2 text-gray-700">Same Billing Address</span>
                </label>
            </div>
        </div>

        <!-- Proceed to payment button -->
        <div class="flex justify-center">
            <button class="bg-blue-500 text-white px-6 py-3 rounded-md">Proceed to Payment</button>
        </div>
    </div>
    {{-- </body> --}}
    {{-- </html> --}}

@endsection
