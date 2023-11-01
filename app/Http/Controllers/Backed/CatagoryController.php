<?php

namespace App\Http\Controllers\Backed;

use App\Http\Controllers\Controller;
use App\Models\Catagory;
use Illuminate\Http\Request;

class CatagoryController extends Controller
{
   public function AllCatagory(){

    $alldata=Catagory::latest()->get();
    return view("backend.catagory.catagory_all",compact("alldata"));
   }

   public function StoreCatagory(Request $request){
    $data=Catagory::create([
        'catagory_name'=>$request->catagory_name,
        'created_at'=>\Carbon\Carbon::now(),
    ]);

    return redirect()->route('all.catagory')->with('message','Successfully Done');

   }
   public function  EditCatagory($id){

    $data=Catagory::findOrFail($id);

    return view('backend.catagory.catagory_edit',compact('data'));


}

public function UpdateCatagory(Request $request){
    $update= $request->id;
    Catagory::findOrFail($update)->update([
        'catagory_name'=>$request->catagory_name,
'created_at'=>\Carbon\Carbon::now(),

    ]);
    return redirect()->route('all.catagory')->with('message','Successfully Done');
}
public function DeleteCatagory($id){

    Catagory::findOrFail($id)->delete();
    return redirect()->route('all.catagory')->with('message','Successfully Done');
}

}
