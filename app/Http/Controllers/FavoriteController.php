<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Reply;
use Auth;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Reply $reply)
    {
        if ($reply->isFavorited())
        {
            flash()->error('Already favorited');
        }
        else{

            $reply->favorite();

            flash()->success('Your favorite has been saved');
        }

        return back();
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        $reply->favorites()->where('user_id', Auth::id())->delete();
    }
}
