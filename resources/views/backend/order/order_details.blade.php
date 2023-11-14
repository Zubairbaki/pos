@extends('admin_desbord')

@section('contant')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


    <div class="content">




        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">

                    <h4 class="page-title">Order Details</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">


            <div class="col-lg-12 col-xl-12">



                <form method="POST" action="{{ route('Order.status.update',['id'=>$order->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Personal Info</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="" class="form-label">Customer Image</label>
                                <img id="showImage" src="{{asset($order->Customer->image)}}"
                                class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">


                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Customer Name</label>
                                <p class="text-danger"> {{$order->Customer->name}} </p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Customer email</label>
                                <p class="text-danger"> {{$order->Customer->email}} </p>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Customer Phone</label>
                                <p class="text-danger"> {{$order->Customer->phone}} </p>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Order Date</label>
                                <p class="text-danger"> {{$order->order_date}} </p>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Payment Status</label>
                                <p class="text-danger"> {{$order->payment_status}} </p>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Paid amount</label>
                                <p class="text-danger"> {{$order->pay}} </p>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Due amount</label>
                                <p class="text-danger"> {{$order->due}} </p>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="firstname" class="form-label">Order Invoice</label>
                                <p class="text-danger"> {{$order->invoice_number}} </p>

                            </div>
                        </div>














                    </div> <!-- end row -->


                    <div class="text-end">
                        <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i
                                class="mdi mdi-content-save"></i> Complete Order</button>
                    </div>
                </form>
            </div>
            <!-- end settings content-->






            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <h4 class="header-title"> Pending Orders </h4>
                            <p class="text-muted font-13 mb-4">
                                DataTables has most features enabled by default, so all you need to do to use it with your
                                own tables is to call the construction
                                function:
                                <code>$().DataTable();</code>.
                            </p>

                            <table  class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>

                                        <th>Image</th>
                                        <th> Product Name</th>
                                        <th>Product Code</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total(+)vat</th>

                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($orderitem as $key => $item)
                                        <tr>

                                            <td><img src="{{ asset($item->product->product_image) }}"
                                                    style="width:50px;
                                            height:40px;"</td>
                                            <td>{{ $item->product->product_name }}</td>
                                            <td>{{ $item->product->product_code }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->product->selling_price }}</td>
                                            <td>{{ $item->total }}</td>


                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>


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
