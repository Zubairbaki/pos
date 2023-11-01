<?php

namespace App\Http\Controllers\Backed;

use App\Http\Controllers\Controller;
use App\Models\Employ;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Intervention\Image\Facades\Image;


class EmployController extends Controller
{
   public function AllEmploy(){

    $allemploy= Employ::latest()->get();

    return view('backend.Employ.All_employ',compact('allemploy'));
   }

   public function ADDEmploy(){

    return view('backend.Employ.Add_employ');
   }
   public function StoreEmploy(Request $req){

    $validate= $req->validate(
        [
            'name'=>'required|max:200',
            'email'=>'required|unique:employs|max:200',
            'phone'=>'required|max:20',
            'address'=>'required|max:2000',
            'salary'=>'required|max:200',
            'vacation'=>'required|max:200',


        ]
        );

        $image= $req->file('image');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/Employe/'.$name_gen);
        $save_url='upload/Employe/'.$name_gen;

        Employ::insert([
             'name'=>$req->name,
             'email'=>$req->email,
             'phone'=>$req->phone,
             'address'=>$req->address,
             'salary'=>$req->salary,
             'vacation'=>$req->vacation,
             'experience'=>$req->experience,
             'city'=>$req->city,
             'image'=>$save_url,
             'created_at'=>Carbon::now(),
        ]);
        $notification = array(
            'message' => ' Employ Insert succusfully  Change',
            'alert_type' => 'success'
        );
        return redirect()->route('all.employ')->with($notification);


   }

   public function EditEmploy($id){

    $employ=Employ::FindOrFail($id);

    return view('backend.Employ.Edit_employ',compact('employ'));

   }

   public function UpdateEmploy(Request $request){

    $employ_id= $request->id;
    if($request->file('image')){

        $image= $request->file('image');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/Employe/'.$name_gen);
        $save_url='upload/Employe/'.$name_gen;

        Employ::findOrFail($employ_id)->update([
             'name'=>$request->name,
             'email'=>$request->email,
             'phone'=>$request->phone,
             'address'=>$request->address,
             'salary'=>$request->salary,
             'vacation'=>$request->vacation,
             'experience'=>$request->experience,
             'city'=>$request->city,
             'image'=>$save_url,
             'created_at'=>Carbon::now(),
        ]);
        $notification = array(
            'message' => ' Employ Update succusfully  Change',
            'alert_type' => 'success'
        );
        return redirect()->route('all.employ')->with($notification);



    }else{

        Employ::findOrFail($employ_id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'salary'=>$request->salary,
            'vacation'=>$request->vacation,
            'experience'=>$request->experience,
            'city'=>$request->city,

            'created_at'=>Carbon::now(),
       ]);
       $notification = array(
           'message' => ' Employ Update succusfully  Change',
           'alert_type' => 'success'
       );
       return redirect()->route('all.employ')->with($notification);
    }
}//end method

public function DeleteEmploy($id) {
    try {
        // Find the employ by ID
        $employ = Employ::findOrFail($id);

        // Get the image path and check if the file exists
        $imagePath = public_path($employ->image);
        if (file_exists($imagePath)) {
            // Delete the image file
            unlink($imagePath);
        }

        // Delete the employ
        $employ->delete();

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
        return redirect()->route('all.employ')->with($notification);
    }
}



}

