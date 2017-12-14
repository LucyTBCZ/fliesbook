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
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $friendsaccepted = Friend::where([
            'user_id' => Auth::User()->id,
            'status' => 'accepted'
        ])->get();
        $friendspending = Friend::where([
            'friend_id' => Auth::User()->id,
            'status' => 'pending'
        ])->get();
        return view('friend', compact('friendsaccepted', 'friendspending'));
    }

    public function postFriend(Request $request)
    {
        if($request->has('add_friend'))
        {
            $user = User::where('name', $request->input('user_name'))->firstOrFail();
            $friend = Friend::where([
                'user_id' => Auth::User()->id,
                'friend_id' => $user->id
            ])->first();
            
            if(!$friend && Auth::User()->id !== $user->id) {
                Friend::create([
                    'user_id' => Auth::User()->id,
                    'friend_id' => $user->id,
                    'status' => 'pending'
                ]);
            }
        }
        else if($request->has('accept_friend'))
        {
            $friend = Friend::where([
                'user_id' => $request->input('user_id'),
                'friend_id' => Auth::User()->id
            ])->firstOrFail();
            $friend->status = 'accepted';
            $friend->save();

            Friend::updateOrCreate([
                'user_id' => Auth::User()->id,
                'friend_id' => $request->input('user_id'),
                'status' => 'accepted'
            ]);
        }
        else if($request->has('refuse_friend'))
        {
            Friend::where([
                'user_id' => $request->input('user_id'),
                'friend_id' => Auth::User()->id
            ])->firstOrFail()->delete();
        }
        return redirect()->route('profile.friends');
    }

    public function removefriend(Request $request)
    {
        Friend::where([
            'user_id' => Auth::User()->id,
            'friend_id' => $request->input('user_id')
        ])->firstOrFail()->delete();
        Friend::where([
            'user_id' => $request->input('user_id'),
            'friend_id' => Auth::User()->id
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
