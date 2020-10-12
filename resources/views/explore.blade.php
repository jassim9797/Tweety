<x-app>
    <main>
        @foreach ($users as $user)
            <a href="{{$user->path()}}">
                <div class="flex  mb-5"href="google.com">
                    <img src="{{$user->avatar}}"alt="{{$user->username}}'s avatar" width=50 class="mr-4 rounded-full">
                    <h4 class="font-bold">{{'@'.$user->name}}</h4>
                    <x-follow-button :user="$user"></x-follow-button>
                </div>
            </a>
        @endforeach
    </main>
</x-app>   