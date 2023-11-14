<?php

namespace App\Http\Controllers\Backed;

use App\Http\Controllers\Controller;
use App\Models\Costomer;
use App\Models\Order;
use App\Models\Orderdetails;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
  public function FinalInvoice(Request $request){

    $data= array();
    $data["customer_id"]=$request->customer_id;
    $data["order_date"]=$request->order_date;
    $data["order_status"]=$request->order_status;
    $data["total_products"]=$request->total_products;
    $data["sub_total"]=$request->sub_total;
    $data["vat"]=$request->vat;
    $data["invoice_number"]='EPOS'.mt_rand(10000000,99999999);
    $data["total"]=$request->total;
    $data["payment_status"]=$request->payment_status;
    $data["pay"]=$request->pay;
    $data["due"]=$request->due;
    $data["created_at"]=Carbon::now();

    $order_id =Order::insertGetId($data);

    $contents=Cart::content();

    $pdata =array();

    foreach ($contents as $key => $content) {
        $pdata['order_id']= $order_id;
        $pdata['product_id']= $content->id;
        $pdata['quantity']= $content->qty;
        $pdata['unitcost']= $content->price;
        $pdata['total']= $content->total;


        $insert=Orderdetails::insert( $pdata );

        # code...
    }
    Cart::destroy();

    return redirect()->route('dashboard')->with('message','succussfully done');


  }//end method

  public function PanddingOrder(){



    $order= Order::where('order_status','pendding')->get();

    return view('backend.order.pending_order',compact('order'));
  }

  public function OrderDetails($id){

    $order=Order::where('id',$id)->first();
    $orderitem= OrderDetails::with('product')->where('order_id',$id)->orderBy('id','DESC')->get();
    return view('backend.order.order_details',compact('orderitem','order'));
  }

  public function StatusUpdate(Request $request) {
    $order = $request->id;

    $products = Orderdetails::where('order_id', $order)->get();

    foreach ($products as $product) {
        $productToUpdate = Product::find($product->product_id);
        $productToUpdate->prodcut_store -= $product->quantity;
        $productToUpdate->save();
    }

    $orderToUpdate = Order::findOrFail($order);
    $orderToUpdate->order_status = 'complete';
    $orderToUpdate->save();

    return redirect()->route('panding.order')->with('message', 'Order done Successfully');
}


  public function CompleteOrder(){

    $order= Order::where('order_status','complete')->get();

    return view('backend.order.complete_order',compact('order'));
  }

  public function StockManage(){

    $data = Product::latest()->get();
        return view("backend.stock.all_stock", compact("data"));
  }

  public function OrderInvoice($order_id){

    $order=Order::where('id',$order_id)->first();
    $orderitem= OrderDetails::with('product')
    ->where('order_id',$order_id)->orderBy('id','DESC')->get();

    $pdf=    $pdf = Pdf::loadView('backend.order.order_invoice',
    compact('order','orderitem'))
    ->setPaper('A4')
    ->setOption([
        'temDir'=> public_path(),
        'chroot'=> public_path(),
    ]);
    return $pdf->download('invoice.pdf');



  }
}
