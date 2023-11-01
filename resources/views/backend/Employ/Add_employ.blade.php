@extends('admin_desbord')

@section('contant')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <div class="content">




        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <h4 class="page-title">Add Employ</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">


            <div class="col-lg-12 col-xl-12">



                <form method="POST" action="{{ route('employe.store') }}" enctype="multipart/form-data">
                    @csrf
                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Employ Name</label>
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
                                <label for="firstname" class="form-label">Employ email</label>
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
                                <label for="firstname" class="form-label">Employ phone</label>
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
                                <label for="firstname" class="form-label">Employ salary</label>
                                <input type="text" name="salary"
                                    class="form-control @error('salary') is-invalid

                                                    @enderror">
                                @error('salary')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Employ experience</label>

                                <select name="experience" class="form-select" id="example-select">
                                    <option selected="">Select Year</option>
                                    <option value="1 Year">1 Year</option>
                                    <option value="2 Year">2 Year</option>
                                    <option value="3 Year">3 Year</option>
                                    <option value="4 Year">4 Year</option>
                                    <option value="5 Year">5 Year</option>
                                </select>


                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label"> Employe vacation</label>
                                <input type="text" name="vacation"
                                    class="form-control @error('vacation') is-invalid

                                                    @enderror"
                                    id="firstname">
                                @error('vacation')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Employe address</label>
                                <input type="text" name="address"
                                    class="form-control @error('address') is-invalid

                                                    @enderror"
                                    id="firstname">
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Employ city</label>
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
                                <label for="firstname" class="form-label">Employ Image</label>
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
