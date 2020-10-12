<h3 class="font-bold text-xl mb-4">Following</h3>
<ul>
    @forelse (auth()->user()->follows as $user)
        
    
    <li class="{{$loop->last ? '': 'mb-2'}} mb-2">
        <div >
            <a href="{{$user->path()}}" class="flex items-center text-sm">
            <img src="{{$user->avatar}}" alt="{{$user->name}}" class="rounded-full mr-2" width="35">
            {{$user->name}}
            </a>
        </div>
    </li>
    @empty
       <p class="m-4">No friends :(</p> 
    
    @endforelse
</ul>
