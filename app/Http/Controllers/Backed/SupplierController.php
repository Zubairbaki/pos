<?php

namespace App\Http\Controllers\Backed;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class SupplierController extends Controller
{
    public function AllSupplier(){

        $allsupplier= Supplier::latest()->get();

        return view('backend.supplier.All_supplier',compact('allsupplier'));
       }//Method End

       public function ADDSupplier(){

        return view('backend.supplier.Add_supplier');
       }//End Method

       public function StoreSupplier(Request $req){

        $validate= $req->validate(
            [
                'name'=>'required|max:200',
                'email'=>'required|unique:employs|max:200',
                'phone'=>'required|max:11',
                'address'=>'required|max:2000',
                'shopname'=>'required|max:200',
                'account_holder'=>'required|max:200',
                'account_number'=>'required|max:200',
                'bank_name'=>'required|max:200',
                'bank_branch'=>'required|max:200',
                'city'=>'required|max:200',


            ]
            );

            $image= $req->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/supplier_image/'.$name_gen);
            $save_url='upload/supplier_image/'.$name_gen;

            Supplier::insert([
                 'name'=>$req->name,
                 'email'=>$req->email,
                 'phone'=>$req->phone,
                 'address'=>$req->address,
                 'shopname'=>$req->shopname,
                 'account_holder'=>$req->account_holder,
                 'type'=>$req->type,

                 'account_number'=>$req->account_number,
                 'bank_name'=>$req->bank_name,
                 'bank_branch'=>$req->bank_branch,
                 'city'=>$req->city,
                 'image'=>$save_url,
                 'created_at'=>Carbon::now(),
            ]);
            $notification = array(
                'message' => ' Employ Insert succusfully  Change',
                'alert_type' => 'success'
            );
            return redirect()->route('all.supplier')->with($notification);


        }

        public function EditSupplier($id){
            $supplier=Supplier::FindOrFail($id);

                return view('backend.supplier.Edit_supplier',compact('supplier'));

               }//end method





    public function UpdateSupplier(Request $request){

        $supplier_id= $request->id;
        if($request->file('image')){

            $image= $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/supplier_image/'.$name_gen);
            $save_url='upload/supplier_image/'.$name_gen;

            Supplier::findOrFail($supplier_id)->update([
                'name'=>$request->name,
                 'email'=>$request->email,
                 'phone'=>$request->phone,
                 'address'=>$request->address,
                 'shopname'=>$request->shopname,
                 'account_holder'=>$request->account_holder,
                 'type'=>$request->type,

                 'account_number'=>$request->account_number,
                 'bank_name'=>$request->bank_name,
                 'bank_branch'=>$request->bank_branch,
                 'city'=>$request->city,
                 'image'=>$save_url,
                 'created_at'=>Carbon::now(),
            ]);
            $notification = array(
                'message' => ' Supplier Update succusfully  Change',
                'alert_type' => 'success'
            );
            return redirect()->route('all.costomer')->with($notification);



        }else{

            Supplier::findOrFail($supplier_id)->update([
                'name'=>$request->name,
                 'email'=>$request->email,
                 'phone'=>$request->phone,
                 'address'=>$request->address,
                 'shopname'=>$request->shopname,
                 'account_holder'=>$request->account_holder,
                 'type'=>$request->type,

                 'account_number'=>$request->account_number,
                 'bank_name'=>$request->bank_name,
                 'bank_branch'=>$request->bank_branch,
                 'city'=>$request->city,

                 'created_at'=>Carbon::now(),
           ]);
           $notification = array(
               'message' => ' Supplier Update succusfully  Change',
               'alert_type' => 'success'
           );
           return redirect()->route('all.supplier')->with($notification);
        }
    }//end method

    public function DeleteSupplier($id) {
        try {
            // Find the employ by ID
            $supplier = Supplier::findOrFail($id);

            // Get the image path and check if the file exists
            $imagePath = public_path($supplier->image);
            if (file_exists($imagePath)) {
                // Delete the image file
                unlink($imagePath);
            }

            // Delete the employ
            $supplier->delete();

            $notification = [
                'message' => 'Employ deleted successfully',
                'alert_type' => 'success'
            ];

            return redirect()->route('all.supplier')->with($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => 'An error occurred while deleting the employ.',
                'alert_type' => 'error'
            ];
            return redirect()->route('all.supplier')->with($notification);
        }
    }

    public function DetailsSupplier($id){
        $supplier=Supplier::FindOrFail($id);

            return view('backend.supplier.details_supplier',compact('supplier'));

           }//end method


}
