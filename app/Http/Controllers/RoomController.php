<?php

namespace Republicas\Http\Controllers;

use Illuminate\Http\Request;
use Republicas\Http\Controllers\Controller;
use Republicas\Http\Requests;
use Republicas\Models\Republic;
use Republicas\Models\Room;
use Republicas\Models\User;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($repId)
    {
        $republica = Republic::findOrFail($repId);

        return view('rooms.index', compact('republica'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($repId, $roomId)
    {
        $room = Room::findOrFail($roomId);
        $republica = $room->republic;
        $users = User::join('republic_users', 'users.id', '=', 'republic_users.user_id')
                                ->where('republic_users.republic_id', $repId)
                                ->get();

        return view('rooms.edit', compact('room', 'republica', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $repId, $roomId)
    {
        $room = Room::findOrFail($roomId);
        $room->fill($request->all());

        if(isset($request['user_id'])) {
            foreach ($request['user_id'] as $key => $user_id) {
                $user = User::findOrFail($user_id);
                $room->users()->save($user);
            }
        }

        $room->update();

        return redirect()->route('room_index', $repId);
    }
}
