@extends('admin_desbord')

@section('contant')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <div class="content">




        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <h4 class="page-title">Add Customer</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">


            <div class="col-lg-12 col-xl-12">



                <form method="POST" action="{{ route('store.costomer') }}" enctype="multipart/form-data">
                    @csrf
                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Customer Name</label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid

                                                    @enderror">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Customer email</label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid

                                                    @enderror">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Customer phone</label>
                                <input type="text" name="phone"
                                    class="form-control @error('phone') is-invalid

                                                    @enderror"
                                    id="firstname">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Customer address</label>
                                <input type="text" name="address"
                                    class="form-control @error('address') is-invalid

                                                    @enderror">
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Customer shopname</label>
                                <input type="text" name="shopname"
                                    class="form-control @error('shopname') is-invalid

                                                    @enderror">
                                @error('shopname')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>



                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label"> Customer account_holder</label>
                                <input type="text" name="account_holder"
                                    class="form-control @error('account_holder') is-invalid

                                                    @enderror"
                                    id="firstname">
                                @error('account_holder')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Customer account_number</label>
                                <input type="text" name="account_number"
                                    class="form-control @error('account_number') is-invalid

                                                    @enderror"
                                    id="firstname">
                                @error('account_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Customer bank_name</label>
                                <input type="text" name="bank_name"
                                    class="form-control @error('bank_name') is-invalid

                                                    @enderror"
                                    id="firstname">
                                @error('bank_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Customer bank_branch</label>
                                <input type="text" name="bank_branch"
                                    class="form-control @error('bank_branch') is-invalid

                                                    @enderror"
                                    id="firstname">
                                @error('bank_branch')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Customer city</label>
                                <input type="text" name="city"
                                    class="form-control @error('city') is-invalid

                                                    @enderror"
                                    id="firstname">
                                @error('city')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Customer Image</label>
                                <input type="file" name="image"
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
