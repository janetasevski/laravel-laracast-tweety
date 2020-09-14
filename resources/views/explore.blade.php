@extends('layouts.app')

@section('content')
    @foreach ($users as $user)
        <a href="{{ $user->path() }}" class="flex items-center mb-5">
            <img src="{{ $user->avatar }}" alt="{{ $user->name }}'s avatar'" class="mr-4" width="50">
            <div>
                <h4 class="font-bold">{{ '@'.$user->username }}</h4>
            </div>
        </a>
    @endforeach
    <div class="flex">
        {{ $users->links('pagination::simple-tailwind') }}
    </div>
@endsection