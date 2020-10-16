<x-app>
    <header class="mb-6 relative">
        <div class="relative">
        <img src="{{$user->banner}}" alt="" class="mb-2">
        <img src="{{$user->avatar}}" alt="rgrg" class="rounded-full mr-2  absolute bottom-0 transform -translate-x-1/2 translate-y-4 " style="width:150px;left:50%" >
        </div>

    <div class="flex justify-between items-center mt-4">  
         <div>
             <h2 class="font-bold text-2xl" style="max-width:270px">{{$user->name}}</h2>
             <p class="text-sm">Joined {{$user->created_at->diffForHumans()}}</p>
        </div>
        <div class="flex">
            @can('edit',$user)
            <form action="{{$user->path()}}/edit" method="get">
                
            <button type="submit" class="bg-gray-400 rounded-full  shadow px-2 py-2 text-black text-xs mx-4">Edit Profile</button>
            </form>
            @endcan
        <x-follow-button :user="$user"></x-follow-button>
        </div>
    </div>  
    
        <div>

        <p class="text-sm">
           {{$user->description}}
        </p>    

    </div>
    
    
    </header>
@include('_timeline',[
    'tweets'=>$tweets
])
</x-app>
