@extends('layouts.app')

@section('title')
    Edit Profile: {{ auth() -> user() -> username }}
@endsection

@section('content')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form action="{{ route('profile.store') }}" method="POST" class="t-10 md:mt-0" enctype="multipart/form-data">
                @csrf
                <div class="mb-5">
                    <label id="username" class="mb-2 block uppercase text-gray-500 font-bold">Username</label>
                    <input type="text" id="username" name="username" placeholder="Your Username" 
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror" 
                        value="{{ auth() -> user() -> username }}">

                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                @if (session('message'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('message') }}</p>
                @endif
                <div class="mb-5">
                    <label id="oldPassword" class="mb-2 block uppercase text-gray-500 font-bold">Old Password</label>
                    <input type="password" id="oldPassword" name="oldPassword" placeholder="Your Old Password" 
                        class="border p-3 w-full rounded-lg @error('oldPassword') border-red-500 @enderror" 
                        value="{{ auth() -> user() -> oldPassword }}">

                    @error('oldPassword')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label id="password" class="mb-2 block uppercase text-gray-500 font-bold">New Password</label>
                    <input type="password" id="password" name="password" placeholder="Your New Password" 
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">

                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label id="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" 
                        class="border p-3 w-full rounded-lg @error('password_confirmation') border-red-500 @enderror">

                    @error('password_confirmation')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-5">
                    <label id="image" class="mb-2 block uppercase text-gray-500 font-bold">Profile Image</label>
                    <input type="file" accept=".jpg,.png,.jpeg" id="image" name="image" 
                        class="border p-3 w-full rounded-lg @error('image') border-red-500 @enderror">
                </div>
                <input type="submit" value="Save Changes" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection
