<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ReplyRequest;
use App\Reply;
use App\Thread;
use Auth;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function __construct()
    {
        //Auhtenticate
        $this->middleware('auth')->only('store');

        //Authorize
        $this->authorizeResource(Reply::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReplyRequest $request, Category $category, Thread $thread)
    {
        $thread->addReply(Auth::user());

        return back()
            ->with('flash', 'Thank you for participating in the thread. Your reply will be posted as soon as possible');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(ReplyRequest $request, Reply $reply)
    {
        $reply->update([
            'body' => $request->body
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        $reply->delete();

        return back()
            ->with('flash', 'Your reply has been deleted.');
    }

    protected function resourceAbilityMap()
    {
         return [
            'update'  => 'access',
            'destroy' => 'access',
        ];
    }
}