<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;
use Illuminate\Support\Facades\Validator;

class CustomersController extends Controller
{
    public function show()
    {
      return Customers::all();
    }
    public function detail($id)
    {
        $data = Customers::where('id_customers', $id)->first();
        

        return Response()->json($data);
    }
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
  public function update($id, Request $request)
 {
     $validator=Validator::make($request->all(),
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

    $ubah = Customers::where('id_customers', $id)->update([
        'nama_customers' => $request->nama_customers,
        'gender' => $request->gender,
        'alamat' => $request->alamat,
        'no_telepon' => $request->no_telepon
    ]);

    if ($ubah) {
        return Response()->json(['status' => 1]);
    }
    else {
        return Response()->json(['status' => 0]);
    }
 }
 public function destroy($id)
 {
     $hapus = Customers::where('id_customers', $id)->delete();
     if($hapus) {
         return Response()->json(['status' => 1]);
     }
     else {
         return Response()->json(['status' => 0]);
     }
 }
}
   