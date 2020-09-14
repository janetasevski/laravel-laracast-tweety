@extends('layouts.app')

@section('content')
    <header class="mb-6">
        <div class="relative">
            <img src="/images/default_banner.jpg" alt="default banner" class="rounded-lg mb-2">
            <img class="rounded-full mr-2 absolute bottom-0 transform -translate-x-1/2 translate-y-1/2" width="150" style="left:50%" src="{{ $user->avatar }}" alt="avatar">
        </div>

        <div class="flex justify-between items-center mb-4">
            <div style="max-width:270px">
                <h2 class="font-bold text-2xl mb-0">{{ $user->name }}</h2>
                <p class="text-sm">Joined {{ $user->created_at->diffForHumans() }}</p>
            </div>

            <div class="flex">
                @can('edit', $user)          
                    <a href="{{ $user->path('edit') }}" class="rounded-full border border-gray-300 py-2 px-4 text-black text-xs mr-2">Edit Profile</a>
                @endcan
                
                @if (current_user()->isNot($user))
                    <form action="{{ route('follow', $user) }}" method="post">
                        @csrf
                        <button type="submit" class="bg-blue-500 rounded-full shadow py-2 px-4 text-white text-xs">
                            {{ auth()->user()->folowing($user) ? 'Unfollow Me' : 'Follow Me' }}
                        </button>
                    </form>    
                @endif
            </div>
        </div>
        <p class="text-sm">
            Exercitation ullamco commodo duis velit et commodo. Adipisicing deserunt reprehenderit elit deserunt nostrud laboris anim veniam sit cillum eu excepteur. Ex sunt consectetur cillum anim labore ea magna cillum sunt pariatur irure nisi ullamco.
        </p>
        
        
    </header>
    @include('_timeline', [
        'tweets' => $tweets
    ])
@endsection