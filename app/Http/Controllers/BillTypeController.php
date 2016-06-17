<?php

namespace Republicas\Http\Controllers;

use Illuminate\Http\Request;
use Republicas\Models\BillType;
use Republicas\Http\Requests;
use Republicas\Http\Controllers\Controller;

class BillTypeController extends Controller
{

    public function addBillType(Request $request, $repId)
    {
        if(!\Request::ajax()) {
            abort(403);
        }

        $datas = $request['data'];
        $inputs = [];

        foreach($datas as $data) {
            $inputs[$data['name']] = $data['value'];
        }

        $billType = BillType::create($inputs);
        $billType->republic()->associate($repId);
        $billType->save();

        if($billType)
            return response()->json(['status' => 'success', 'billtype' => $billType]);
        else
            return response()->json(['status' => 'fail']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function tipos()
    {
        $rep_id =  \Auth::user()->republic->id;
        if(isset($rep_id)){
            $rep_id = \Auth::user()->republics->first()->id;
        }

        $billtypes = BillType::where('republic_id', '=', $rep_id)->get();

        return view('bills.types')->with('billtypes', $billtypes);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type = BillType::findOrFail($id);

        return view('bills.edit')->with('type',$type);
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
        $type = BillType::findOrFail($id);
        $type->fill($request->all());
        $type->update();

        return redirect()->route('bill_Type',[$type->republic_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = BillType::findOrFail($id);
        $type->delete();

        return redirect()->route('bill_Txype',[$type->republic_id]);

    }
}
