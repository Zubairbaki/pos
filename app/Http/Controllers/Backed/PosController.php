<?php

namespace App\Http\Controllers\Backed;

use App\Http\Controllers\Controller;
use App\Models\Costomer;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function Pos()
    {

        $product = Product::latest()->get();

        $costomer = Costomer::latest()->get();

        return view("backend.pos.pos_page", compact("product", 'costomer'));
    } //end method

    public function AddCart(Request $request)
    {

        // echo "<pre>";
        // print_r($request->all());
        // echo "</pre>";
        // die();

        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'qty' => $request->qty,
            'price' => $request->price,
            'options' => ['size' => 'large']
        ]);

        return redirect()->back()->with('message','done');

    }

    public function Allitem(){

        $productitem=Cart::content();

        return view('backend.pos.test_item', compact('productitem'));
    }

    public function AddUpdate(Request $request,$rowId){


        $qty = $request->qty;
        $update=Cart::update($rowId, $qty);

        return redirect()->back()->with('message','updated done');

    }
    public function CartRemove($rowId){
       Cart::remove($rowId);

        return redirect()->back()->with('message','remove successfully');
    }

    public function CreateInvoice(Request $request){

        $contain=Cart::content();

        $customer_id= $request->customer_id;
        $customer= Costomer::where('id',$customer_id)->first();

        return view('backend.invoice.product_invoice', compact('contain','customer'));

    }
}
