<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use Illuminate\Support\Facades\Validator;

class PembayaranController extends Controller
{
    public function store(Request $request)
    {
        $validator=validator::make($request->all(),
        [
            'tanggal_bayar' => 'required',
            'total_bayar' => 'required',
            'id_orders' => 'required'
        ]
        );

        if($validator->fails()) {
            return Response()->json($validator->errors());
        }
        
        $simpan = Pembayaran::create([
            'tanggal_bayar' => $request->tanggal_bayar,
            'total_bayar' => $request->total_bayar,
            'id_orders' => $request->id_orders
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
