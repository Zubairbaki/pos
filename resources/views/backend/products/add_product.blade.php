@extends('admin_desbord')

@section('contant')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <div class="content">




        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <h4 class="page-title">Add Product</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">


            <div class="col-lg-12 col-xl-12">



                <form id="myForm" method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                    @csrf
                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Product Name</label>
                                <input type="text" name="product_name"
                                    class="form-control ">

                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="firstname" class="form-label">Catagory </label>

                                <select name="catagory_id" class="form-select" id="example-select">
                                    <option selected disabled >Select Month</option>
                                    @foreach ($Catagory as $cat)


                                    <option value="{{$cat->id}}">{{$cat->catagory_name}}</option>
                                    @endforeach
                                </select>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="firstname" class="form-label">Supplier </label>

                                <select name="supplier_id" class="form-select" id="example-select">
                                    <option selected disabled >Select Month</option>
                                    @foreach ($Supplier as $sup)


                                    <option value="{{$sup->id}}">{{$sup->name}}</option>
                                    @endforeach
                                </select>


                            </div>
                        </div>

                        {{-- <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="firstname" class="form-label">Product Code</label>
                                <input type="text" name="product_code"
                                    class="form-control "
                                    id="firstname">

                            </div>
                        </div> --}}
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="firstname" class="form-label">Product garage</label>
                                <input type="text" name="product_garage"
                                    class="form-control "
                                    >

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="firstname" class="form-label">Product Store</label>
                                <input type="text" name="prodcut_store"
                                    class="form-control "
                                    >

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="firstname" class="form-label">Buying date</label>
                                <input type="date" name="buying_date"
                                    class="form-control "
                                    id="firstname">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="firstname" class="form-label">Expire date </label>
                                <input type="date" name="expire_date"
                                    class="form-control "
                                    id="firstname">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="firstname" class="form-label">Buying price </label>
                                <input type="text" name="buying_price"
                                    class="form-control "
                                    id="firstname">

                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="firstname" class="form-label">Selling Price </label>
                                <input type="text" name="selling_price"
                                    class="form-control ">

                            </div>
                        </div>





                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="firstname" class="form-label">Product Image</label>
                                <input type="file" name="product_image"
                                    class="form-control " id="image">

                            </div>
                        </div>

                        <div class="col-md-12">
                       <div class="mb-3">

                            <img id="showImage" src="{{ url('upload/no_image.jpg') }}"
                                class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
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
                    product_name: {
                        required : true,
                    },
                    catagory_id: {
                        required : true,
                    },
                    supplier_id: {
                        required : true,
                    },

                    product_garage: {
                        required : true,
                    },
                    prodcut_store: {
                        required : true,
                    },
                    buying_date: {
                        required : true,
                    },
                    selling_price: {
                        required : true,
                    },
                    expire_date: {
                        required : true,
                    },
                    buying_price: {
                        required : true,
                    },
                    selling_price: {
                        required : true,
                    },
                    product_image: {
                        required : true,
                    },
                },
                messages :{
                    product_name: {
                        required : 'Please Enter Product Name',
                    },
                    catagory_id: {
                        required : 'Please Enter Catagory Name',
                    },
                    supplier_id: {
                        required : 'Please Enter Supplier Name',
                    },

                    product_garage: {
                        required : 'Please Enter Product garage',
                    },
                    prodcut_store: {
                        required : 'Please Enter Products',
                    },
                    buying_date: {
                        required : 'Please Enter Buying date',
                    },
                    selling_price: {
                        required : 'Please Enter Selling Price',
                    },
                    expire_date: {
                        required : 'Please Enter Expire date',
                    },
                    buying_price: {
                        required : 'Please Enter Buying Price',
                    },
                    selling_price: {
                        required : 'Please Enter Selling Price',
                    },
                    product_image: {
                        required : 'Please Enter Image',
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        })
    </script>
@endsection
