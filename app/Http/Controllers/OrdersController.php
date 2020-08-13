<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{
    public function store (Request $request)
    {
        $validator=validator::make($request->all(),
        [
            'id_product' => 'required',
            'id_customers' => 'required',
            'tanggal' => 'required',
            'keterangan' => 'required'
        ]
        );

        if($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $simpan = Orders::create([
            'id_product' => $request->id_product,
            'id_customers' => $request->id_customers,
            'tanggal' => $request->tanggal,
            'keterangan' => $request->keterangan
        ]);

        if($simpan)
        {
            return Response()->json(['status' => 1]);
        }
        else
        {
            return Response()->json(['status' => 0]);
        }
    }
}
