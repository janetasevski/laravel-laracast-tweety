<div class="bg-blue-100 border border-gray-300 rounded-lg p-4">
    <h3 class="font-bold text-xl mb-4">Following</h3>

    <ul>
        @forelse (auth()->user()->follows as $user)
            <li class="{{ $loop->last ? '' : 'mb-4' }}">
                <a href="{{ route('profile', $user) }}" class="flex items-center text-sm">
                    <img class="rounded-full mr-2" width="40px" src="{{ $user->avatar }}" alt="avatar">
                    {{ $user->name }}
                </a>
            </li>
        @empty
            <li>No friends yet.</li>
        @endforelse
    </ul>
</div>