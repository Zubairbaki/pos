@extends('admin_desbord')

@section('contant')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <div class="content">




        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <h4 class="page-title">Edit Permission</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">


            <div class="col-lg-12 col-xl-12">



                <form id="myForm" method="POST" action="{{ route('update.permission',['id' => $permission->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Permission Name </label>
                                <input type="text" name="name" value="{{$permission->name}}"
                                    class="form-control ">

                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="firstname" class="form-label">Group Name </label>

                                <select name="group_name" class="form-select" id="example-select">
                                    <option selected disabled >Select Group</option>



                                    <option value="pos" {{$permission->group_name == 'pos'? 'selected' : ''}}>Pos</option>
                                    <option value="employee" {{$permission->group_name == 'employee'? 'selected' : ''}}>Employee</option>
                                    <option value="customer" {{$permission->group_name == 'customer'? 'selected' : ''}}>Customer </option>
                                    <option value="supplier" {{$permission->group_name == 'supplier'? 'selected' : ''}}>Supplier</option>
                                    <option value="salary" {{$permission->group_name == 'salary'? 'selected' : ''}}>Salary </option>
                                    <option value="attendence" {{$permission->group_name == 'attendence'? 'selected' : ''}}>Attendence </option>
                                    <option value="category" {{$permission->group_name == 'category'? 'selected' : ''}}>Category </option>
                                    <option value="product" {{$permission->group_name == 'product'? 'selected' : ''}}>Product </option>
                                    <option value="expense" {{$permission->group_name == 'expense'? 'selected' : ''}}>Expense </option>
                                    <option value="orders" {{$permission->group_name == 'orders'? 'selected' : ''}}>Orders</option>
                                    <option value="stock" {{$permission->group_name == 'stock'? 'selected' : ''}}>Stock </option>
                                    <option value="roles" {{$permission->group_name == 'roles'? 'selected' : ''}}>Roles</option>

                                </select>


                            </div>
                        </div>










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
        $(document).ready(function (){
            $('#myForm').validate({
                rules: {
                    name: {
                        required : true,
                    },
                    group_name: {
                        required : true,
                    },

                },
                messages :{
                    name: {
                        required : 'Please Enter  Name',
                    },
                    group_name: {
                        required : 'Please Enter gROUP Name',
                    },


                },
                errorElement : 'span',
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });

    </script>


@endsection
