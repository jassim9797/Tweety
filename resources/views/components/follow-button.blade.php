@if (auth()->user()->isNot($user))
<form action="/profiles/{{$user->username}}/follow" method="post">
    @csrf
    <button type="submit" class="bg-blue-500 rounded-full shadow px-2 py-2 text-white text-xs mx-4">
        {{auth()->user()->following($user)?'Unfollow':'Follow'}}
    </button>
</form>
@endif