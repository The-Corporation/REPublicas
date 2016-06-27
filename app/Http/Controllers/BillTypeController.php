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
    public function index($repId)
    {
        $billtypes = BillType::where('republic_id', '=', $repId)->get();

        return view('billtypes.index', compact('billtypes'));
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($repId, $billTypeId)
    {
        $billtype = BillType::findOrFail($billTypeId);

        return view('billtypes.edit', compact('billtype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $repId, $billtypeId)
    {
        $billtype = BillType::findOrFail($billtypeId);
        $billtype->fill($request->all());
        $billtype->update();

        return redirect()->route('billtype_index', $repId);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($repId, $id)
    {
        $type = BillType::findOrFail($id);
        $type->delete();

        return redirect()->route('billtype_index', $repId);

    }
}
