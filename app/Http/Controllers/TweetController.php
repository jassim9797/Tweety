<?php

namespace App\Http\Controllers;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TweetController extends Controller
{
    public function store()
    {
        $attributes = request()->validate(['body'=>'required|max:255']);
        Tweet::create([
            'user_id'=>auth()->id(),
            'body'=>$attributes['body']
        ]);
        
        return redirect('/tweets');
    }

    public function index()
    {

        return view('tweets.index',[
            'tweets'=>auth()->user()->timeline()
        ]);
    }

    public function tweets()
    {
        $tweets = Tweet::all();
        return $tweets;
    }

    public function like(Tweet $tweet)
    {
        $tweet->like();
        return back();
    }

    public function dislike(Tweet $tweet)
    {
        $tweet->dislike();
        return back();
    }

    public function unlike(Tweet $tweet)
    {   
        $tweet->likes()->where('user_id',auth()->user()->id)->delete();
        return back();
    }

    public function undislike(Tweet $tweet)
    {   
        $tweet->likes()->where('user_id',auth()->user()->id)->where('liked',0)->delete();
        return back();
    }


}
