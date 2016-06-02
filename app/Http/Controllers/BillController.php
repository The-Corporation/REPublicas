<?php

namespace Republicas\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use Republicas\Http\Requests;
use Republicas\Http\Controllers\Controller;
use Republicas\Models\Bill;
use Republicas\Models\Republic;
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
        $bills = Bill::where('republic_id', $repId);
            //->whereBetween('due_date', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
            //->orderBy('due_date')->get();

        $republica = Republic::findOrFail($repId);

        return view('bills.index', compact('republica', 'bills'));
    }

    public function bills($repId)
    {
        $bills = Bill::where('republic_id', $repId)
            ->join('billtypes', 'bills.billtype_id', '=', 'billtypes.id')
            ->select('bills.id', 'bills.name as billName', 'billtypes.name', 'value', 'due_date');

        return Datatables::of($bills)->editColumn('due_date', function($bills) {
            return $bills->due_date->format('d/m/Y');
        })->make(true);
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
        $bill = Bill::create($request->except('due_date', 'value'));

        $bill->due_date = $date;
        $bill->value = $value;
        $bill->billtype_id = 1; // 1 = Tipo República e 2 = Tipo Pessoal
        $bill->republic()->associate($republica);

        $bill->save();

        return redirect()->route('bill_index', $republica);
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
        //
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
        //
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
