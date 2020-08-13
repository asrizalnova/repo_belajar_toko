<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;
use Illuminate\Support\Facades\Validator;

class CustomersController extends Controller
{
    public function store(Request $request)
    {
        $validator=validator::make($request->all(),
        [
            'nama_customers' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required'
        ]
    );
    if($validator->fails()) {
        return Response()->json($validator->errors());
    }
    $simpan = Customers::create([
        'nama_customers'=> $request->nama_customers,
        'gender'=> $request->gender,
        'alamat'=> $request->alamat,
        'no_telepon'=> $request->no_telepon
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
