@extends('admin_desbord')

@section('contant')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <div class="content">




        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <h4 class="page-title">Add Expense</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">


            <div class="col-lg-12 col-xl-12">

                <div class="mb-3">
                    <label for="example-textarea" class="form-label">Text area</label>

                </div>



                <form method="POST" action="{{ route('expense.store') }}" enctype="multipart/form-data">
                    @csrf
                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Expense Details</label>
                                <textarea name="details" class="form-control" id="example-textarea" rows="3"></textarea>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="" class="form-label">Amount</label>
                                <input type="text" name="amount"
                                    class="form-control ">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">

                                <input type="hidden" name="month" value="{{date('F')}}"
                                    class="form-control ">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">

                                <input type="hidden" name="year" value="{{date('Y')}}"
                                    class="form-control ">

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="mb-3">

                                <input type="hidden" name="date" value="{{date('d-m-Y')}}"
                                    class="form-control ">

                            </div>
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


@endsection
