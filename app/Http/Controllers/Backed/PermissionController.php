<?php

namespace App\Http\Controllers\Backed;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class PermissionController extends Controller
{
    public function AllPermission(){

        $permission= Permission::all();

        return view("backend.pages.permission.all_permission",compact("permission"));
    }

    public function AddPermission(){

        return view("backend.pages.permission.add_permission");

    }

    public function StorePermission(Request $request){

       Permission::create($request->all());

        return redirect()->back()->with("message","done");
    }

    public function EditPermission($id){

        $permission= Permission::find($id);
        return view("backend.pages.permission.edit_permission",compact("permission"));
    }

    public function UpdatePermission(Request $request){
        $permission=$request->id;
      Permission::findOrFail($permission)->update($request->all());
        return redirect()->back()->with("message","done");
    }
    public function DeletePermission($id){
        $permission= Permission::findOrFail($id);
        $permission->delete();

        return redirect()->back()->with("message","done");
    }


    //////////////////Roles Methods

    public function AllRoles(){

        $roles= Role::all();

        return view("backend.pages.roles.all_role",compact("roles"));
    }

    public function AddRoles(){

        return view("backend.pages.roles.add_role");

    }

    public function StoreRoles(Request $request){

       Role::create($request->all());

        return redirect()->route('All.roles')->with("message","done");
    }

    public function EditRoles($id){

        $role= Role::find($id);
        return view("backend.pages.roles.edit_role",compact("role"));
    }

    public function UpdateRoles(Request $request){
        $role=$request->id;
      Role::findOrFail($role)->update($request->all());
        return redirect()->back()->with("message","done");
    }
    public function DeleteRoles($id){
        $permission= Role::findOrFail($id);
        $permission->delete();

        return redirect()->back()->with("message","done");
    }

    // Add Roles in Permission Mehtod

    public function AddRolePermission(){
        $roles = Role::all();
        $permissions = Permission::all();
        $permission_groups = Permission::select('group_name')->groupBy('group_name')->get();
        $RoleHasPermission = DB::table('role_has_permissions')->get();



        return view("backend.pages.roles.add_role_permission",compact('roles', 'permissions', 'permission_groups', 'RoleHasPermission'));
    }

    public function StoreRolePermission(Request $request){
        $role = Role::find($request->role_id);

        if (!$role) {
            return redirect()->back()->with('error', 'Role not found');
        }

        $permissions = Permission::whereIn('id', $request->permission)->get();

        if ($permissions->isEmpty()) {
            $role->permissions()->detach();
        } else {
            $role->permissions()->sync($permissions);
        }

        // Clear the cache associated with permissions (replace 'your_cache_key' with the actual cache key used)


        return redirect()->back()->with('success', 'Roles successfully assigned');
    }


    public function AllRolePermission(){
        $users = User::all();
        $roles = Role::all();
        return view('backend.pages.roles.all_role_permission',compact('roles','users'));
    }

    public function AdminEditRoles($id){

        $role = Role::findOrFail($id);
        $permissions = Permission::all();
        $permission_group=User::getPermissionGroup();




        return view("backend.pages.roles.edit_role_permission",compact('role', 'permissions', 'permission_group'));


    }
    public function AdminUpdateRoles(Request $request, $id){

        $permissions = $request->permission;
        $roles = Role::findOrFail($id);

        if (!empty($permissions)) {
            $roles->syncPermissions([]); // Detach all current permissions

            foreach ($permissions as $permissionId) {
                $permission = Permission::findOrFail($permissionId);
                $roles->givePermissionTo($permission);
            }

            return redirect()->route('All.roles')->with('message', 'DONE');
        }

        return redirect()->route('All.roles')->with('message', 'DONE');

    }

    /////////////////////////      Admin Roles ///////////////////

    public function AllAdmin(){
        $users = User::all();
        $roles = Role::all();
        return view('backend.admin.all_admin',compact('users','roles'));


    }

    public function AddAdmin(){

        $roles = Role::all();

        return view('backend.admin.add_admin',compact('roles'));



    }

    public function StoreAdmin(Request $request){

       $user =new User();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->phone = $request->phone;
       $user->password = Hash::make($request->password);
       $user->save();

       if($request->roles){
        // echo "asdasd";
        // echo $request->roles;
        // die();
        $user->assignRole((int)$request->roles);
        $user->save();
       }

      return redirect()->back()->with('message','user added sucessfully');

    }

    public function EditAdmin($id){
        $roles=Role::all();
        $adminuser= User::findOrFail($id);

        return view('backend.admin.edit_admin',compact('roles','adminuser'));
    }

    public function UpdateAdmin(Request $request){
        $adminuser=$request->id;
        $user = User::findOrFail( $adminuser );
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        $user->save();

        $user->roles()->detach();

        if($request->roles){
         // echo "asdasd";
         // echo $request->roles;
         // die();
         $user->assignRole((int)$request->roles);
         $user->save();
        }

       return redirect()->back()->with('message','user update sucessfully');
    }

    public function DeleteAdmin($id){
        $user=User::findOrFail($id);
       $user->delete();
        return redirect()->back()->with('message','user delete sucessfully');

    }
}
