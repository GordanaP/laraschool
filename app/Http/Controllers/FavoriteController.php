<?php

namespace App\Http\Controllers;

use App\Favorite;
use App\Reply;
use Auth;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Reply $reply)
    {
        $reply->favoriteBy(Auth::user());

        flash()->success('Your favorite has been added to the reply');

        return back();
    }
}
