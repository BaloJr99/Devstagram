@extends('layouts.app')

@section("title")
    Sign In Devstagram
@endsection

@section('content')
    <div class="md:flex md:justify-center md:gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src="{{ asset("img/signIn.jpg")}}" alt="signUpImage">
        </div>

        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('register') }}" method="POST" novalidate>
                @csrf
                <div class="mb-5">
                    <label id="name" class="mb-2 block uppercase text-gray-500 font-bold">Name</label>
                    <input type="text" id="name" name="name" placeholder="Your name" 
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror" 
                        value="{{old('name')}}">

                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label id="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input type="text" id="username" name="username" placeholder="Your Username" 
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror" 
                        value="{{old('username')}}">

                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
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
                    <label id="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Repeat Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repeat password" 
                        class="border p-3 w-full rounded-lg @error('password_confirmation') border-red-500 @enderror" 
                        value="{{old('password_confirmation')}}">

                    @error('password_confirmation')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <input type="submit" value="Create Account" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection