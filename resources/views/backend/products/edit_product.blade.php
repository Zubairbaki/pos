@extends('admin_desbord')

@section('contant')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <div class="content">




        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <h4 class="page-title">Edit Product</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">


            <div class="col-lg-12 col-xl-12">



                <form id="myForm" method="POST" action="{{ route('product.update',['id'=>$product->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Product Name</label>
                                <input type="text" name="product_name" value="{{$product->product_name}}"
                                    class="form-control ">

                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="firstname" class="form-label">Supplier </label>

                                <select name="catagory_id" class="form-select" id="example-select">
                                    <option selected disabled>Select Category</option>
                                    @foreach ($Catagory as $cat)
                                    <option value="{{$cat->id}}" {{$cat->id == $product->catagory_id ? 'selected' : ''}}>{{$cat->catagory_name}}</option>
                                    @endforeach
                                </select>


                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="firstname" class="form-label">Supplier </label>

                                <select name="supplier_id" class="form-select" id="example-select">
                                    <option selected disabled >Select Supplier</option>
                                    @foreach ($Supplier as $sup)



                                    <option value="{{$sup->id}}" {{$sup->id == $product->supplier_id? 'selected': ''}}  >{{$sup->name}}</option>
                                    @endforeach
                                </select>


                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="firstname" class="form-label">Product Code</label>
                                <input type="text" name="product_code" value="{{$product->product_code}}"
                                    class="form-control "
                                    id="firstname">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="firstname" class="form-label">Product garage</label>
                                <input type="text" name="product_garage" value="{{$product->product_garage}}"
                                    class="form-control "
                                    >

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="firstname" class="form-label">Product Store</label>
                                <input type="text" name="prodcut_store" value="{{$product->prodcut_store}}"
                                    class="form-control "
                                    >

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="firstname" class="form-label">Buying date</label>
                                <input type="date" name="buying_date" value="{{$product->buying_date}}"
                                    class="form-control "
                                    id="firstname">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="firstname" class="form-label">Expire date </label>
                                <input type="date" name="expire_date" value="{{$product->expire_date}}"
                                    class="form-control "
                                    id="firstname">

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="firstname" class="form-label">Buying price </label>
                                <input type="text" name="buying_price" value="{{$product->buying_price}}"
                                    class="form-control "
                                    id="firstname">

                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="firstname" class="form-label">Selling Price </label>
                                <input type="text" name="selling_price" value="{{$product->selling_price}}"
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

                            <img id="showImage" src="{{asset($product->product_image) }}"
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
