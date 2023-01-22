@extends('layouts.app')

@section("title")
    Log In Devstagram
@endsection

@section('content')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset("img/login.jpg")}}" alt="loginImage">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                @if (session('message'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('message') }}</p>
                @endif
                <div class="mb-5">
                    <label id="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input type="text" id="email" name="email" placeholder="Your email"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror" 
                        value="{{old('email')}}">

                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label id="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter password"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror" 
                        value="{{old('password')}}">

                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <input type="checkbox" name="remember" class="default:ring-2"> <label class="text-gray-500 text-sm">Keep logged</label>
                </div>                
                <input type="submit" value="Log In" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection