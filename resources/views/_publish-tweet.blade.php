<div class="border border-blue-400 rounded-lg px-8 py-6 mb-8">
    <form method="POST" action="/tweets">
        @csrf
        <textarea name="body" class="w-full" placeholder="What's in your mind?" required></textarea>
    <hr class=" m-2" >
    <footer class="flex justify-between place-items-center">
        <img src={{auth()->user()->avatar}} alt="avatar" class="rounded-full mr-2" width="50" height="50" >
        <button type="submit" class="bg-blue-500 rounded-lg shadow px-10 py-2 text-white text-sm hover:bg-blue-700">Tweet!</button>
    </footer>
    </form>
    @if ($errors->any())
    <div class="text-red-500 text-sm">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>