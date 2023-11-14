@extends('admin_desbord')

@section('contant')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <div class="content">




        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <h4 class="page-title">Add Roles</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">


            <div class="col-lg-12 col-xl-8">



                <form id="myForm" method="POST" action="{{ route('roles.store') }}" enctype="multipart/form-data">
                    @csrf
                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Role Name </label>
                                <input type="text" name="name"
                                    class="form-control ">

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


                },
                messages :{
                    name: {
                        required : 'Please Enter  Name',
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
