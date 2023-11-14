@extends('admin_desbord')

@section('contant')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">

                        </div>
                        <h4 class="page-title">Datatables</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <h4 class="header-title"> Complete Orders </h4>
                            <p class="text-muted font-13 mb-4">
                                DataTables has most features enabled by default, so all you need to do to use it with your
                                own tables is to call the construction
                                function:
                                <code>$().DataTable();</code>.
                            </p>

                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>S1</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Order Date</th>
                                        <th>Payment</th>
                                        <th>Invoice</th>
                                        <th>Pay</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @foreach ($order as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img src="{{ asset($item->Customer->image) }}"
                                                    style="width:50px;
                                            height:40px;"</td>
                                            <td>{{ $item->Customer->name }}</td>
                                            <td>{{ $item->order_date }}</td>
                                            <td>{{ $item->payment_status }}</td>
                                            <td>{{ $item->invoice_number }}</td>
                                            <td>{{ $item->pay }}</td>
                                            <td> <span class="badge bg-success">{{ $item->order_status }} </span> </td>

                                            <td><a href="{{ route('pdf.download', $item->id) }}"
                                                    class="btn btn-blue rounded-pill waves-effect waves-light"> PDF Invoice</a>

                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->




        </div> <!-- container -->

    </div> <!-- content -->



    </div>
@endsection
