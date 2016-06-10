<?php

namespace Republicas\Http\Controllers;

use Illuminate\Http\Request;

use Republicas\Http\Requests;
use Republicas\Http\Controllers\Controller;
use Republicas\Models\User;
use Auth;

class UserController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($userId)
    {
        $user = User::findOrFail($userId);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $user->fill($request->except('photo'));

        if(isset($request['photo'])) {
            $photo = $request->file('photo');
            $user->photo = $user->uploadImage($photo, 'users/');
        }

        $user->update();

        return redirect()->route('user_edit', $user->id);
    }

    public function updatePass(Request $request, $userId)
    {
        if(!\Request::ajax()) {
            abort(403);
        }

        $user = User::findOrFail($userId);
        $user->password = bcrypt($request['data']);
        $user->update();

        if($user)
            return response()->json(['status' => 'success']);
        else
            return response()->json(['status' => 'fail']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();

        if($user)
            Auth::logout();
    }

    public function invite()
    {
        $users = User::all();

        return view('republics.invite', compact('users'));
    }
}
