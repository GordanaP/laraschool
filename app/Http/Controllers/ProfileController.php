<?php

namespace App\Http\Controllers;

use App\Activity;
use App\{Thread, User};
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $per_page = 10;

    public function __construct()
    {
        return $this->middleware('auth')->only('activities');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $threads = $user->threads()->paginate($this->per_page);

        return view('profiles.show', compact('user', 'threads'));
    }

    /**
     * Display the specified resource activities.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function activities(User $user)
    {
        $activities = Activity::feed($user);

        return view('profiles.activities', compact('user', 'activities'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
