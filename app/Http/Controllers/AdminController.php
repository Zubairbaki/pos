<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AdminController extends Controller
{
    public function AdminDestroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'Admin Logout Update Successfully',
            'alert_type' => 'info'
        );

        return view('admin.admin_logout')->with($notification);
    }//End method

    public function AdminLogout(){
        return view('admin.admin_logout');
    }

    public function AdminProfile(){

        $id= Auth::user()->id;

        $admindata=User::find($id);

        return  view ('admin.admin_profile',compact('admindata'));
    }

    public function storeProfile(Request $req) {
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $req->name;
        $data->phone = $req->phone;
        $data->email = $req->email;

        if ($req->hasFile('photo')) {
            $file = $req->file('photo');

            @unlink(public_path('upload/admin_photo/'.$data->photo));
            $filename = date('YmdH') . $file->getClientOriginalName();

            $file->move(public_path('upload/admin_photo'), $filename);

            $data->photo = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Update Successfully',
            'alert_type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ChangePassword(){

        return view('admin.admin_change_password');
    }

    public function UpdatePassword(Request $request){


        $request->validate([
            'oldPassword' => 'required',
            'NewPassword' => 'required|confirmed', // Use 'confirmed' rule for password confirmation
        ]);
            //match the password

            if(!Hash::check($request->oldPassword, auth::user()->password)){

                $notification = array(
                    'message' => 'old Password doesnt Match ',
                    'alert_type' => 'error'
                );

                return back()->with($notification);
            }
            User::whereId(auth()->user()->id)->update([

                'password'=>Hash::make($request->NewPassword)
            ]);
            $notification = array(
                'message' => ' Password is Change',
                'alert_type' => 'success'
            );
            return back()->with($notification);
    }

}
