<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{



    public function show(User $user)
    {
        
        return view('profiles.show',[
            'user'=>$user,
            'tweets'=>$user->tweets()->paginate(20)
        ]);
    }

    public function edit(User $user)
    {
        $this->authorize('edit',$user);

        return view("profiles.edit",compact('user'));
    }

    public function update(User $user)
    {
        
        $this->authorize('edit',$user);
        
       $attributes =  request()->validate([
            'name' => 'required|max:255|string',
            'username' => "required|unique:users,username,{$user->id}|max:255|alpha_dash",
            'password' => 'string|min:8|max:255|confirmed|nullable',
            'email'=>"string|email|required|max:255|unique:users,email,{$user->id}",
            'avatar'=>'file',
            'banner'=>'file',
            'description'=>'max:255|string|nullable'
        ]);
        if ($attributes['password']=='') {
            $attributes['password'] = $user->password;
        }
        if(request('avatar'))
        {
         $attributes['avatar']=request('avatar')->store('avatars');   
        }

        if(request('banner'))
        {
         $attributes['banner']=request('banner')->store('banner');   
        }
        
        $user->update($attributes);
        return redirect($user->path());
    }
}
