<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pembayaran;
use Illuminate\Support\Facades\Validator;

class PembayaranController extends Controller
{
   public function show()
   {
       return Pembayaran::all();
   }
   public function detail($id)
   {
       $data = Pembayaran::where('id_Pembayaran', $id)->first();


       return Response()->json($data);
   }
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
      public function update($id, Request $request)
      {
          $validator=validator::make($request->all(),
            [
                'tanggal_bayar' => 'required',
                'total_bayar' => 'required',
                'id_orders' => 'required'
            ]
        );

        if ($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $ubah = Pembayaran::where('id_Pembayaran', $id)->update([
            'tanggal_bayar' =>$request->tanggal_bayar,
            'total_bayar' =>$request->total_bayar,
            'id_orders' =>$request->id_orders
        ]);

        if($ubah) {
            return Response()->json(['status' => 1]);
        }
        else {
            return Response()->json(['status' => 0]);
        }
      }
       public function destroy($id)
       {
           $hapus = Pembayaran::where('id_Pembayaran', $id)->delete();
           if($hapus) {
               return Response()->json(['status' => 1]);
           }
           else {
               return Response()->json(['status' => 0]);
           }
       }
}
