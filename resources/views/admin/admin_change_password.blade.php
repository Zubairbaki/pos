@extends('admin_desbord')

@section('contant')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <div class="content">




            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Admin Profile</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                                <li class="breadcrumb-item active">Change Password</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Change Password</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-lg-8 col-xl-8">



                                    <form method="POST" action="{{route('update.password')}}" >
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">Old Password</label>
                                                    <input type="password"  name="oldPassword" class="form-control @error('oldPassword') is-invalid

                                                    @enderror" id="current_password" >
                                                    @error('oldPassword')

                                                    <span class="text-danger">{{$message}}</span>

                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">NEW Password</label>
                                                    <input type="password"  name="NewPassword" class="form-control @error('NewPassword') is-invalid

                                                    @enderror" id="new_password" >
                                                    @error('NewPassword')

                                                    <span class="text-danger">{{$message}}</span>

                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="firstname" class="form-label">Conform Password</label>
                                                    <input type="password"  name="NewPassword_confirmation" class="form-control" id="NewPassword_confirmation" >

                                                </div>
                                            </div>

                                        <div class="text-end">
                                            <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Save</button>
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




@endsection
