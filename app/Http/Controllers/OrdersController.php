<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orders;
use Illuminate\Support\Facades\Validator;

class OrdersController extends Controller
{
    public function show()
    {
       $data_Orders = Orders::leftjoin('Customers', 'Orders.id_customers', 'Customers.id_customers')
                              ->leftjoin('Product', 'Orders.id_product', 'Product.id_product')
                              ->select('orders.id_orders',
                                        'customers.nama_customers',
                                        'product.nama_product',
                                        'orders.tanggal',
                                        'orders.keterangan')
                                ->get();
        return Response()->json($data_Orders);
    }
    public function detail($id)
    {
        if(Order::where('id',$id)->exists()) {
            $data_Orders = Orders::leftjoin('Customers', 'Orders.id_customers', 'Customers.id_customers')
                                  ->leftjoin('Product', 'Orders.id_product', 'Product.id_product')
                                  ->where('Orders.id', '=',$id )
                                  ->get();
            return Response()->json($data_Orders);                      
        }
        else {
            return Response()->json(['message' => 'Tidak Ditemukan' ]);
        }
    }
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
    public function update($id, Request $request)
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

    $ubah = Orders::where('id_Orders', $id)->update([
        'id_product' => $request->id_product,
        'id_customers' => $request->id_customers,
        'tanggal' => $request->tanggal,
        'keterangan' => $request->keterangan
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
         $hapus = Orders::where('id_Orders', $id)->delete();
         if($hapus) {
             return Response()->json(['status' => 1]);
         }
         else {
             return Response()->json(['status' => 0]);
         }
     }
}
