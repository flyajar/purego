@extends('master')

@section('content')
    <div class="antialiased bg-gray-100 h-screen">

        @include('heading')

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
