<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Friend;
use App\FoodOption;
use App\RaceOption;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options=FoodOption::all();
        $specimens=RaceOption::all();
        return view('profile', compact('options', 'specimens'));

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    
    public function friends()
    {
        $friends = Friend::where('user_id', Auth::User()->id)->get();
        return view('friend', compact('friends'));
    }

    public function storefriend(Request $request)
    {
        $user = User::where('name', $request->input('user_name'))->firstOrFail();
        Friend::updateOrCreate([
            'user_id' => Auth::User()->id,
            'friend_id' => $user->id
        ]);
        return redirect()->route('profile.friends');
    }

    public function removefriend(Request $request)
    {
        Friend::where([
            'user_id' => Auth::User()->id,
            'friend_id' => $request->input('user_id')
        ])->firstOrFail()->delete();
        return redirect()->route('profile.friends');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find(Auth::User()->id);
        $user->race = $request->input('race');
        $user->family = $request->input('family');
        $user->age = $request->input('age');
        $user->food = $request->input('food');
        $user->save();

        return redirect()->route('profil.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
