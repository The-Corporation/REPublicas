<?php

namespace Republicas\Http\Controllers;

use Illuminate\Http\Request;

use Republicas\Http\Requests;
use Republicas\Http\Controllers\Controller;
use Republicas\Models\User;

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

    public function invite()
    {
        $users = User::all();

        return view('republics.invite', compact('users'));
    }
}
