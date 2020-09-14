@extends('layouts.app')

@section('content')
    <form action="{{ $user->path() }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-6">
            <label for="username" class="block mb-2 uppercase font-bold text-xs text-gray-700">Username</label>
            <input id="username" type="text" value="{{ $user->username }}" class="border border-gray-400 p-2 w-full @error('username') is-invalid @enderror" name="username" required>
            @error('username')
                <span class="text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-6">
            <label for="name" class="block mb-2 uppercase font-bold text-xs text-gray-700">Name</label>
            <input id="name" type="text" value="{{ $user->name }}" class="border border-gray-400 p-2 w-full @error('name') is-invalid @enderror" name="name" required>
            @error('name')
                <span class="text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-6">
            <label for="avatar" class="block mb-2 uppercase font-bold text-xs text-gray-700">Avatar</label>
            <div class="flex">
                <input id="avatar" type="file" class="border border-gray-400 p-2 w-full @error('avatar') is-invalid @enderror" name="avatar">
                <img src="{{ $user->avatar }}" alt="your avatar" width="40">
                @error('avatar')
                    <span class="text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
        </div>

        <div class="mb-6">
            <label for="email" class="block mb-2 uppercase font-bold text-xs text-gray-700">Email</label>
            <input id="email" type="text" value="{{ $user->email }}" class="border border-gray-400 p-2 w-full @error('email') is-invalid @enderror" name="email" required>
            @error('email')
                <span class="text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password</label>
            <input id="password" type="password" class="border border-gray-400 p-2 w-full @error('password') is-invalid @enderror" name="password" required>
            @error('password')
                <span class="text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-6">
            <label for="password_confirmation" class="block mb-2 uppercase font-bold text-xs text-gray-700">Password Confirmation</label>
            <input id="password_confirmation" type="password" class="border border-gray-400 p-2 w-full @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required>
            @error('password_confirmation')
                <span class="text-red-500" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="mb-6">
            <button type="submit" class="bg-blue-400 text-white py-2 px-4 hover:bg-blue-500 rounded-md mr-4">Submit</button>
            <a href="{{ $user->path() }}">Cancel</a>
        </div>

        
    </form>
@endsection