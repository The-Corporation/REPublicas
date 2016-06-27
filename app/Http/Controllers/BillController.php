<?php

namespace Republicas\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use Republicas\Http\Requests;
use Republicas\Http\Controllers\Controller;
use Republicas\Models\Bill;
use Republicas\Models\BillType;
use Republicas\Models\Republic;
use Republicas\Models\User;
use Yajra\Datatables\Datatables;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($repId)
    {
        $bills = Bill::where('republic_id', $repId)->where('is_paid', '=', false)
                            ->orderBy('due_date')->get();
        $republica = Republic::findOrFail($repId);
        $bill_types = BillType::where('republic_id', '=', $republica->id);

        return view('bills.index', compact('republica', 'bills', 'bill_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $repId)
    {
        $republica = Republic::findOrFail($repId);

        $date = Carbon::createFromFormat('d/m/Y', $request['due_date']);
        $value = str_replace('R$ ', '', $request['value']); // Remove o R$ da máscara

        $bill = new Bill();
        $bill->name = $request['name'];
        $bill->due_date = $date;
        $bill->value = $value;
        $bill->republic()->associate($republica);
        $bill->billtype()->associate($request['billtype_id']);
        $bill->responsible()->associate($request['user_id']);
        $bill->save();

        return redirect()->route('bill_index', $republica);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $repId, $billId)
    {
        if(!\Request::ajax()) {
            abort(403);
        }

        $inputs = [];
        foreach($request['data'] as $data) {
            $inputs[$data['name']] = $data['value'];
        }

        $date = Carbon::createFromFormat('d/m/Y', $inputs['due_date']);
        $value = str_replace('R$ ', '', $inputs['value']); // Remove o R$ da máscara

        $bill = Bill::findOrFail($billId);
        $bill->name = $inputs['name'];
        $bill->due_date = $date;
        $bill->value = $value;
        $bill->republic()->associate($repId);
        $bill->billtype()->associate($inputs['billtype_id']);
        $bill->responsible()->associate($inputs['user_id']);
        $bill->update();

        if($bill)
            return response()->json(['status' => 'success', 'rep_id' => $repId]);
        else
            return response()->json(['status' => 'fail']);
    }

    public function payment($billId)
    {
        if(!\Request::ajax()) {
            abort(403);
        }

        $bill = Bill::findOrFail($billId);
        $bill->is_paid = true;
        $bill->update();

        if($bill->is_paid)
            return response()->json(['status' => 'success', 'bill' => $bill->billtype->name]);
        else
            return response()->json(['status' => 'fail']);
    }
}
