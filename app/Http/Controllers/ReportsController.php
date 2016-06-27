<?php

namespace Republicas\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Republicas\Http\Requests;
use Republicas\Models\Republic;
use Republicas\Http\Controllers\Controller;

class ReportsController extends Controller
{
    public function general($repId)
    {
        $republica = Republic::findOrFail($repId);
        $array_bills = [];
        $array_current_bills = [];

        foreach ($republica->billtypes as $key => $billtype) {
            $data = array_values($republica->getBillsByType($billtype->id));
            $dataPie = $republica->getCurrentMonthBillPercentageByType($billtype->id);
            array_push($array_bills, [
                'name' => $billtype->name,
                'data' => $data,
            ]);

            if($dataPie != 0)
                array_push($array_current_bills, [
                    'name' => $billtype->name,
                    'y' => $dataPie,
                ]);
        }
        // Adiciona o aluguel ao array
        array_push($array_current_bills, [
                'name' => 'Aluguel',
                'y' => ($republica->getRent() / $republica->getBillTotal()) * 100
        ]);
        return view('reports.general', compact('republica', 'array_bills', 'array_current_bills'));
    }
}
