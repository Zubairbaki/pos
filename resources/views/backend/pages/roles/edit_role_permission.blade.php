@extends('admin_desbord')

@section('contant')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    {{-- not wokring  --}}
    <style type="text/css">

    .form-check-input{
        text-transform: capitalize !important;
    }


    </style>


    <div class="content">




        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <h4 class="page-title">Edit Role  Permission</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">


            <div class="col-lg-12 col-xl-12">



                <form id="myForm" method="POST" action="{{ route('role.permission.update',$role->id) }}" enctype="multipart/form-data">
                    @csrf
                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="firstname" class="form-label"> Roles Name </label>
                                <h3>{{$role->name}}</h3>
 </div>
                        </div>

                        <div class="form-check mb-2 form-check-primary">
                            <input class="form-check-input" type="checkbox" value="" id="customckeck1" >
                            <label class="form-check-label" for="customckeck1">Primary</label>
                        </div>

                        <hr>

                        @foreach ($permission_group as $group)



                        <div class="row">
                            <div class="col-3">
                                @php
                                $permissions = App\Models\User::getpermissionByGroupName($group->group_name);
                            @endphp
                                <div class="form-check mb-2 form-check-primary">
                                    <input class="form-check-input" type="checkbox"  value="" id="customckeck11"
                                     {{App\Models\User::rolesHasPermission($role,$permissions)? 'checkd': ''}}   >
                                    <label class="form-check-label" for="customckeck11">{{$group->group_name}}</label>
                                </div>


                            </div>

                            <div class="col-9">



                                @foreach ($permissions as $permission)


                                <div class="form-check mb-2 form-check-primary">
                                    <input class="form-check-input" type="checkbox"
                                    name="permission[]"
                                    {{$role->hasPermissionTo($permission->name)? 'checked': ''}} value="{{$permission->id}}" id="customckeck12"
                                        >
                                    <label class="form-check-label" for="customckeck12">{{$permission->name}}</label>
                                </div>

                                @endforeach
                                <br>

                            </div>
                        </div><!-- end row -->
                        @endforeach




                    </div> <!-- end row -->


                    <div class="text-end">
                        <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                class="mdi mdi-content-save"></i> Save</button>
                    </div>
                </form>
            </div>
            <!-- end settings content-->


        </div>
    </div> <!-- end card-->

    </div> <!-- end col -->
    </div>
    <!-- end row-->
 </div> <!-- content -->

 <script type="text/javascript">
   $('#customckeck1').click(function(){

    if ($(this).is(':checked')) {

        $('input[type = checkbox]').prop('checked',true);

    }else{

        $('input[type = checkbox]').prop('checked',false);

    }
   });

</script>
@endsection
