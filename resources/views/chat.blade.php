@extends('layouts.main')
@section('content')
    <div class="w-full bg-gray-600 p-5 rounded-t-lg flex justify-between items-center shadow-lg">
        <div class="flex justify-around items-center gap-3">
            <img src="{{ asset($user->profile_photo_path) }}" alt="avatar user" class="w-16 h-16 rounded-full">
            <div>
                <h3 class="font-bold text-2xl text-white">{{ $user->name }}</h3>
                <p class="font-light text-white">{{ $user->email }}</p>
            </div>
        </div>
        <form class="w-1/6" method="get" action="{{ route('profile') }}">
            @csrf
            <button type="submit"
                    class="w-full cursor-pointer bg-black  text-white font-semibold py-2 rounded-xl
               shadow-md hover:opacity-80 focus:outline-none transition duration-300 ease-in-out">
                Back
            </button>
        </form>
    </div>

    <div class="w-full max-h-[500px] h-[500px] bg-gray-200 p-4 shadow-2xs overflow-y-auto">
        <div class="flex flex-col space-y-4">
            <div class="flex justify-start">
                <div class="w-1/2 bg-gray-500 text-white p-2
                rounded-tr-lg rounded-br-lg rounded-tl-lg">
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Aperiam, officia?
                    </p>
                </div>
            </div>


            <div class="flex justify-end">
                <div class="w-1/2 bg-gray-800 text-white p-2
                rounded-tl-lg rounded-bl-lg rounded-tr-lg">
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Aperiam, officia?
                    </p>
                </div>
            </div>


            <div class="flex justify-start">
                <div class="w-1/2 bg-gray-500 text-white p-2
                rounded-tr-lg rounded-br-lg rounded-tl-lg">
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Aperiam, officia?
                    </p>
                </div>
            </div>


            <div class="flex justify-end">
                <div class="w-1/2 bg-gray-800 text-white p-2
                rounded-tl-lg rounded-bl-lg rounded-tr-lg">
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Aperiam, officia?
                    </p>
                </div>
            </div>


            <div class="flex justify-start">
                <div class="w-1/2 bg-gray-500 text-white p-2
                rounded-tr-lg rounded-br-lg rounded-tl-lg">
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Aperiam, officia?
                    </p>
                </div>
            </div>


            <div class="flex justify-end">
                <div class="w-1/2 bg-gray-800 text-white p-2
                rounded-tl-lg rounded-bl-lg rounded-tr-lg">
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Aperiam, officia?
                    </p>
                </div>
            </div>


            <div class="flex justify-start">
                <div class="w-1/2 bg-gray-500 text-white p-2
                rounded-tr-lg rounded-br-lg rounded-tl-lg">
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Aperiam, officia?
                    </p>
                </div>
            </div>


            <div class="flex justify-end">
                <div class="w-1/2 bg-gray-800 text-white p-2
                rounded-tl-lg rounded-bl-lg rounded-tr-lg">
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Aperiam, officia?
                    </p>
                </div>
            </div>


            <div class="flex justify-start">
                <div class="w-1/2 bg-gray-500 text-white p-2
                rounded-tr-lg rounded-br-lg rounded-tl-lg">
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Aperiam, officia?
                    </p>
                </div>
            </div>


            <div class="flex justify-end">
                <div class="w-1/2 bg-gray-800 text-white p-2
                rounded-tl-lg rounded-bl-lg rounded-tr-lg">
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                        Aperiam, officia?
                    </p>
                </div>
            </div>
        </div>
    </div>

    <form class="w-full bg-gray-600 p-3 flex justify-between items-center shadow-lg">
        <div class="w-5/6 flex justify-around items-center gap-3">
            <input type="text" id="message" name="message" placeholder="Enter your message" required
                   class="w-full px-4 py-3 rounded-s-xl border border-gray-300 bg-white shadow-sm
                      focus:outline-none focus:ring-1 focus:ring-gray-500 focus:border-gray-400
                      transition duration-300 ease-in-out"/>
        </div>
        <div class="w-1/6">
            <button type="submit"
                    class="w-full cursor-pointer bg-black border border-black text-white font-semibold py-3 rounded-e-xl hover:opacity-80 focus:outline-none transition duration-300 ease-in-out">
                Send
            </button>
        </div>
    </form>

@endsection
