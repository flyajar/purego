@extends('master')

@section('content')
    <div class="antialiased bg-gray-100 h-screen">


        <!-- Section 1 -->
        <section class="w-full px-8 text-gray-700">
            <div class="container flex flex-col flex-wrap items-center justify-between py-5 mx-auto md:flex-row max-w-7xl">
                <div class="relative flex flex-col md:flex-row">
                    <a href="#_" class="flex items-center mb-5 font-medium text-gray-900 lg:w-auto lg:items-center lg:justify-center md:mb-0">
                        <span class="mx-auto text-5xl font-black leading-none text-gray-900 select-none">Pure<span class="text-indigo-600">GO</span></span>
                    </a>
                    <nav class="flex flex-wrap items-center mb-5 text-base md:mb-0 md:pl-8 md:ml-8 md:border-l md:border-gray-200">
                        <a href="#_" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">Donate</a>
                        <a href="#_" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">Projects</a>
                        <a href="#_" class="mr-5 font-medium leading-6 text-gray-600 hover:text-gray-900">About Us</a>
                    </nav>
                </div>
            </div>
        </section>



        <!-- Section 1 -->
        <section class=" w-full px-8 py-16 xl:px-8">
            <div class="max-w-5xl mx-auto">
                <div class="flex flex-col items-center md:flex-row">

                    <div class="w-full space-y-5 md:w-3/5 md:pr-16">
                        <p class="font-medium text-blue-500 uppercase">Restoring the natural world</p>
                        <h2 class="text-2xl font-extrabold leading-none text-black sm:text-3xl md:text-5xl">
                          Changing The Way People See Nature
                        </h2>
                        <p class="text-xl text-gray-600 md:pr-16">Our mission is to conserve nature and reduce the most pressing threaths to the diversity of life on Earth.</p>
                    </div>

                    <div class="w-full mt-16 md:mt-0 md:w-2/5">
                        <div class="relative z-10 h-auto p-8 py-10 overflow-hidden bg-white border-b-2 border-gray-300 rounded-lg shadow-2xl px-7">
                            <h3 class="mb-6 text-2xl font-medium text-center">Donate via <img src="{{ asset('images/gcash.png') }}" class="w-full" alt="gcash"></h3>
                            <form action="/donate" method="POST">
                                @csrf
                                <input type="number" name="amount" value="{{ old('amount') }}" class="block w-full px-4 py-3 border border-2 border-transparent border-gray-200 rounded-lg focus:ring focus:ring-blue-500 focus:outline-none" step="1" placeholder="Amount">
                                <span class="text-sm px-2">Gcash only accepts less than 100,000 amount</span>
                                @if($errors->has('amount'))
                                    <div class="text-red-400 px-2 text-sm">{{ $errors->first('amount') }}</div>
                                @endif
                                <div class="block">
                                    <button class="w-full px-3 py-4 font-extrabold text-white bg-indigo-600 rounded-lg ">Donate</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>


    </div>
@endsection
