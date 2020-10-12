<x-app>
<form action="{{$user->path()}}" method="post" class="  container mx-auto" enctype="multipart/form-data">
@csrf
@method('PATCH')

    <div>
        <label for="name" class="block text-sm font-bold mb-1 mx-4  text-gray-700">NAME</label>
    <input type="text" name="name" id="name" value="{{$user->name}}" class="shadow appearance-none border rounded mx-4  text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full py-1" required>
    </div>


    <div>
        <label for="username" class="block text-sm font-bold mb-1 mx-4 mt-5 text-gray-700">USERNAME</label>
        <input type="text" name="username" value="{{$user->username}}" id="username" class="shadow appearance-none border rounded mx-4  text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full py-1" required>
    </div>


    <div>
        <label for="avatar" class="block text-sm font-bold mb-1 mx-4 mt-5 text-gray-700">AVATAR</label>
        <input type="file" name="avatar"  id="avatar" class="shadow appearance-none border rounded mx-4  text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full py-1" >
        <img src="{{$user->avatar}}" alt="" width="40" class="mx-4">
    </div>

    <div>
        <label for="Email" class="block text-sm font-bold mb-1 mx-4 mt-5 text-gray-700">EMAIL</label>
        <input type="email" name="email" value="{{$user->email}}" id="email" class="shadow appearance-none border rounded mx-4  text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full py-1" required>
    </div>


    <div>
        <label for="password" class="block text-sm font-bold mb-1 mx-4 mt-5 text-gray-700">PASSWORD</label>
        <input type="password" name="password"   class="shadow appearance-none border rounded mx-4  text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full py-1" >
        <label for="password_confirmation" class="block text-sm font-bold mb-1 mx-4 mt-5 text-gray-700">PASSWORD CONFIRMATION</label>
        <input type="password" name="password_confirmation"  id="password_confirmation" class="shadow appearance-none border rounded mx-4  text-gray-700 leading-tight focus:outline-none focus:shadow-outline w-full py-1" >
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<button type="submit" class="bg-blue-500 rounded-lg mx-4 mt-2 px-4 py-1 text-white">EDIT</button>
<button type="button" onclick="location.href='{{$user->path()}}'" href='' class="bg-gray-500 rounded-lg mx-4 mt-2 px-4 py-1 text-black">CANCEL</button>
</form>
</x-app>