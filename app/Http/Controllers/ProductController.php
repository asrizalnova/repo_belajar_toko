<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function show()
    {
        return Product::all();
    }
    public function detail($id)
    {
        $data = Product::where('id_Product', $id)->first();


        return Response()->json($data);
    }
    public function store(Request $request)
    {
        $validator=validator::make($request->all(),
        [
            'nama_product' => 'required',
            'harga' => 'required',
            'stok' => 'required'
        ]
        );

        if($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $simpan = Product::create([
            'nama_product' => $request->nama_product,
            'harga' => $request->harga,
            'stok' => $request->stok
        ]);

        if ($simpan)
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
             'nama_product' => 'required',
             'harga' => 'required',
             'stok' => 'required'
            ]
            );

            if ($validator->fails()) {
                return Response()->json($validator->errors());
            }

            $ubah = Product::where('id_Product', $id)->update([
                'nama_product' =>$request->nama_product,
                'harga' =>$request->harga,
                'stok' =>$request->stok
            ]);

            if($ubah) {
                return Response()->json(['status' => 1]);
            }
            else {
                return Response()->json(['status' => 0]);
            }
      }
}
