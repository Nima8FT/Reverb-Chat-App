@extends('auth.layouts.main')
@section('content')
    <div class="w-full">
        <h1 class="text-3xl mb-3 font-bold">Register</h1>
        <hr class="opacity-20">
    </div>

    <form class="w-full" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-5">
            <label for="name" class="block text-md font-medium text-gray-700 mb-1">Name:</label>
            <input type="name" id="name" name="name" placeholder="Enter your name" required value="{{ old('name') }}"
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-white shadow-sm
                      focus:outline-none focus:ring-1 focus:ring-gray-500 focus:border-gray-400
                      transition duration-300 ease-in-out"/>
            @error('name')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="email" class="block text-md font-medium text-gray-700 mb-1">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required value="{{ old('email') }}"
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-white shadow-sm
                      focus:outline-none focus:ring-1 focus:ring-gray-500 focus:border-gray-400
                      transition duration-300 ease-in-out"/>
            @error('email')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="password" class="block text-md font-medium text-gray-700 mb-1">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-white shadow-sm
                      focus:outline-none focus:ring-1 focus:ring-gray-500 focus:border-gray-400
                      transition duration-300 ease-in-out"/>
            @error('password')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-5">
            <label for="photo" class="block text-md font-medium text-gray-700 mb-1">Photo:</label>
            <input type="file" id="photo" name="photo"
                   class="w-full px-4 py-3 rounded-xl border border-gray-300 bg-white shadow-sm
                      focus:outline-none focus:ring-1 focus:ring-gray-500 focus:border-gray-400
                      transition duration-300 ease-in-out"/>
            @error('photo')
            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mt-5">
            <button type="submit"
                    class="w-full cursor-pointer border-1 border-gray-500  text-black font-semibold py-3 rounded-xl
               shadow-md hover:bg-gray-700 hover:text-white focus:outline-none transition duration-300 ease-in-out">
                Register
            </button>
        </div>
    </form>

    <div class="text-lg">
        <span class="opacity-50">Already Register ?</span>
        <a href="{{ route('show.login') }}">Login now</a>
    </div>
@endsection
