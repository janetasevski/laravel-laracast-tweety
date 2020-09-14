<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form action="/tweets" method="POST">
        @csrf
        <textarea name="body" class="w-full" placeholder="What's up doc?" required></textarea>
        <hr class="my-4">
        <footer class="flex justify-between">
            <img class="avatar rounded-full mr-4" style="width: 40px;" src="{{ auth()->user()->avatar }}" alt="avatar">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 rounded-lg shadow py-2 px-10 text-sm text-white">Publish</button>
        </footer>
    </form>
    @error('body')
        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>        
    @enderror
</div>