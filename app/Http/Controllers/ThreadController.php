<?php

namespace App\Http\Controllers;

use App\{Category, Thread};
use App\Filters\ThreadFilters;
use App\Http\Requests\ThreadRequest;
use Auth;

class ThreadController extends Controller
{
    protected $per_page = 10;

    public function __construct()
    {
        //Auhtenticate
        $this->middleware('auth')->only('create', 'store');

        //Authorize
        $this->authorizeResource(Thread::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ThreadFilters $filters)
    {
        $threads = Thread::filter($filters)->latest()->paginate($this->per_page);

        return view('threads.index', compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('threads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ThreadRequest $request)
    {
        $thread = Auth::user()->createThread($request->all());

        flash()->success('A new thread has been created.');
        return redirect($thread->path('show'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Thread $thread)
    {
        $replies = $thread->replies()->paginate(10);

        return view('threads.show', compact('thread', 'replies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, Thread $thread)
    {
        return view('threads.edit', compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(ThreadRequest $request, Category $category, Thread $thread)
    {
        $thread->update($request->all());

        flash()->success('The thread has been updated');
        return redirect($thread->path('show'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, Thread $thread)
    {
        $thread->delete();

        flash()->success('The thread has been deleted');
        return redirect()->route('threads.index', append('author', Auth::user()->name));
    }

    protected function resourceAbilityMap()
    {
         return [
            'edit'    => 'view',
            'update'  => 'update',
            'destroy' => 'delete',
        ];
    }
}
