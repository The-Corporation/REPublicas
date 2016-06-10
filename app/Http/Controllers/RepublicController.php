<?php

namespace Republicas\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Republicas\Http\Requests;
use Republicas\Models\Republic;
use Republicas\Models\User;

class RepublicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->republic == null && isset(Auth::user()->republics)) {
            return view('republics.create');
        } else {
            if(Auth::user()->republic != null)
                $republica = Auth::user()->republic;
            else
                $republica = Auth::user()->republics->first();

            return view('republics.index', compact('republica'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('republics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $current_user = Auth::user();
        $republica = Republic::create($request->all());
        $republica->responsible()->associate($current_user);
        $republica->users()->attach($current_user);

        $republica->save();

        return redirect()->route('home');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idRep)
    {
        $republica = Republic::findOrFail($idRep);

        return view('republics.edit', compact('republica'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $republica = Republic::findOrFail($id);
        $republica->fill($request->all());
        $republica->update();

        return redirect()->route('home');
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

    public function searchUser()
    {

    }

    public function addMember()
    {

    }

    public function addMeta(Request $request, $repId)
    {
        if(!\Request::ajax()) {
            abort(403);
        }

        // Desserealizando o array do form
        $inputs = [];
        foreach($request['data'] as $data) {
            $inputs[$data['name']] = $data['value'];
        }

        $republica = Republic::findOrFail($repId);

        if(isset($inputs['simple_price'])) {
            $simple = str_replace('R$ ', '', $inputs['simple_price']); // Remove o R$ da máscara
            $republica->simple_price = $simple;
        }
        if(isset($inputs['suite_price'])) {
            $suite = str_replace('R$ ', '', $inputs['suite_price']); // Remove o R$ da máscara
            $republica->suite_price = $suite;
        }
        $republica->save();

        if($republica)
            return response()->json(['status' => 'success']);
        else
            return response()->json(['status' => 'fail']);
    }
}
