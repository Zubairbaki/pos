<?php

namespace App\Http\Controllers\Backed;

use App\Exports\ProductExport;
use App\Http\Controllers\Controller;
use App\Imports\ProductImport;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Supplier;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function AllProduct()
    {

        $data = Product::latest()->get();
        return view("backend.products.all_products", compact("data"));
    }

    public function AddProduct()
    {

        $Catagory = Catagory::latest()->get();

        $Supplier = Supplier::latest()->get();

        return view("backend.products.add_product", compact("Catagory", 'Supplier'));


    }
    public function AddStore(Request $req)
    {

        $pcode = IdGenerator::generate([
            'table' => 'products',
            'field' => 'product_code',
            'length' => 4,  // Correct the spelling to 'length'
            'prefix' => 'Pc',
        ]);
           $image = $req->file('product_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save('upload/products_image/' . $name_gen);
        $save_url = 'upload/products_image/' . $name_gen;

        Product::insert([
            'product_name' => $req->product_name,
            'catagory_id' => $req->catagory_id,
            'supplier_id' => $req->supplier_id,
            'product_code' => $pcode,
            'product_garage' => $req->product_garage,
            'prodcut_store' => $req->prodcut_store,

            'buying_date' => $req->buying_date,
            'expire_date' => $req->expire_date,
            'buying_price' => $req->buying_price,
            'selling_price' => $req->selling_price,
            'product_image' => $save_url,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Succfully Uploaded',
            'alert_type' => 'success'
        );
        return redirect()->route('all.product')->with($notification);


    }
    public function EditProducts($id){
        $product = Product::findOrFail($id);
        $Catagory = Catagory::latest()->get();

        $Supplier = Supplier::latest()->get();
        return view('backend.products.edit_product', compact('product','Catagory','Supplier'));
    }

    public function deleteProducts($id){
        $product = Product::findOrFail($id);
        $product->delete();
}
public function UpdateStore(Request $request){
    $productUpdate= $request->id;


    if ($request->hasFile('product_image')){
    $image = $request->file('product_image');
    $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
    Image::make($image)->resize(300, 300)->save('upload/products_image/' . $name_gen);
    $save_url = 'upload/products_image/' . $name_gen;

    Product::findOrFail($productUpdate)->update([
        'product_name' => $request->product_name,
        'catagory_id' => $request->catagory_id,
        'supplier_id' => $request->supplier_id,
        'product_code' => $request->product_code,
        'product_garage' => $request->product_garage,
        'prodcut_store' => $request->prodcut_store,

        'buying_date' => $request->buying_date,
        'expire_date' => $request->expire_date,
        'buying_price' => $request->buying_price,
        'selling_price' => $request->selling_price,
        'product_image' => $save_url,
        'created_at' => Carbon::now(),
    ]);
    $notification = array(
        'message' => 'Succfully Uploaded',
        'alert_type' => 'success'
    );
    return redirect()->route('all.product')->with($notification);
}else{

    Product::findOrFail($productUpdate)->update([
        'product_name' => $request->product_name,
        'catagory_id' => $request->catagory_id,
        'supplier_id' => $request->supplier_id,
        'product_code' => $request->product_code,
        'product_garage' => $request->product_garage,
        'prodcut_store' => $request->prodcut_store,

        'buying_date' => $request->buying_date,
        'expire_date' => $request->expire_date,
        'buying_price' => $request->buying_price,
        'selling_price' => $request->selling_price,

        'created_at' => Carbon::now(),
    ]);
    $notification = array(
        'message' => 'Succfully Uploaded',
        'alert_type' => 'success');
        return redirect()->route('all.product')->with($notification);
}}

public function Barcode($id){

    $product= Product::findOrFail($id);

    return view ('backend.products.barcode_product', compact('product'));

}

public function ImportProduct(){

    return view('backend.products.import_product');
}

public function Export(){
    return Excel::download(new ProductExport, 'products.xlsx');
}

public function Import(Request $request){


        Excel::import(new ProductImport,$request->file('import_file'));

        return redirect()->back()->with('message', 'All good!');

}
}
