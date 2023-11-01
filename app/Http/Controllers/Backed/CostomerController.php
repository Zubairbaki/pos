<?php

namespace App\Http\Controllers\Backed;

use App\Http\Controllers\Controller;
use App\Models\Costomer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;

class CostomerController extends Controller
{
    public function AllCostomer(){

        $allcostomer= Costomer::latest()->get();

        return view('backend.costomer.All_costomer',compact('allcostomer'));
       }

       public function ADDCostomer(){

        return view('backend.costomer.Add_employ');
       }
       public function StoreCostomer(Request $req){

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
            Image::make($image)->resize(300,300)->save('upload/costomer_image/'.$name_gen);
            $save_url='upload/costomer_image/'.$name_gen;

            Costomer::insert([
                 'name'=>$req->name,
                 'email'=>$req->email,
                 'phone'=>$req->phone,
                 'address'=>$req->address,
                 'shopname'=>$req->shopname,
                 'account_holder'=>$req->account_holder,

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
            return redirect()->route('all.costomer')->with($notification);


       }

       public function EditCostomer($id){

        $costomer=Costomer::FindOrFail($id);

        return view('backend.costomer.Edit_costomer',compact('costomer'));

       }

       public function UpdateCostomer(Request $request){

        $costomer_id= $request->id;
        if($request->file('image')){

            $image= $request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/costomer_image/'.$name_gen);
            $save_url='upload/costomer_image/'.$name_gen;

            Costomer::findOrFail($costomer_id)->update([
                'name'=>$request->name,
                 'email'=>$request->email,
                 'phone'=>$request->phone,
                 'address'=>$request->address,
                 'shopname'=>$request->shopname,
                 'account_holder'=>$request->account_holder,

                 'account_number'=>$request->account_number,
                 'bank_name'=>$request->bank_name,
                 'bank_branch'=>$request->bank_branch,
                 'city'=>$request->city,
                 'image'=>$save_url,
                 'created_at'=>Carbon::now(),
            ]);
            $notification = array(
                'message' => ' Employ Update succusfully  Change',
                'alert_type' => 'success'
            );
            return redirect()->route('all.costomer')->with($notification);



        }else{

            Costomer::findOrFail($costomer_id)->update([
                'name'=>$request->name,
                 'email'=>$request->email,
                 'phone'=>$request->phone,
                 'address'=>$request->address,
                 'shopname'=>$request->shopname,
                 'account_holder'=>$request->account_holder,

                 'account_number'=>$request->account_number,
                 'bank_name'=>$request->bank_name,
                 'bank_branch'=>$request->bank_branch,
                 'city'=>$request->city,

                 'created_at'=>Carbon::now(),
           ]);
           $notification = array(
               'message' => ' Employ Update succusfully  Change',
               'alert_type' => 'success'
           );
           return redirect()->route('all.costomer')->with($notification);
        }
    }//end method

    public function DeleteCostomer($id) {
        try {
            // Find the employ by ID
            $costomer = Costomer::findOrFail($id);

            // Get the image path and check if the file exists
            $imagePath = public_path($costomer->image);
            if (file_exists($imagePath)) {
                // Delete the image file
                unlink($imagePath);
            }

            // Delete the employ
            $costomer->delete();

            $notification = [
                'message' => 'Employ deleted successfully',
                'alert_type' => 'success'
            ];

            return redirect()->route('all.employ')->with($notification);
        } catch (\Exception $e) {
            $notification = [
                'message' => 'An error occurred while deleting the employ.',
                'alert_type' => 'error'
            ];
            return redirect()->route('all.costomer')->with($notification);
        }
    }
}
