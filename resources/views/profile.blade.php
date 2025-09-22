@extends('layouts.main')
@section('content')
    <div class="w-full bg-gray-600 p-5 rounded-t-lg flex justify-between items-center shadow-lg mb-5">
        <div class="flex justify-around items-center gap-3">
            <img src="{{ asset($user->profile_photo_path) }}" alt="avatar user" class="w-16 h-16 rounded-full">
            <div>
                <h3 class="font-bold text-2xl text-white">{{ $user->name }}</h3>
                <p class="font-light text-white">{{ $user->email }}</p>
            </div>
        </div>
        <form class="w-1/6" method="post" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="w-full cursor-pointer bg-black  text-white font-semibold py-2 rounded-xl
               shadow-md hover:opacity-80 focus:outline-none transition duration-300 ease-in-out">
                Logout
            </button>
        </form>
    </div>

    <div class="w-full px-2">
        @foreach($friends as $friend)
            <a href="{{ route('show.message',$friend->id) }}">
                <div class="w-full cursor-pointer hover:bg-gray-300 transition ease-in-out duration-300 rounded-lg p-2 mb-2">
                    <div class="flex justify-between items-center">
                        <div class="flex justify-around items-center gap-3">
                            <img src="{{ asset($friend->profile_photo_path) }}" alt="avatar user"
                                 class="w-16 h-16 rounded-full">
                            <div>
                                <h3 class="font-bold text-2xl">{{ $friend->name }}</h3>
                                <p class="font-light">{{ $friend->email }}</p>
                            </div>
                        </div>
                    </div>
                    <hr class="opacity-20 mt-2">
                </div>
            </a>
        @endforeach
    </div>

@endsection
